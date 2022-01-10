<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['name one','name tow','name three'];

        foreach ($name as $data) {

            \App\Models\Gob::create([
                'name'       => $data,
                'email'      => 'test@gmail.com',
                'phone'      => '011345425245',
                'count'      => '5',
                'description'=> 'description',
                'start_data' => now(),
                'end_data'   => now(),
                'user_id'    => '1',
            ]);
            
        }//end of foreach

    }//end of run

}//end of class
