<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RequestCustmersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['1','2','3','4','5'];

        foreach ($name as  $data) {
            
            \App\Models\RequestCustmer::create([
                'name'               => 'حلا الدولية',
                'product_name'       => 'فلفل طازج',
                'title'              => 'الخرطوم',
                'phone'              => '+249 114929635',
                'email'              => 'alihassanali@gmail.com',
                'quantity_guard'     => 'قطعة',
                'date_shipment'      => Carbon::create('2021', '02', '01'),
                'end_time'           => Carbon::create('2021', '03', '01'),
                'quantity'           => '24',
                'user_id'            => $data,
                'promoted_dealer_id' => $data,
            ]);
            
        }//end of foreach

    }//end of run

}//end of class
