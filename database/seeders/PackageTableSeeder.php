<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = ['2', '4', '7', '12'];

        foreach ($packages as $key => $name) {

            \App\Models\Package::create([
                'guard'       => 1,
                'price'       => 200,
                'month'       => $name,
                'qty_product' => 4,
            ]);

        } //end of foreach

    } //end of run

} //end of class
