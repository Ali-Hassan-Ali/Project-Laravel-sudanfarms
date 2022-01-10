<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Models\Currenccy;

class generateCurrencys extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create currencys';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currency = Currency::convert()
        ->from('USD')
        ->to('SDG')
        ->amount(1)
        ->get();

        if ($currency) {
            
            $currency = $currency;

        } else {
            
            $curr     = Currenccy::first();
            $currency = $curr->amount;
        }
        
        Currenccy::create([
            'amount' => number_format(preg_replace('/,/', '', $currency),2),
        ]);

    }//end of handle

}//end of Command
