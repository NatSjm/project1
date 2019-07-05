<?php

use Illuminate\Database\Seeder;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {


        for ($i = 1; $i < 5; $i++) {

            App\Models\Hotel::create([
                'hotel_class' => $i]);
//            $newHotel = new App\Models\Hotel;
//
//            $newHotel->hotel_class = $i;
//
//            $newHotel->save();
        }

    }
}
