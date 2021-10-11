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
        $user = \App\Models\User::create([
            'name'     => 'admin',
            'username' => 'admin',
            'phone'    => '123456789',
            'email'    => 'client@app.com',
            'country'  => 'country',
            'title'    => 'title',
            'city'     => 'city',
            'password' => bcrypt('123123123'),
        ]);

        $user->attachRole('clients');
    }
}
