<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'is_popular'=>random_int(0,1),
        'slug'=>$faker->slug(),
        'path_to_image'=>"images/popularCategories/popularCategory_".random_int(1,5).".png"
    ];
});
