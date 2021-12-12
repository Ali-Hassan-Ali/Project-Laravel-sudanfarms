<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutCustomer extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['body','title','image_path'];

    public function getBodyAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->body_ar;

        } else {

            return $this->body_en;
            
        }//end of if

    }//end of get body

    public function getTitleAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->title_ar;

        } else {

            return $this->title_en;
            
        }//end of if

    }//end of get title

    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);

    }//end of get image path

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('body_ar' , 'like', "%$search%")
            ->orWhere('body_en', 'like', "%$search%");
        });
        
    }//end of scope WhenSearch`

}//end of model
