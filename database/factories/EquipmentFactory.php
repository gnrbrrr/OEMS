<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use OEMS\Model;
use OEMS\Equipment;
use Faker\Generator as Faker;

$factory->define(Equipment::class, function (Faker $faker) {
    return [
        'equipment_name' => $faker->buildingNumber,
        'model' => $faker->name,
        'equipment_controller' => $faker->buildingNumber,
        'serial_number' => $faker->name,
        'fixed_asset_number' => $faker->buildingNumber,
        'manufacturer' => $faker->company,
        'working_capacity' => '12KVA',
        'line' => $faker->buildingNumber,
        'equipment_location' => $faker->buildingNumber,
        'section' => $faker->cityPrefix,
        'registrant_id' => $faker->randomDigit
    ];

});
