<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Branch;
use App\Device;
use App\Maintenance;
use App\User;
use Faker\Generator as Faker;

$factory->define(Maintenance::class, function (Faker $faker) {
    return [
        'device_id' => Device::get(['id'])->random()->id,
        'device_damaged' => $faker->paragraph(),
        'user_id' => User::get(['id'])->random()->id,
        'branch_id' => Branch::get(['id'])->random()->id,
        'technicians_id' => User::get(['id'])->random()->id,
        'result' => $faker->numberBetween($min = 0, $max = 2),
        'note' => $faker->paragraph(),
        'required_date' => $faker->dateTime(),
        'success_date' => $faker->dateTime(),
        'status' => 1
    ];
});
