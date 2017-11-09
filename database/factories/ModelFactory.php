<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    $password = str_random(10);

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt($password),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'body' => $faker->text($maxNbChars = 1000),
        'image_id' => $faker->numberBetween($min = 1, $max = 10),
        'category_id' => function () {
            return \App\Models\Category::all()->random()->id;
        },
        'read_count' => $faker->numberBetween($min = 1, $max = 100),
        'is_analytic' => $faker->boolean($chanceOfGettingTrue = 40)
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Comment::class, function (Faker\Generator $faker) {

    return [
        'post_id' => function () {
            return \App\Models\Post::all()->random()->id;
        },
        'user_id' => function () {
            return \App\Models\User::all()->random()->id;
        },
        'body' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true)
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word
    ];
});
