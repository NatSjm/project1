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

        foreach ($tourTypesNames as $key => $tourType){
            $tourTypes[] = [
            'name' => $tourType,
            'icon' => $icons[$key],
            'created_at' => now(),
            'updated_at' => now(),
            ];
        }

         DB::table('tour_types')->insert($tourTypes);
    }
}
