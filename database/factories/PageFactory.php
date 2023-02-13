<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Page;
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

$factory->define(Page::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->paragraph,
        'summary' => $faker->sentence,
        'seotitle' => $faker->sentence,
        'url' => $faker->url(),
        'metadescription' => $faker->sentence,
        'keywords' => $faker->sentence,
        'featured_image' => $faker->image('public/images/pages/',640,480, null, false),
        'image_caption' => $faker->word,
        'seo_bots' => "index",
        'status' => 1,    
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ];
});
