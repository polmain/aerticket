<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    $departureDateTime = $faker->dateTimeBetween('now', '+2 months');
    $arrivalDateTime = clone $departureDateTime;
    $arrivalDateTime->modify('+1 day');
    $arrivalDateTime = $faker->dateTimeBetween($departureDateTime, $arrivalDateTime);

    return [
        'flightNumber'          => $faker->unique()->regexify('[A-Z][A-Z0-9][0-9]{4}'),
        'arrival_airport_id'    => $faker->numberBetween(1, 1000),
        'departure_airport_id'  => $faker->numberBetween(1, 1000),
        'transporter_id'        => $faker->numberBetween(1, 500),
        'departureDateTime'     => $departureDateTime,
        'arrivalDateTime'       => $arrivalDateTime,
        'duration'              => $faker->numberBetween(0,200)
    ];
});
