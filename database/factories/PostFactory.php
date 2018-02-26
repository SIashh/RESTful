<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'nom' => $faker->text(100),
    	'domaine' => $faker->text(100),
    	'niveauetude' => $faker->text(100),
    	'datedebut' => $faker->text(100),
    	'duree' => $faker->text(100),
    	'lien' => $faker->text(100),
    ];
});
