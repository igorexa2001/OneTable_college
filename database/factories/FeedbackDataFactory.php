<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FeedbackData;
use Faker\Generator as Faker;
use MongoDB\BSON\UTCDateTime;

$factory->define(FeedbackData::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'email'=>$faker->email,
        'phone'=>$faker->phoneNumber,
        'message'=>$faker->text(20),
    ];
});
