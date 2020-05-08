<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Agence;
use Faker\Generator as Faker;

$factory->define(Agence::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'nomagence' => $faker->word,
        'telephone1' => $faker->word,
        'telephone2' => $faker->word,
        'telephone3' => $faker->word,
        'email' => $faker->word,
        'adresse' => $faker->word,
        'facebook' => $faker->word,
        'whatsapp' => $faker->word,
        'twitter' => $faker->word,
        'assureur_id' => $faker->word,
        'agencecategorie_id' => $faker->word,
        'created_by' => $faker->word,
        'updated_by' => $faker->word,
        'altitude' => $faker->word,
        'longitude' => $faker->word,
        'localite_id' => $faker->word
    ];
});
