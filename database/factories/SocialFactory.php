<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Social;
use Faker\Generator as Faker;

$factory->define(Social::class, function (Faker $faker) {
    return [
     	'url' => $faker->name,
        'icon' => $faker->safeEmail,
    ];
});
