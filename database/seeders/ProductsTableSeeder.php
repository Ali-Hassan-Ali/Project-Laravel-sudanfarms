<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
                'quantity_guard_ar'  => 'guard ar',
                'quantity_guard_en'  => 'guard en',
                'start_time'         => '200',
                'end_time'           => '200',
                'description_ar'     => 'description ar',
                'description_en'     => 'description en',
                'stars'              => '4',
                'price'              => '200',
                'sub_category_id'    => $data,
                'user_id'            => '1',
            ]);

        }//end of foreach

        foreach ($name as $data) {

            \App\Models\ImageProduct::create([
                'product_id'    => $data,
            ]);

        }//end of foreach

        foreach ($name as $data) {
            
            $product = \App\Models\Product::create([
                'name_ar'            => 'name ar',
                'name_en'            => 'name en',
                'quantity'           => '22',
                'quantity_guard_ar'  => 'guard ar',
                'quantity_guard_en'  => 'guard en',
                'start_time'         => '200',
                'end_time'           => '200',
                'description_ar'     => 'description ar',
                'description_en'     => 'description en',
                'stars'              => '4',
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

        }//end of foreach

    }//end of run

}//end of class
