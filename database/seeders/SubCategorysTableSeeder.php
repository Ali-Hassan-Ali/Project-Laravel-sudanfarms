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
        
        \App\Models\Categorey::create([
            'name_ar' => 'ملفوفة',
            'name_en' => 'wrapped',
            'slug'    => str::slug('wrapped', '_'),
            'sub_categoreys' => '1',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'بروكلي',
            'name_en' => 'Broccoli',
            'slug'    => str::slug('Broccoli', '_'),
            'sub_categoreys' => '1',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'طماطم',
            'name_en' => 'tomatoes',
            'sub_categoreys' => '1',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'تفاح ',
            'name_en' => 'An apple',
            'sub_categoreys' => '2',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'برتغال',
            'name_en' => 'Portugal',
            'sub_categoreys' => '2',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'فور ',
            'name_en' => 'immediately',
            'sub_categoreys' => '2',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'سمسم ',
            'name_en' => 'Sesame',
            'sub_categoreys' => '3',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'قمح',
            'name_en' => 'Wheat',
            'sub_categoreys' => '3',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'دخن',
            'name_en' => 'smoke',
            'sub_categoreys' => '3',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'ابقار ',
            'name_en' => 'cows',
            'sub_categoreys' => '4',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'ابل ',
            'name_en' => 'Camel',
            'sub_categoreys' => '4',
        ]);

        \App\Models\Categorey::create([
            'name_ar' => 'حصين',
            'name_en' => 'immune',
            'sub_categoreys' => '4',
        ]);

         \App\Models\Categorey::create([
            'name_ar' => 'الحمام',
            'name_en' => 'the toilet',
            'sub_categoreys' => '5',
        ]);

         \App\Models\Categorey::create([
            'name_ar' => 'الدجاج',
            'name_en' => 'chicken',
            'sub_categoreys' => '5',
        ]);

         \App\Models\Categorey::create([
            'name_ar' => 'طيور السمان',
            'name_en' => 'quail birds',
            'sub_categoreys' => '5',
        ]);

         \App\Models\Categorey::create([
            'name_ar' => 'اعلاف ماشيه',
            'name_en' => 'cattle feed',
            'sub_categoreys' => '5',
        ]);

         \App\Models\Categorey::create([
            'name_ar' => 'اعلاف دواجن',
            'name_en' => 'poultry feed',
            'sub_categoreys' => '5',
        ]);

         \App\Models\Categorey::create([
            'name_ar' => '',
            'name_en' => 'immune',
            'sub_categoreys' => '5',
        ]);

    }//end of run
    
}//end of class
