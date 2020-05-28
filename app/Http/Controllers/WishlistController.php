<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\CategoryRepository;
use Cart;
use Illuminate\Support\Facades\Response;

class WishlistController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * WishlistController constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('wishlist.index',[
            'categories' => $this->categoryRepository->categoriesMenu(),
            'wishlistItems' => app('wishlist')->getContent(),
        ]);
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Product $product){
        app('wishlist')->add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'associatedModel' => $product,
        ]);

        return Response::json([
            'count' => app('wishlist')->getTotalQuantity(),
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id){
        app('wishlist')->remove($id);
        return Response::json([
            'count' => app('wishlist')->getTotalQuantity(),
        ]);
    }

    public function deleteFromPage($id){
        app('wishlist')->remove($id);
        return back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAll(){
        app('wishlist')->clear();
        return back();
    }
}
