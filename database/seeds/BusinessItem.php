<?php

use Illuminate\Database\Seeder;

class BusinessItem extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->testDatabase();

    }
    public function testDatabase()
    {
        factory(App\BusinessItem::class, 50)->create()->each(function ($item) {
            $item->save();
        });        
    }
}
