<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'unique_id' => $faker->uuid,
        'title' => $faker->sentence,
        'description' => $faker->text,
        'url' => $faker->url,
        'image_url' => $faker->imageUrl,
        'published_at' => $faker->dateTimeThisDecade,
    ];
});
