<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MainPageController@index')->name('home_page');

Route::group(['prefix' => 'blog'], function () {
    Route::get('', 'ArticleController@index')->name('blog');
    Route::get('{slug}', 'ArticleController@show')->name('article');
});

Route::group(['prefix' => 'shop'], function () {
    Route::get('', 'ShopController@index')->name('shop');
    Route::get('filter', 'ShopController@filter')->name('shop_filter');
    Route::get('product/{slug}', 'ShopController@show')->name('oneProduct');
    Route::get('{slug}', 'ShopController@index')->name('shop_category');
    Route::get('{slug}/filter', 'ShopController@filter')->name('shop_filter_category');
});

Route::group(['prefix' => 'cart'], function () {
    Route::get('', 'CartController@index')->name('cart');
    Route::post('', 'CartController@store')->name('store_product');
    Route::get('clear', 'CartController@deleteAll')->name('cart_clear');
    Route::delete('delete/{id}', 'CartController@delete')->name('delete_from_cart');
    Route::put('inc_q/{id}', 'CartController@increaseQuantity');
    Route::put('dec_q/{id}', 'CartController@decreaseQuantity');
    Route::post('{product}', 'CartController@storeSingle');
});

Route::group(['prefix' => 'wishlist'], function () {
    Route::get('', 'WishlistController@index');
    Route::get('clear', 'WishlistController@deleteAll');
    Route::delete('page/{id}', 'WishlistController@deleteFromPage')->name('delete_from_wishlist_page');
    Route::delete('delete/{id}', 'WishlistController@delete');
    Route::post('{product}', 'WishlistController@store');
});

Route::group(['prefix' => 'checkout'], function () {
    Route::get('', 'CheckoutController@index')->name('checkout_index');
    Route::post('', 'CheckoutController@checkout')->name('checkout_send');
});

Route::group(['prefix' => 'contact'], function () {
    Route::get('', 'ContactController@index');
    Route::post('', 'ContactController@store')->name('feedback_send');
});

Route::group(['prefix' => 'subscribe'], function () {
    Route::post('', 'SubscriberController@store')->name('store_subscriber');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('', 'DeliveryDataController@index')->name('admin_index');

    Route::group(['prefix' => 'delivery'], function (){
        Route::get('show/{delivery}', 'DeliveryDataController@show')->name('show_delivery');
        Route::put('update/{delivery}', 'DeliveryDataController@update')->name('update_delivery');
        Route::delete('delete/{delivery}', 'DeliveryDataController@delete')->name('delete_delivery');
    });
});

Route::get('/parse', 'ParsingController@parsing');

