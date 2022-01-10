<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PriceTableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $name = ['name one','name tow','name three'];

        foreach ($name as $data) {

            \App\Models\PriceTable::create([
                'name_ar'     => $data,
                'name_en'     => $data,
                'title_ar'    => $data,
                'title_en'    => $data,
                'price'       => '300',
            ]);
            
        }//end of foreach


    }//end of run

}//end of seeder
