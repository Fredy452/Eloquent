<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Group;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        //Aqui es donde vamos a especificar que datos vamos a cargar y que campos
        'name' => $faker->word,//Cargar el campo name con palabras aleatorias
    ];
});
