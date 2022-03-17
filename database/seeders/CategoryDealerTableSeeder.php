<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
                'slug'    => str::slug($data, '_'),
            ]);
            
        }//end of foreach

    }//end of run
    
}//end of class
