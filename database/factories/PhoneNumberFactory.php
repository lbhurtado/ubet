<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\PhoneNumber::class, function (Faker $faker) {
    return [
        'identifier' => function () {
            return factory(User::class)->create()->identifier;
        },
        'phone_number' => $faker->unique()->numberBetween(9000000000,9999999999),
        'dialling_code_id' => 171
    ];
});
