<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['title','file_path'];

    public function getTitleAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->title_ar;

        } else {

            return $this->title_en;
            
        }//end of if

    }//end of get name

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('title_ar' , 'like', "%$search%")
            ->orWhere('title_en', 'like', "%$search%");
        });
        
    }//end of scopeWhenSearch`

    public function getFilePathAttribute()
    {
        return asset('storage/' . $this->file_files);

    }//end of get file path


}//end of model
