<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Vertue;
use Faker\Generator as Faker;

$factory->define(Vertue::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'nomVertue' => $faker->word,
        'recette' => $faker->text,
        'utilisation' => $faker->text,
        'plante_id' => $faker->word,
        'regionPratiquee_id' => $faker->word,
        'partieUtilisee_id' => $faker->randomDigitNotNull
    ];
});
