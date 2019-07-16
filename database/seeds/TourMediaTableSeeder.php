<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourMediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tourmedia = [];

        while (count($tourmedia) < 200) {
            $row = [
                'tour_id' => rand(1, 50),
                'media_id' => rand(1,50),
            ];

            if (in_array($row, $tourmedia))
                continue;
            $tourmedia[] = $row;
        }

        DB::table('tour_media')->insert($tourmedia);
    }

}

