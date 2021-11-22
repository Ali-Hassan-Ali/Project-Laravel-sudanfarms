<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $video_categorys = ['software','seminars','about farms'];

        foreach ($video_categorys as $key => $name) {
            
            \App\Models\VideoCategory::create([
                'name_ar' => $name,
                'name_en' => $name,
            ]);
            
        }//end of foreach 

        foreach ($video_categorys as $key => $name) {

            \App\Models\Video::create([
                'name_ar'               => $name,
                'name_en'               => $name,
                'video_categories_id'   => '1',
            ]);
            
        }//end of foreach 

        foreach ($video_categorys as $key => $name) {

            \App\Models\Video::create([
                'name_ar'               => $name,
                'name_en'               => $name,
                'video_categories_id'   => '2',
            ]);
            
        }//end of foreach 

        foreach ($video_categorys as $key => $name) {

            \App\Models\Video::create([
                'name_ar'               => $name,
                'name_en'               => $name,
                'video_categories_id'   => '3',
            ]);
            
        }//end of foreach 

    }//end of run

}//end of seeder
