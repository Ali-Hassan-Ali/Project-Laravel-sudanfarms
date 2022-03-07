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
            'name_ar'      => 'قطعه',
            'name_en'      => 'item',
        ]);

        \App\Models\Unit::create([
            'name_ar'      => 'طن',
            'name_en'      => 'tons',
        ]);

        \App\Models\Unit::create([
            'name_ar'      => 'غرام',
            'name_en'      => 'Gram',
        ]);

        \App\Models\Unit::create([
            'name_ar'      => 'رطل',
            'name_en'      => 'pound',
        ]);

        \App\Models\Unit::create([
            'name_ar'      => 'المتر',
            'name_en'      => 'meter',
        ]);

    }//end of run

}//end of seeder
