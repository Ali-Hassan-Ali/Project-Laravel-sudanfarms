<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingBannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['title one','title tow','title three','title for'];

        foreach ($name as $name) {

            \App\Models\SettingBanner::create([
                'title_ar'       => $name,
                'title_en'       => $name,
                'description_ar' => 'هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.',
                'description_en' => 'هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.',
            ]);

        }//end of foreach

    }//end of run

}//end if class
