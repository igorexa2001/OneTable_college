<?php


namespace App\Http\Controllers;


use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPicture;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use PHPHtmlParser\Dom;

class ParsingController extends Controller
{

    private $productRepository;
    private $categoryRepository;
    private $brandRepository;

    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        BrandRepository $brandRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
    }

    public function parsing()
    {
        $categories = $this->parseCategories();
//        $url = 'https://hobbygames.ru/nastolnie?page=' . 3 . '&parameter_type=0';
//        $products = $this->parsePage($url, $categories);
        $products = $this->parseProduct('https://hobbygames.ru/jevoljucija-vtoraja-redakcija', $categories);
        $brandConst = [];
        foreach ($this->brandRepository->findAll() as $brand) {
            $brandConst[] = [
                'name' => $brand->name,
                'slug' => $brand->slug,
            ];
        }
        $brands = $this->getBrands($products, $brandConst);

//        $this->pushToDatabase($categories, $products, $brands);
//        $this->productRepository->findAll()->dd();

        dd([
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories
        ]);

    }

    private function pushToDatabase($categories, $products, $brands)
    {

        foreach ($categories as $category) {
            $model = new Category();
            $model->fill($category);
//            $model->save();
        }

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

        foreach ($products as $product) {
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
            'name' => $domProduct->find('h1')->text(),
            'price' => $this->parseProductPrice($domProduct),
            'description' => $this->parseProductDescription($domProduct),
            'slug' => str_ireplace('/','', parse_url($url, PHP_URL_PATH)),
            'images' => $this->parseProductImages($domProduct),
            'is_recommend' => rand (0, 5) == 1 ? true : false,
            'is_new' => rand (0, 5) == 1 ? true : false,
            'is_sale' => rand (0, 5) == 1 ? true : false,
            'categories' => $this->parseProductCategories($domProduct, $categories),
            'brand' => $this->parseProductBrand($domProduct),
        ];
    }

    private function parseProductPrice($domProduct)
    {
        $price = (int)str_ireplace('&nbsp;₽','', $domProduct->find('div.price')->text());
        if ($price < 10) $price = $price * 1000 + 990 ;
        return $price;
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

    private function parseProductImages($dom)
    {
        $images = [];
        $i = 0;
        foreach ($dom->find('a.lightGallery') as $image) {
            $i++;
            $images[] = $image->getAttribute('href');
            if ($i == 2) break;
        }

        return $images;
    }

    private function parseProductDescription($dom)
    {
        try {
            $description = $dom->find('div#desc')->find('p')->firstChild()->text();
            $description = str_ireplace('&nbsp;',' ', $description);
        } catch (\Exception $e) {
            return null;
        }

        return $description;
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
}
