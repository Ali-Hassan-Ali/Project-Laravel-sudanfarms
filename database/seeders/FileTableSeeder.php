<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['ملف عن المزارع حول السودان','ملف عن التجار حول السودان','ملف عن البيع حول السودان'];

        foreach ($name as $data) {

            \App\Models\File::create([
                'title_ar' => $data,
                'title_en' => $data,
            ]);
            
        }//end of foreach

    }//end of run

}//end of class
