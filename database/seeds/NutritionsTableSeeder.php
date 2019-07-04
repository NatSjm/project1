<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NutritionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nutritionTypes = ['завтрак', 'завтрак и ужин', 'без питания'];

        foreach ($nutritionTypes as $nutr){
            $newNutrition = new App\Models\Nutrition;

            $newNutrition->nutrition_type = $nutr;

            $newNutrition->save();
        }

        }




}
