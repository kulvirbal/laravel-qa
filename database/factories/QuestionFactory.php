<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence(rand(5, 10)), '.'),
        'body' => $faker->paragraph(rand(3, 5), true),
        'views' => rand(3, 10),
        //'answers_count' => rand(3, 10),
        'votes' => rand(-3, 10),
    ];
});
