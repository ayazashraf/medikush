<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //$this->call(UserSeeder::class);
         $this->testDatabase();

    }
    public function testDatabase()
    {
        //$users = factory(App\User::class, 50)->make();

      /*  factory(App\User::class, 50)->create()->each(function ($user) {
            $user->save();
        });

factory(App\BusinessItem::class, 50)->create()->each(function ($item) {
    $item->save();
}); 

factory(App\Admin::class, 10)->create()->each(function ($user) {
    $user->save();
});

factory(App\Page::class, 50)->create()->each(function ($user) {
    $user->save();
});
*/
factory(App\Blog::class, 50)->create()->each(function ($user) {
    $user->save();
});
        // Use model in tests...
    }
}
