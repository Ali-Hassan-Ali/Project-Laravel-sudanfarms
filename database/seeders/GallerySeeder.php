<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gallery_categorys = ['fruits','Vegetables','cereal','canned food'];

        foreach ($gallery_categorys as $key => $name) {
            
            \App\Models\GalleryCategory::create([
                'name_ar' => $name,
                'name_en' => $name,
            ]);
            
        }//end of foreach 

        foreach ($gallery_categorys as $key => $name) {

            \App\Models\Gallery::create([
                'name_ar'               => $name,
                'name_en'               => $name,
                'gallery_categories_id' => '1',
            ]);
            
        }//end of foreach 

        foreach ($gallery_categorys as $key => $name) {

            \App\Models\Gallery::create([
                'name_ar'               => $name,
                'name_en'               => $name,
                'gallery_categories_id' => '2',
            ]);
            
        }//end of foreach 

        foreach ($gallery_categorys as $key => $name) {

            \App\Models\Gallery::create([
                'name_ar'               => $name,
                'name_en'               => $name,
                'gallery_categories_id' => '3',
            ]);
            
        }//end of foreach 

        foreach ($gallery_categorys as $key => $name) {

            \App\Models\Gallery::create([
                'name_ar'               => $name,
                'name_en'               => $name,
                'gallery_categories_id' => '4',
            ]);
            
        }//end of foreach 

    }//end of run

}//end of class
