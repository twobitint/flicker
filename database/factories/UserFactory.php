<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Http;

/**
 * Gather some realistic fake user data from an api.
 */
$users = Http::get('https://randomuser.me/api/?results=100')->json()['results'];

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

$factory->define(User::class, function (Faker $faker) use ($users) {
    $user = $faker->unique()->randomElement($users);
    return [
        'name' => $user['name']['first'] . ' ' . $user['name']['last'],
        'nickname' => null,
        'email' => $user['email'],

        'facebook_id' => $faker->unique()->numberBetween(10000000, 99999999),
        'facebook_avatar' => $user['picture']['thumbnail'],
        'facebook_token' => $faker->sha256,
        'facebook_refresh_token' => null,
        'facebook_expires_in' => $faker->numberBetween(60 * 60 * 24, 60 * 60 * 24 * 60),
        'remember_token' => null,
    ];
});
