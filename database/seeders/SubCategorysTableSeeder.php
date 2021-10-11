<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubCategorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = ['sub cat one','sub cat tow','sub cat three','sub cat for'];

        foreach ($cat as  $data) {

            \App\Models\Categorey::create([
                'name_ar' => $data,
                'name_en' => $data,
                'sub_categoreys' => '1',
            ]);
        
        }
    }
}
