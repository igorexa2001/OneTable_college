<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\BrandSlider::class, function (Faker $faker) {
    return [
        'brand_id' => \App\Models\Brand::all()->random(1)->first()
    ];
});
