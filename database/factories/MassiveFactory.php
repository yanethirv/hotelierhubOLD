<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Massive;
use Faker\Generator as Faker;

$factory->define(Massive::class, function (Faker $faker) {
    return [
        'sender_id' => 1,
        'subject' => $faker->sentence,
        'body' => $faker->paragraph
    ];
});
