<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Assureur;
use Faker\Generator as Faker;

$factory->define(Assureur::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'nomassureur' => $faker->word,
        'telephone1' => $faker->word,
        'telephone2' => $faker->word,
        'telephone3' => $faker->word,
        'email' => $faker->word,
        'siteweb' => $faker->word,
        'created_by' => $faker->word,
        'updated_by' => $faker->word,
        'sigle' => $faker->word,
        'slogant' => $faker->word,
        'adresse' => $faker->word,
        'facebook' => $faker->word,
        'whatsapp' => $faker->word,
        'twitter' => $faker->word,
        'logo' => $faker->word,
        'description' => $faker->text,
        'pointsfort' => $faker->text,
        'autre' => $faker->text
    ];
});
