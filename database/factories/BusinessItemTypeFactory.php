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

$factory->define(BusinessItemType::class, function (Faker $faker) {
    return [
        'business_id' => 1,
        'item_type_id' =>  $faker->unique()->numberBetween($min = 1, $max = 4),
        'title' => $faker->name,
        'decsription' => $faker->sentence,
        'summary' => $faker->word,
        'original_price' => $faker->unique()->randomDigit,
        'discount_price' => $faker->unique()->randomDigit,
        'in_stock' => 1,
        'status' => 1,        
        'is_product' => 1, 
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),        
    ];
});
