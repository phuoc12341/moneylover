<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Setting;
use Faker\Generator as Faker;

$factory->define(Setting::class, function (Faker $faker) {
	return [
		'site_name' => $faker->name,
		'email' => $faker->email,
		'phone' => $faker->phoneNumber,
		'addredd' => $faker->address,
	];
});
