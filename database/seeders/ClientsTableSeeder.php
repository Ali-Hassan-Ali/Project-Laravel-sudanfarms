<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = ['client','clients2','clients3','clients4','clients5','clients6','clients7','clients8','clients9'];

        foreach ($users as $key => $name) {
            
            $user = \App\Models\User::create([
                'name'     => $name,
                'username' => $name,
                'phone'    => '123456789',
                'email'    => $name . '@app.com',
                'country'  => 'country',
                'title'    => 'title',
                'city'     => 'city',
                'password' => bcrypt('123123123'),
            ]);

            $user->attachRole('clients');
            
        }//end of foreach 

    }//end of run

}//end of class
