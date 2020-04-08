<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'user_id' => 'factory:App\User',
        'category_id' => 1,
        'blog' => $faker->sentence,
        'status' => 1
    ];
});
