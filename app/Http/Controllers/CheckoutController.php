<?php

namespace App\Http\Controllers;

use App\Factories\DeliveryDataFactory;
use App\Repositories\CategoryRepository;
use App\Repositories\DeliveryMethodRepository;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Cart;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    /**
     * @var CategoryRepository
     * @var deliveryMethodRepository
     * @var productRepository
     */
    private $categoryRepository;
    private $deliveryMethodRepository;
    private $productRepository;

    /**
     * @var DeliveryDataFactory
     */
    private $deliveryDataFactory;

    /**
     * CheckoutController constructor.
     * @param CategoryRepository $categoryRepository
     * @param DeliveryMethodRepository $deliveryMethodRepository
     * @param ProductRepository $productRepository
     * @param DeliveryDataFactory $deliveryDataFactory
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        DeliveryMethodRepository $deliveryMethodRepository,
        ProductRepository $productRepository,
        DeliveryDataFactory $deliveryDataFactory
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->deliveryMethodRepository = $deliveryMethodRepository;
        $this->productRepository = $productRepository;
        $this->deliveryDataFactory = $deliveryDataFactory;
    }

    /**
     * @return Factory|RedirectResponse|\Illuminate\Routing\Redirector|View
     */
    public function index()
    {
        if(app('cart')->getContent()->isEmpty()){
           return redirect(route('index'));
        }

        return view('checkout.index',[
            'categories' => $this->categoryRepository->categoriesMenu(),
            'deliveryMethods' => $this->deliveryMethodRepository->findAll(),
            'cartItems' => app('cart')->getContent(),
        ]);
    }

    /**
     * Подпись и отправка заказа
     *
     * @param Request $request
     * @return Factory|RedirectResponse|View
     */
    public function checkout(Request $request)
    {

        $deliveryData = $this->deliveryDataFactory->create();

        $deliveryData->fill($request->all());
        $deliveryData->full_price += $this->deliveryMethodRepository->findByTitle($request->deliveryMethod)->price;
        $deliveryData->delivery_method_id = $this->deliveryMethodRepository->findByTitle($request->deliveryMethod)->id;
        $deliveryData->save();

        foreach (app('cart')->getContent() as $productId){
            $product = $this->productRepository->findById($productId->id);
            $product->deliveryData()->attach($deliveryData, ['quantity' => $productId->quantity]);
        }

//        Mail::to($deliveryData->email)->send(new Delivery($deliveryData));

        app('cart')->clear();

        return view('checkout.complete', [
            'categories' => $this->categoryRepository->categoriesMenu(),
            'deliveryId' => $deliveryData->id,
        ]);
    }
}
