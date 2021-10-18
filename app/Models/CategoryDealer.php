<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDealer extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->name_ar;

        } else {

            return $this->name_en;
            
        }//end of if

    }//end of get name

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('name_ar' , 'like', "%$search%")
            ->orWhere('name_en', 'like', "%$search%");
            // ->orWhere('phone', 'like', "%$search%");
        });
        
    }//end ofscopeWhenSearch`

}//end of model
