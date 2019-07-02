<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesNames = ['Автобусные туры', 'Авиационные туры', 'Круизы'];
        $categories =[];

        for ($i = 0; $i <= 2; $i++) {
            $tourTypes[] = [
                'name' => $categoriesNames[$i],
            ];
        }
        DB::table('categories')->insert($categories);
    }
}
