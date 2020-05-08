<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ZoneRencontree;
use Faker\Generator as Faker;

$factory->define(ZoneRencontree::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'nomzone' => $faker->word,
        'latitude' => $faker->randomDigitNotNull,
        'longitude' => $faker->randomDigitNotNull
    ];
});
