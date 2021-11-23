<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryDealerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['مزارع','تاجر','مصنع','شركه','الشحن'];

        foreach ($name as $data) {

            \App\Models\CategoryDealer::create([
                'name_ar' => $data,
                'name_en' => $data,
            ]);
            
        }//end of foreach

    }//end of run
    
}//end of class
