<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
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

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => $faker->paragraph,
        'summary' => $faker->sentence,
        'author' => $faker->sentence,
        'seo_title' => $faker->sentence,
        'url' => $faker->url(),
        'tag_url' => $faker->url(),
        'metadescription' => $faker->sentence,
        'keywords' => $faker->sentence,
        'featured_image' => $faker->image('public/images/blogs/',640,480, null, false),
        'image_caption' => $faker->word,
        'tag' => $faker->word,
        'seo_bots' => "index",
        'status' => 1,    
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        'publish_date' => Carbon::now()->format('Y-m-d H:i:s'), 
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ];
});
