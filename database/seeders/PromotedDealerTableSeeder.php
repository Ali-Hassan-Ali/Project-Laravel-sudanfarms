<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PromotedDealerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['شركة سيدتك للزراعة','شركة حلا الدولية',''];

        foreach ($name as  $data) {
            
            \App\Models\PromotedDealer::create([
                'user_id'            => '1',
                'company_name_ar'    => $data,
                'company_name_en'    => $data,
                'category_dealer_id' => '1',
                'email'              => 'email@gmail.com',
                'phone_master'       => '123143413',
                'phone'              => '123143413',
                'other_phone'        => '123143413',
                'web_site'           => 'web-site.com',
                'country'            => 'country',
                'city'               => 'city',
                'title'              => 'title',
                'description'        => 'description',
            ]);
        }//end of foreach

    }//end of run 

}//end of class