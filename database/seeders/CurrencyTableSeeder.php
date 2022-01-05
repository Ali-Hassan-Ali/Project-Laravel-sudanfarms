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
        $currency = Currency::convert()
        ->from('USD')
        ->to('SDG')
        ->amount(1)
        ->get();
        
         \App\Models\Currenccy::create([
            'amount' => number_format(preg_replace('/,/', '', $currency),2),
        ]);
        
    }//end of run

}//end of seeder
