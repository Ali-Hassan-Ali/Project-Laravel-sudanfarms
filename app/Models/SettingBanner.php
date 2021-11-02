<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingBanner extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['title','description','image_path'];

    public function getTitleAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->title_ar;

        } else {

            return $this->title_en;
            
        }//end of if

    }//end of get name
    

    public function getDescriptionAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->description_ar;

        } else {

            return $this->description_en;
            
        }//end of if

    }//end of get description


    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);

    }//end of get image path


    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('title_ar' , 'like', "%$search%")
            ->orWhere('title_en', 'like', "%$search%")
            ->orWhere('description_ar', 'like', "%$search%")
            ->orWhere('description_en', 'like', "%$search%");
        });
        
    }//end of scopeWhenSearch`


}//end of model
