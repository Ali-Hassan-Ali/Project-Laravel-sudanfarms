<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = ['cat one','cat tow','cat three','cat for'];

        foreach ($cat as  $data) {

            \App\Models\Categorey::create([
                'name_ar' => $data,
                'name_en' => $data,
            ]);
        
        }
    }
}
