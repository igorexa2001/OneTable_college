<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'path_to_logo' => "images/brands/brand_".random_int(1,8).".jpg",
        'is_in_slider' => random_int(0,1),
    ];
});
