<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $name = ['ah965961@gmail.com', 'alihassanalimadny@gmail.com', 'enginery.ali.hassan@gmail.com'];

        foreach ($name as $data) {

            \App\Models\Contact::create([
                'name'    => 'name user',
                'email'   => $data,
                'body'    => 'علي حسن',
                'message' => 'هThis fake text is an alternative to other text It will be replaced by real text when you change the content of the site This is fake text is a replacement for other text It will be replaced by real text when you change the content of the site',
            ]);

        } //end of foreach

    } //end of run

} //end of class
