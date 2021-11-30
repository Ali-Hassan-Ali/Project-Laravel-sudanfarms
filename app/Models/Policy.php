<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['title','body'];

    public function getTitleAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->title_ar;

        } else {

            return $this->title_en;
            
        }//end of if

    }//end of get title

    public function getBodyAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->body_ar;

        } else {

            return $this->body_en;
            
        }//end of if

    }//end of get body

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('title_ar' , 'like', "%$search%")
            ->orWhere('title_en', 'like', "%$search%")
            ->orWhere('body_ar', 'like', "%$search%")
            ->orWhere('body_ar', 'like', "%$search%")
            ->orWhere('guard', 'like', "%$search%");
        });
        
    }//end of scopeWhenSearch`

}//end of model
