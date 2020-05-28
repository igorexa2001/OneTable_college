<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\DeliveryMethod;
use Faker\Generator as Faker;

$factory->define(DeliveryMethod::class, function (Faker $faker) {
    return [
        'title'=>$faker->name,
        'description'=>$faker->text(10),
        'path_to_logo' => "images/chars/char_".$faker->unique()->numberBetween(1,4).".png"
    ];
});
