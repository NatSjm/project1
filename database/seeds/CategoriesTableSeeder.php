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
    public function run ()
    {
        $categoriesNames = ['Автобусные туры', 'Авиационные туры', 'Круизы'];

        foreach ($categoriesNames as $cat) {
            App\Models\Category::create([
                'name' => $cat]);

        }
    }
}
