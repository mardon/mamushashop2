<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    $name = $faker->word;
    return [
        'name' => $name,
        'slug' => $name,
    ];

});

$factory->define(App\Product::class, function (Faker $faker) {
    $name = $faker->word();

    return [
        'category_id' => $faker->numberBetween($min = 1, $max = 10),
        'sku' => $faker->randomNumber(5),
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->text(150),
        'price' => $faker->randomNumber(4),
        'quantity' => $faker->numberBetween($min = 1, $max = 20),
    ];
});
