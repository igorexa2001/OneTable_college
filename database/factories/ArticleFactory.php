<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;
use MongoDB\BSON\UTCDateTime;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title'=>$faker->name,
        'text'=>$faker->text(),
        'description'=>$faker->text(20),
        'slug'=>$faker->slug(),
        'path_to_photo' =>  "images/blog/blog_".random_int(1,9).".jpg"
    ];
});
