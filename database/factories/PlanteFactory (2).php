<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Plante;
use Faker\Generator as Faker;

$factory->define(Plante::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'nomScientifique' => $faker->word,
        'espece' => $faker->word,
        'famille' => $faker->word,
        'nomMoore' => $faker->word,
        'nomDioula' => $faker->word,
        'nomFulfulde' => $faker->word,
        'enDanger' => $faker->word,
        'photo' => $faker->word
    ];
});
