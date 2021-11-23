<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BolgSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['title one','title tow','title three','title for','title fife'];

        foreach ($name as $data) {

            \App\Models\Blog::create([
                'title_ar'       => $data,
                'title_en'       => $data,
                'description_ar' => 'description_ar',
                'description_en' => 'description_en',
                'users_id'       => '1',
            ]);
            
        }//end of foreach

    }//end of run

}//end of class
