<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OfferSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorys = ['1','2','3','4','5','6','7','8'];

        foreach ($categorys as $key => $id) {
            
            \App\Models\Offer::create([
                'category_id' => $id,
            ]);
            
        }//end of foreach 

    }//end of run

}//end of class
