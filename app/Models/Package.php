<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['name','new_price','cury'];

    public function getNameAttribute()
    {
        if (app()->getLocale() == 'ar') {

            return $this->name_ar;

        } else {

            return $this->name_en;

        }//end of if

    }//end of get name attr

    public function getCuryAttribute()
    {
        return app()->getLocale() == 'ar' ? 'ج س' : 'SDG';

    }//end of new image path


    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('price' , 'like', "%$search%")
            ->orWhere('name_ar', 'like', "%$search%")
            ->orWhere('name_en', 'like', "%$search%")
            ->orWhere('data', 'like', "%$search%")
            ->orWhere('qty_product', 'like', "%$search%");
        });
        
    }//end of scopeWhenSearch`

    public function getNewPriceAttribute()
    {
        $amount = Currenccy::first();

        $totle  = $this->price * $amount->amount;

        return number_format(preg_replace('/,/', '', $totle),2);

    }//end of new price
    
}//end of model
