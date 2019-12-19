<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $user_id = rand(1, 50);
    $user = User::findOrFail($user_id);
    return [
        'post_id' => $faker->numberBetween($min = 1, $max = 50),
        'user_id' => $user_id,
        'user' => $user->username,
        'body' => $faker->paragraph,
        'likes' => $faker->numberBetween($min = 1, $max = 1000),
    ];
});
