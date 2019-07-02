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
        factory(\App\Models\User::class, 10)->create();
        $this->call(TourTypesTableSeeder::class);
        factory(\App\Models\Country::class, 10)->create();
        factory(\App\Models\City::class, 20)->create();
        factory(\App\Models\Location::class, 30)->create();
        factory(\App\Models\Deal::class, 10)->create();
        factory(\App\Models\Media::class, 50)->create();
        $this->call(CategoriesTableSeeder::class);
        //factory(\App\Models\Order::class, 30)->create();


    }
}
