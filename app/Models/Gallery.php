<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['name','image_path'];

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
        });
        
    }//end of scope WhenSearch`

    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);

    }//end of get image path

}//end of models
