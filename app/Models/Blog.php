<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['title','description','image_path'];

    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);

    }//end of get image path

    public function getDescriptionAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->title_ar;

        } else {

            return $this->title_en;
            
        }//end of if

    }//end of get description

    public function getTitleAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->title_ar;

        } else {

            return $this->title_en;
            
        }//end of if

    }//end of get title

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('title_ar' , 'like', "%$search%")
            ->orWhere('title_en', 'like', "%$search%")
            ->orWhere('description_ar', 'like', "%$search%")
            ->orWhere('description_en', 'like', "%$search%");
        });
        
    }//end of scopeWhenSearch`

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }//end of hasMany user

}//end of model
