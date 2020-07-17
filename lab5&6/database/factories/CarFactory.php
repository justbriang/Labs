<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    $unixTimestamp = '1461067200';
    return [
        'make' => $faker->name,
        'user_id' => factory(App\User::class),
        'model' =>$faker->name,
        'year' =>$faker->date('Y-m-d', $unixTimestamp),
    ];
});
