<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopController extends Controller
{
    /**
     * @var ProductRepository
     * @var BrandRepository
     * @var CategoryRepository
     */
    private $productRepository;
    private $brandRepository;
    private $categoryRepository;

    /**
     * ProductController constructor.
     * @param ProductRepository $productRepository
     * @param BrandRepository $brandRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(
        ProductRepository $productRepository,
        BrandRepository $brandRepository,
        CategoryRepository $categoryRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
    }


    /**
     * @param null $categorySlug
     * @return View
     */
    public function index($categorySlug = null):View
    {
        if ($categorySlug){
            $category = $this->categoryRepository->findBySlug($categorySlug);
            $products = $category->products();
        } else {
            $products = Product::query();
        }

        return view('shop.index', [
            'categories' => $this->categoryRepository->categoriesMenu(),
            'currentCategory' => $this->categoryRepository->findBySlug($categorySlug),
            'categoriesFilter' => $this->categoryRepository->findParents(),
            'count' => $products->get()->count(),
            'products' => $products->paginate(10),
            'brands' => $this->brandRepository->findAll(),
        ]);
    }

    /**
     * Фильтрация по запросу
     *
     * @param Request $request
     * @param null $categorySlug
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function filter(Request $request, $categorySlug = null)
    {

        $category = $this->categoryRepository->findBySlug($categorySlug);
        if ($categorySlug){
            $query = $category->products();
        } else {
            $query  = Product::query();
        }

        return view('shop.index', [
            'categories' => $this->categoryRepository->categoriesMenu(),
            'currentCategory' => $category,
            'categoriesFilter' => $this->categoryRepository->findParents(),
            'count' => $this->productRepository->findByIndex($query, $request->all())->get()->count(),
            'products' => $this->productRepository->findByIndex($query, $request->all())->paginate(10),
            'brands' => $this->brandRepository->findAll(),
        ]);
    }


    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show($slug)
    {
        return view('shop.single_product.product', [
            'categories' => $this->categoryRepository->categoriesMenu(),
            'product' => $this->productRepository->findBySlug($slug),
        ]);
    }

}

