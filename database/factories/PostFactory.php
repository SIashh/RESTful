<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'commentaire' => $faker->text(100),
    	'note' => $faker->text(100),
    ];
});
