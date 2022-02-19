<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Property;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Integre;

$factory->define(Property::class, function (Faker $faker) {
    return [
        'size' => rand(20,100),
        'rent' => rand(50000,100000),
        'age' => rand(1,100),
        'floor' => rand(1,100),
    ];
});
