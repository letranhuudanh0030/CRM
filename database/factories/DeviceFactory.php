<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Branch;
use App\Device;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Device::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'device_id' => $faker->uuid(),
        'status' => 1,
    ];
});
