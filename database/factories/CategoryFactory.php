<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        //Caegar datos falsos en la base de datos
      'name' => $faker->word,
    ];
});
