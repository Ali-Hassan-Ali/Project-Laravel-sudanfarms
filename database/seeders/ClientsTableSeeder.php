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
        $users = ['client','client2','client3','client4','client5','client6','client7','client8','client9'];

        foreach ($users as $key => $name) {
            
            $user = \App\Models\User::create([
                'name'     => $name,
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
