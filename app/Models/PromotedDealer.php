<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotedDealer extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['logo_path','file_path','name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }//end of user

    public function category_dealer()
    {
        return $this->belongsTo(CategoryDealer::class);
    }//end of category_dealer

    public function getLogoPathAttribute()
    {
        return asset('storage/' . $this->company_logo);

    }//end of get logo path

    public function getFilePathAttribute()
    {
        return asset('storage/' . $this->company_certificate);

    }//end of get file path

    public function getNameAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->company_name_ar;

        } else {

            return $this->company_name_en;
            
        }//end of if

    }//end of get file path

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('company_name_ar' , 'like', "%$search%")
            ->orWhere('company_name_en', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('phone_master', 'like', "%$search%")
            ->orWhere('phone', 'like', "%$search%")
            ->orWhere('other_phone', 'like', "%$search%")
            ->orWhere('country', 'like', "%$search%")
            ->orWhere('city', 'like', "%$search%")
            ->orWhere('title', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->orWhere('web_site', 'like', "%$search%");
        });
        
    }//end ofscopeWhenSearch`
    
}//end of model
