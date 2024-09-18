<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Books;
use Faker\Generator as Faker;

$factory->define(Books::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName, 
        'surname' => $faker->lastName,
        'email' => $faker->safeEmail, 
        'book_name' => $faker->word,
        'tel_raqam' => $faker->phoneNumber
    ];
});
