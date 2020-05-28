<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Product;
use App\Models\ProductSlider;
use Faker\Generator as Faker;

$factory->define(ProductSlider::class, function (Faker $faker) {
    return [
        'product_id' => Product::all()->random(1)->unique()->first()
    ];
});
