<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
            'email'    => 'super_admin@app.com',
            'password' => bcrypt('123123123'),
        ]);

        $user->attachRole('super_admin');

         \App\Models\PromotedDealer::create([
                'user_id'            => $user->id,
                'company_name'       => 'مزارع السودان',
                'packages_id'        => '1',
                'category_dealer_id' => '1',
                'email'              => $user->email,
                'phone_master'       => '123143413',
                'phone'              => '123143413',
                'other_phone'        => '123143413',
                'web_site'           => 'web-site.com',
                'country'            => 'sudan',
                'city'               => 'sudan',
                'title'              => 'title',
                'description'        => 'description',
            ]);

    }//end of run
    
}//end of class
