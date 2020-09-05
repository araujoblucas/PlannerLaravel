<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FastTask;
use Faker\Generator as Faker;

$factory->define(FastTask::class, function (Faker $faker) {
    return [
        'fast_task' => $faker->sentence(),
        'owner_id' => 1,
        'completed' => $faker->boolean()
    ];
});
