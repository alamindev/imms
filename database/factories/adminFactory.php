<?php

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\FactoryBuilder;
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\admin::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'email' => $faker->unique()->safeEmail 
    ];
});
