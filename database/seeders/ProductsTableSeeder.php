<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['1','2','3','4','5'];

        foreach ($name as $data) {
            
            $product = \App\Models\Product::create([
                'name_ar'            => 'name ar',
                'name_en'            => 'name en',
                'quantity'           => '22',
                'slug'               => str::slug('name ar' . ' ' . $data, '_'),
                'units_id'           => '1',
                'start_time'         => now()->toDateString(),
                'end_time'           => now()->toDateString(),
                'description_ar'     => 'description ar',
                'description_en'     => 'description en',
                'conditions_ar'      => 'دفع 30 في المية من قيمة البضاعة والباقي مع البوليصة والسعر بالدولار',
                'conditions_en'      => 'Pay 30% of the value of the goods and the rest with the policy and the price is in dollars',
                // 'stars'              => '4',
                'price'              => '200',
                'sub_category_id'    => $data,
                'user_id'            => '1',
            ]);

        }//end of foreach

        foreach ($name as $data) {

            \App\Models\ImageProduct::create([
                'product_id'    => $data,
            ]);

            \App\Models\ImageProduct::create([
                'product_id'    => $data,
            ]);

            \App\Models\ImageProduct::create([
                'product_id'    => $data,
            ]);

            \App\Models\ImageProduct::create([
                'product_id'    => $data,
            ]);

            \App\Models\ImageProduct::create([
                'product_id'    => $data,
            ]);

        }//end of foreach

        foreach ($name as $data) {
            
            $product = \App\Models\Product::create([
                'name_ar'            => 'name ar',
                'name_en'            => 'name en',
                'slug'               => str::slug('name ar ar' . ' ' . $data, '_'),
                'quantity'           => '22',
                'units_id'           => '1',
                'start_time'         => now()->toDateString(),
                'end_time'           => now()->toDateString(),
                'description_ar'     => 'description ar',
                'description_en'     => 'description en',
                'conditions_ar'      => 'دفع 30 في المية من قيمة البضاعة والباقي مع البوليصة والسعر بالدولار',
                'conditions_en'      => 'Pay 30% of the value of the goods and the rest with the policy and the price is in dollars',
                // 'stars'              => '4',
                'price'              => '200',
                'sub_category_id'    => $data,
                'user_id'            => '1',
            ]);

        }//end of foreach

        $name_new = ['6','7','8','9','10'];
        
        foreach ($name_new as $data) {

            \App\Models\ImageProduct::create([
                'product_id'    => $data,
            ]);

            \App\Models\ImageProduct::create([
                'product_id'    => $data,
            ]);

            \App\Models\ImageProduct::create([
                'product_id'    => $data,
            ]);

            \App\Models\ImageProduct::create([
                'product_id'    => $data,
            ]);

            \App\Models\ImageProduct::create([
                'product_id'    => $data,
            ]);

        }//end of foreach

    }//end of run

}//end of class
