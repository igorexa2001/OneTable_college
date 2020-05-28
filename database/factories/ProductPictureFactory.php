<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\ProductPicture::class, function (Faker $faker) {
    return [
        'path_to_image' =>"images/products/product_".random_int(2,28).".png",
        'product_id' => \App\Models\Product::all()->random(1)->first()
    ];
});
