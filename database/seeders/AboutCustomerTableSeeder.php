<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AboutCustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['title_ one','title_ tow','title_ three'];

        foreach ($name as $data) {

            \App\Models\AboutCustomer::create([
                'title_ar'       => $data,
                'title_en'       => $data,
                'name'           => 'علي حسن',
                'body_ar'        => 'هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.',

                'body_en'        => 'هThis fake text is an alternative to other text It will be replaced by real text when you change the content of the site This is fake text is a replacement for other text It will be replaced by real text when you change the content of the site',
            ]);
            
        }//end of foreach

    }//end of run

}//end of class
