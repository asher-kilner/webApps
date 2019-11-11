<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween($min = 1, $max = 50),
        'user_id' => $faker->numberBetween($min = 1, $max = 50),
        'body' => $faker->paragraph,
        'parent_id' => null,
        'likes' => $faker->numberBetween($min = 1, $max = 1000),
    ];
});
