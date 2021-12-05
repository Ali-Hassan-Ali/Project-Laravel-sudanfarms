<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdvertisementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['Advertisemen one','Advertisemen tow','Advertisemen three'];

        foreach ($name as $data) {

            \App\Models\Advertisement::create([
                'title_ar'       => $data,
                'title_en'       => $data,
                'status'         => '1',
            ]);
            
        }//end of foreach
            
    }//end of run

}//end of class
