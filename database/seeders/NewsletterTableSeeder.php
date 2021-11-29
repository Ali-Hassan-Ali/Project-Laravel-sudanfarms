<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NewsletterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emails = ['ah965961@gmail.com','alihassanalimadny@gmail.comx@gmail.com'];

        foreach ($emails as $email) {
            
            \App\Models\Newsletter::create([
                'email' => $email,
            ]);
            
        }//end of foreach 

    }//end of run

}//end of class 
