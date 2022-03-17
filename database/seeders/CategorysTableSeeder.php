<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'slug'    => str::slug('Vegetables', '_'),
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'الفواكة',
            'name_en' => 'Fruits',
            'slug'    => str::slug('Fruits', '_'),
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'الحبوب',
            'name_en' => 'Cereal',
            'slug'    => str::slug('Cereal', '_'),
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'المواشي و الأغنام',
            'name_en' => 'Livestock And Sheep',
            'slug'    => str::slug('Livestock And Sheep', '_'),
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'الدواجن و الطيور',
            'name_en' => 'Poultry And Birds',
            'slug'    => str::slug('Poultry And Birds', '_'),
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'الأعلاف',
            'name_en' => 'Feed',
            'slug'    => str::slug('Feed', '_'),
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'الحليب و مشتقاته',
            'name_en' => 'Milk And Dairy Products',
            'slug'    => str::slug('Milk And Dairy Products', '_'),
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'التمور',
            'name_en' => 'Dates',
            'slug'    => str::slug('Dates', '_'),
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'البهارات',
            'name_en' => 'Spices',
            'slug'    => str::slug('Spices', '_'),
        ]);

    }//end of run
    
}//end of class
