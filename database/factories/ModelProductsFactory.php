<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Products::class, function (Faker $faker) {
    return [
        //
        'product_name' => $faker->word,
        'product_price' => $faker->numberBetween(100,1000),
    ];
});
