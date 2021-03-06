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
        $name = ['شركة سيدتك للزراعة','شركة قريت إيرث','شركة حلا الدولية','شركة تست للزراعة','شركة الزراعة الدولية'];

        foreach ($name as $id=>$data) {
            
            \App\Models\PromotedDealer::create([
                'user_id'            => $id+2,
                'company_name'       => $data,
                'company_logo'       => 'company_logo/sudan.png',
                'packages_id'        => '1',
                'category_dealer_id' => '1',
                'email'              => 'email@gmail.com',
                'phone_master'       => '123143413',
                'phone'              => '123143413',
                'other_phone'        => '123143413',
                'web_site'           => 'web-site.com',
                'country_id'         => 181,
                'city_id'            => 3110,
                'title'              => 'title',
                'description'        => 'description',
            ]);
            
        }//end of foreach

    }//end of run 

}//end of class
