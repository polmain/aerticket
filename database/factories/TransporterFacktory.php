<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Transporter;
use Faker\Generator as Faker;

$factory->define(Transporter::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company,
        'code' => $faker->unique()->regexify('[A-Z0-9]{2}'),
    ];
});
