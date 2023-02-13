<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BusinessItem;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;
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

$factory->define(BusinessItem::class, function (Faker $faker) {
    return [
        'business_id' => 1,
        'item_type_id' =>  5,
        'title' => $faker->name,
        'description' => $faker->sentence,
        'summary' => $faker->word,
        'original_price' => $faker->randomNumber(4),
        'discount_price' => $faker->randomNumber(4),
        'in_stock' => 1,
        'status' => 1,        
        'is_product' => 1, 
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ];
});
