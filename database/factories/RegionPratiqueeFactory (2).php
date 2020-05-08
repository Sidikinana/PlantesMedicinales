<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\RegionPratiquee;
use Faker\Generator as Faker;

$factory->define(RegionPratiquee::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'nomRegion' => $faker->word,
        'latitude' => $faker->randomDigitNotNull,
        'longitude' => $faker->randomDigitNotNull
    ];
});
