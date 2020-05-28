<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{
    /**
     * @var CategoryRepository
     * @var ProductRepository
     */
    private $categoryRepository;
    private $productRepository;

    /**
     * CartController constructor.
     * @param CategoryRepository $categoryRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    /**
     *
     * Добавляет в корзину ОДИН элемент (из глвной станицы или магазина)
     *
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     * @throws \Darryldecode\Cart\Exceptions\InvalidConditionException
     */
    public function storeSingle(Product $product)
    {
        app('cart')->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product,
        ));

        return Response::json([
            'count' => app('cart')->getTotalQuantity(),
            'totalPrice' => app('cart')->getSubTotal(),
        ]);
    }

    /**
     * Добавляет в корзину НЕСКОЛЬКО элементов (из страницы продукта)
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Darryldecode\Cart\Exceptions\InvalidConditionException
     */
    public function store(Request $request)
    {

        $product = $this->productRepository->findById($request->product);
            app('cart')->add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
                'attributes' => array(),
                'associatedModel' => $product,
            ));

        return back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('cart.index', [
            'categories' => $this->categoryRepository->categoriesMenu(),
            'cartItems' => app('cart')->getContent(),
        ]);
    }

    /**
     * Продукт в корзине++
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function increaseQuantity($id)
    {
        app('cart')->update($id, ['quantity' => 1]);
        return Response::json([
            'count' => app('cart')->getTotalQuantity(),
            'totalPrice' => app('cart')->getSubTotal(),
            'itemQuantity' => app('cart')->get($id)->quantity,
            'itemTotalPrice' => app('cart')->get($id)->getPriceSum()
            ]);
    }

    /**
     * Продукт в корзине--
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function decreaseQuantity($id)
    {
        if (app('cart')->get($id)->quantity > 1){
            app('cart')->update($id, ['quantity' => -1]);
        }
        return Response::json([
            'count' => app('cart')->getTotalQuantity(),
            'totalPrice' => app('cart')->getSubTotal(),
            'itemQuantity' => app('cart')->get($id)->quantity,
            'itemTotalPrice' => app('cart')->get($id)->getPriceSum()
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        app('cart')->remove($id);
        return back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAll()
    {
        app('cart')->clear();
        return back();
    }
}
