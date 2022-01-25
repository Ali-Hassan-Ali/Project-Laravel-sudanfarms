<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use AmrShawky\LaravelCurrency\Facade\Currency;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $currency = \AmrShawky\LaravelCurrency\Facade\Currency::convert()
        // ->from('USD')
        // ->to('SDG')
        // ->amount(1)
        // ->get();

        // if ($currency) {
            
        //     $currency = $currency;

        // } else {

        //     $currency = '450';

        // }
        
         \App\Models\Currenccy::create([
            'amount' => number_format(preg_replace('/,/', '', '450'),2),
        ]);
        
    }//end of run

}//end of seeder
