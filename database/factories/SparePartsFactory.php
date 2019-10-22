<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use OEMS\SpareParts;
use Faker\Generator as Faker;
use Faker\Provider\ar_SA\Person;
use Illuminate\Support\Str;


$factory->define(SpareParts::class, function (Faker $faker) {
    return [
        'code' => $faker->buildingNumber,
        'name' => $faker->name,
        'type' => $faker->creditCardType,
        'line' => $faker->fileExtension,
        'location' => $faker->cityPrefix,
        'stock_quantity' => $faker->randomDigitNotNull,
        'minimum_stock' => $faker->randomDigitNotNull,
        'unit' => $faker->currencyCode,
        'currency' => $faker->currencyCode,
        'price' => $faker->year,
        'supplier' => $faker->company,
        'registrant_id' => $faker->randomDigit
    ];
});
