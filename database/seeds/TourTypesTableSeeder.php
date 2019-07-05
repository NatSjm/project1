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
    public function run ()
    {
        $tourTypesNames = ['Индустриальный', 'Шоппинг', 'Экстрим', 'Luxury', 'Все включено', 'Программа развлечений',
                           'Пляжный', 'Гастрономический',  'Семейный отдых', 'SPA','Спокойный отдых'];
        $icons = ['industrial', 'shopping', 'bike', 'boat', 'flower', 'entertainment', 'pool',
                  'gastronomic', 'family', 'spa', 'camera'];


        foreach ($tourTypesNames as $key => $tourType) {
            App\Models\Tourtype::create([
                'name' => $tourType,
                'icon' => $icons[$key],
            ]);
        }
    }
}
