<?php

use Illuminate\Database\Seeder;
//use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TourTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tourTypesNames =  ['Индустриальный', 'Luxury', 'Все включено',
                            'Семейный отдых', 'Гастрономический', 'Спокойный отдых',
                            'Программа развлечений', 'Шоппинг', 'Экстрим',
                            'Пляжный', 'SPA'];
        $icons = ['industrial', 'shopping', 'bike', 'boat', 'flower', 'entertainment', 'pool',
                 'gastronomic', 'family', 'spa', 'camera'];
        $tourTypes = [];

        for ($i = 0; $i <= 10; $i++){
            $tourTypes[] = [
            'name' => $tourTypesNames[$i],
            'icon' => $icons[$i],
            'created_at' => now(),
            'updated_at' => now(),
            ];
        }

         DB::table('tour_types')->insert($tourTypes);
    }
}
