<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceTable extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['name','title','new_price'];

    public function getNameAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->name_ar;

        } else {

            return $this->name_en;
            
        }//end of if

    }//end of get name

    public function getTitleAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->title_ar;

        } else {

            return $this->title_en;
            
        }//end of if

    }//end of get title

    public function getNewPriceAttribute()
    {
        $amount = Currenccy::first();

        $totle  = $this->price * $amount->amount;

        return number_format(preg_replace('/,/', '', $totle),2);

    }//end of new price decount

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('name_ar' , 'like', "%$search%")
            ->orWhere('name_en', 'like', "%$search%")
            ->orWhere('title_ar', 'like', "%$search%")
            ->orWhere('title_ar', 'like', "%$search%")
            ->orWhere('price', 'like', "%$search%");
        });
        
    }//end of scope When Search`

}//end of model
