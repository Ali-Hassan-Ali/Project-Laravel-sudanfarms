<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Unit::create([
            'name_ar'      => 'item',
            'name_en'      => 'قطعه',
        ]);

        \App\Models\Unit::create([
            'name_ar'      => 'tons',
            'name_en'      => 'طن',
        ]);

        \App\Models\Unit::create([
            'name_ar'      => 'Gram',
            'name_en'      => 'غرام',
        ]);

        \App\Models\Unit::create([
            'name_ar'      => 'pound',
            'name_en'      => 'رطل',
        ]);

        \App\Models\Unit::create([
            'name_ar'      => 'meter',
            'name_en'      => 'المتر',
        ]);

    }//end of run

}//end of seeder
