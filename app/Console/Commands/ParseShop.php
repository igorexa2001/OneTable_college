<?php

namespace App\Console\Commands;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPicture;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Console\Command;
use PHPHtmlParser\Dom;

class ParseShop extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ParseShop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private $productRepository;
    private $categoryRepository;
    private $brandRepository;

    /**
     * Create a new command instance.
     *
     * @param ProductRepository $productRepository
     * @param CategoryRepository $categoryRepository
     * @param BrandRepository $brandRepository
     */
    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        BrandRepository $brandRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $categories = $this->parseCategories();

        for ($i = 0; $i < 10; $i++) {
            $url = 'https://hobbygames.ru/nastolnie?page=' . $i . '&parameter_type=0';
            $products = $this->parsePage($url, $categories);

            $brandConst = [];
            foreach ($this->brandRepository->findAll() as $brand) {
                $brandConst[] = [
                    'name' => $brand->name,
                    'slug' => $brand->slug,
                ];
            }

            $brands = $this->getBrands($products, $brandConst);

            $this->pushToDatabase($categories, $products, $brands);
        }

        dd([
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories
        ]);

        return 'OK '.$this->productRepository->findAll()->count();
    }

    private function getBrands($products, $brands = [])
    {
        foreach ($products as $product){
            if (!in_array($product['brand'], $brands)) {
                $brands[] = $product['brand'];
            }
        }
        return $brands;
    }

    private function parsePage($url, $categories)
    {
        $dom = new Dom;
        $products = [];
        $dom->loadFromUrl($url);
        $productItem = $dom->find('.product-item  ');
        foreach ($productItem as $item) {
            $url = $item->find('a.name')->getAttribute('href');
            $products[] = $this->parseProduct($url, $categories);
        }
        return $products;
    }

    private function parseProduct($url, $categories)
    {
        $domProduct = new Dom;
        $domProduct->loadFromUrl($url);
        return [
            'name' => $this->parseProductName($domProduct),
            'price' => $this->parseProductPrice($domProduct),
            'description' => $this->parseProductDescription($domProduct),
            'slug' => $this->parseProductSlug($url),
            'images' => $this->parseProductImages($domProduct),
            'categories' => $this->parseProductCategories($domProduct, $categories),
            'brand' => $this->parseProductBrand($domProduct),
            'rules_link' => $this->parseProductRulesLink($domProduct),
            'is_recommend' => rand (0, 5) == 1 ? true : false,
            'is_new' => rand (0, 5) == 1 ? true : false,
            'is_sale' => rand (0, 5) == 1 ? true : false,
        ];
    }

    private function parseProductName($domProduct)
    {
        return $domProduct->find('h1')->text() ?? null;
    }

    private function parseProductPrice($domProduct)
    {
        $price = (int)str_ireplace('&nbsp;₽','', $domProduct->find('div.price')->text());
        if ($price < 12) $price = $price * 1000 + 990 ;
        return $price;
    }

    private function parseProductDescription($dom)
    {
        try {
            $description = $dom->find('div#desc')->find('p')->firstChild()->text();
            $description = str_ireplace('&nbsp;',' ', $description);
        } catch (\Exception $e) {
            return null;
        }

        return (($description != '') && ($description != ' ') && $description) ? $description : null;
    }

    private function parseProductSlug($productUrl)
    {
        return str_ireplace('/','', parse_url($productUrl, PHP_URL_PATH));
    }

    private function parseProductImages($dom)
    {
        $images = [];
        $counter = -1;
        foreach ($dom->find('a.lightGallery') as $image) {
            if ($counter++ == 3) break;

            $link = $image->getAttribute('href');
            $images[] = (@get_headers($link) && strpos(@get_headers($link)[0], '200')) ? $link : null;
        }

        return $images ?? null;
    }

    private function parseProductCategories($domProduct, $categoriesConst)
    {
        $categoriesBlock = $domProduct->find('.tags');
        $categories = [];
        foreach ($categoriesBlock->find('.main-gradient') as $category){
            $url = $category->getAttribute('href');
            $url = str_ireplace('/','', parse_url($url, PHP_URL_PATH));
            if (in_array($url, array_column($categoriesConst, 'slug'))){
                $categories[] = $url;
            }
        }
        return $categories;
    }

    private function parseProductBrand($domProduct)
    {
        $brandBlocks = $domProduct->find('div.manufacturers')->find('.col-md-3');
        foreach ($brandBlocks as $brandBlock) {
            if ($brandBlock->find('.manufacturers__label')->text() == 'Производитель') {
                return [
                    'name' => $brandBlock->find('.manufacturers__value')->text(),
                    'slug' => str_ireplace('/','', parse_url($brandBlock->find('.manufacturers__value')->getAttribute('href'), PHP_URL_PATH)),
                ];
            }
        }
        return null;
    }

    private function parseProductRulesLink($domProduct)
    {
        $rulesLinkBlock = $domProduct->find('div.rules');

        if ($rulesLinkBlock >= 1) {
            $rulesLink = $rulesLinkBlock->find('a')->getAttribute('href');
        }

        return $rulesLink ?? null;
    }

    private function parseCategories()
    {
        $dom = new Dom;
        $categories = [];
        $dom->loadFromUrl('https://hobbygames.ru/nastolnie?page=1&parameter_type=0');
        $categoriesBlocks = $dom->find('.category-left__categories')->find('li');
        foreach ($categoriesBlocks as $categoryBlock) {
            $categories[] = $this->parseCategory($categoryBlock);
        }
        return $categories;
    }

    private function parseCategory($block)
    {
        $url = $block->find('a')->getAttribute('href');
        return [
            'name' => $block->find('a')->text(),
            'slug' => str_ireplace('/','', parse_url($url, PHP_URL_PATH)),
        ];
    }


    private function pushToDatabase($categories, $products, $brands)
    {
//        Push categories
//        foreach ($categories as $category) {
//            $model = new Category();
//            $model->fill($category);
//            $model->save();
//        }

//        Push brands
        $brandConst = [];
        foreach ($this->brandRepository->findAll() as $brand) {
            $brandConst[] = [
                'name' => $brand->name,
                'slug' => $brand->slug,
            ];
        }
        foreach ($brands as $brand) {
            if (!in_array($brand, $brandConst)){
                $model = new Brand();
                $model->fill($brand);
                $model->save();
            }
        }

//        push Products
        foreach ($products as $product) {
            if (!in_array(null, $product)) {
                $model = new Product();
                $model->fill($product);
                $model->brand_id = $this->brandRepository->findBySlug($product['brand']['slug'])->id;
                $model->save();

                foreach ($product['categories'] as $category){
                    $categoryModel = $this->categoryRepository->findBySlug($category);
                    $model->category()->attach($categoryModel);
                }

                foreach ($product['images'] as $image) {
                    $productPicture = new ProductPicture();
                    $productPicture->product_id = $this->productRepository->findBySlug($product['slug'])->id;
                    $productPicture->path_to_image = $image;
                    $productPicture->save();
                }
            }
        }
    }
}
