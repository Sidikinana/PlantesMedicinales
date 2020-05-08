<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PartieUtilisee;
use Faker\Generator as Faker;

$factory->define(PartieUtilisee::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'nomPartie' => $faker->word
    ];
});
