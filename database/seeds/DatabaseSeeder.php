<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run ()
    {
        factory(\App\Models\User::class, 40)->create();
        $this->call(TourTypesTableSeeder::class);
        factory(\App\Models\Country::class, 40)->create();
        factory(\App\Models\City::class, 80)->create();
        factory(\App\Models\Location::class, 100)->create();
        factory(\App\Models\Deal::class, 20)->create();
        factory(\App\Models\Media::class, 300)->create();
        $this->call(CategoriesTableSeeder::class);
        $this->call(NutritionsTableSeeder::class);
        $this->call(HotelsTableSeeder::class);
        factory(\App\Models\Tour::class, 300)->create();
        factory(\App\Models\Order::class, 60)->create();
        factory(\App\Models\Comment::class, 400)->create();
        $this->call(TourMediaTableSeeder::class);

    }
}
