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

        \App\Models\Categorey::create([
            'name_ar' => 'الخضروات',
            'name_en' => 'Vegetables',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'الفواكة',
            'name_en' => 'Fruits',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'الحبوب',
            'name_en' => 'Cereal',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'المواشي و الأغنام',
            'name_en' => 'Livestock And Sheep',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'الدواجن و الطيور',
            'name_en' => 'Poultry And Birds',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'الأعلاف',
            'name_en' => 'Feed',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'الحليب و مشتقاته',
            'name_en' => 'Milk And Dairy Products',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'التمور',
            'name_en' => 'Dates',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'البهارات',
            'name_en' => 'Spices',
        ]);

    }//end of run
    
}//end of class
