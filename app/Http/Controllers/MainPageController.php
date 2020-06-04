<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\DeliveryMethodRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProductSliderRepository;
use Illuminate\View\View;

class MainPageController extends Controller
{
    /**
     * @var ProductRepository
     * @var ProductSliderRepository
     * @var DeliveryMethodRepository
     * @var CategoryRepository
     * @var BrandRepository
     * @var ArticleRepository
     */
    private $productRepository;
    private $productSliderRepository;
    private $deliveryMethodRepository;
    private $categoryRepository;
    private $brandRepository;
    private $articleRepository;

    /**
     * MainPageController constructor.
     * @param ProductRepository $productRepository
     * @param ProductSliderRepository $productSliderRepository
     * @param DeliveryMethodRepository $deliveryMethodRepository
     * @param CategoryRepository $categoryRepository
     * @param BrandRepository $brandRepository
     * @param ArticleRepository $articleRepository
     */
    public function __construct(
        ProductRepository $productRepository,
        ProductSliderRepository $productSliderRepository,
        DeliveryMethodRepository $deliveryMethodRepository,
        CategoryRepository $categoryRepository,
        BrandRepository $brandRepository,
        ArticleRepository $articleRepository)
    {
        $this->productRepository = $productRepository;
        $this->productSliderRepository = $productSliderRepository;
        $this->deliveryMethodRepository = $deliveryMethodRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
        $this->articleRepository = $articleRepository;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('home_page.index', [
            'categories' =>$this->categoryRepository->categoriesMenu(),
            'mainSliderItems' => $this->productSliderRepository->findAll(),
            'deliveryMethods' => $this->deliveryMethodRepository->findAll(),
            'newItems' => $this->productRepository->findNew(),
            'onSaleItems' => $this->productRepository->findSale(),
            'weRecommendItems' => $this->productRepository->findRecommended(),
            'sliderBrands' => $this->brandRepository->findToSlider(),
            'articles' => $this->articleRepository->findRandom(),
        ]);
    }
}
