<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            'Khartoum'      => 'الخرطوم', 
            'Island State'  => 'ولاية الجزيرة', 
            'Red Sea State' => 'ولاية البحر الأحمر', 
            'kasalan'       => 'كسلا', 
            'Gedaref'       => 'القضارف', 
            'Sennar State'  => 'ولاية سنار', 
            'White Nile'    => 'النيل الأبيض', 
            'Blue Nile'     => 'ولاية النيل الأزرق', 
            'North'         => 'الشمالية', 
            'The Nile River'=> 'نهر النيل', 
            'North Kordofan'=> 'شمال كردفان', 
            'West Kordofan' => 'غرب كردفان', 
            'South Kordofan'=> 'جنوب كردفان', 
            'North Darfur'  => 'شمال دارفور', 
            'West Darfur'   => 'غرب دارفور', 
            'South Darfur'  => 'جنوب دارفور', 
            'East Darfur'   => 'شرق دارفور', 
            'Central Darfur'=> 'وسط دارفور', 
        ];

        foreach ($states as $name_en=>$name_ar) {

            \App\Models\Country::create([
                'name_ar'  => $name_ar,
                'name_ar'  => $name_en,
                'parent_id'=> 1,
            ]);
            
        }//end of foreach

    }//end of run

}//end of class
