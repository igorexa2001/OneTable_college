<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    $isNew = random_int(0,1);
    if ($isNew == 0) {
        $isSale = random_int(0,1);
        if ($isSale == 0) {
            $isRecommend = random_int(0,1);
        } else {
            $isRecommend = 0;
        }
    } else {
        $isSale = 0;
        $isRecommend = 0;
    }


    return [
        'name'=>$faker->name,
        'price'=>$faker->randomFloat(2, 0, 1000),
        'description'=>$faker->text(100),
        'slug' =>$faker->unique()->slug(3),
        'brand_id'=>\App\Models\Brand::all()->random(1)->first(),
        'is_new'=>$isNew,
        'is_sale'=>$isSale,
        'is_recommend'=>$isRecommend
    ];
});
