<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['name','description','quantity_guard','condition'];

    public function getNameAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->name_ar;

        } else {

            return $this->name_en;
            
        }//end of if

    }//end of get name

    public function getDescriptionAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->description_ar;

        } else {

            return $this->description_en;
            
        }//end of if

    }//end of get name

    public function getQuantityGuardAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->quantity_guard_ar;

        } else {

            return $this->quantity_guard_en;
            
        }//end of if

    }//end of get description

    public function getConditionAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->conditions_ar;

        } else {

            return $this->conditions_en;
            
        }//end of if

    }//end of get condition

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('name_ar' , 'like', "%$search%")
            ->orWhere('name_en', 'like', "%$search%")
            ->orWhere('description_ar', 'like', "%$search%")
            ->orWhere('description_ar', 'like', "%$search%")
            ->orWhere('price', 'like', "%$search%")
            ->orWhere('price_decount', 'like', "%$search%")
            ->orWhere('quantity', 'like', "%$search%");
        });
        
    }//end of scopeWhenSearch`

    public function user()
    {
        return $this->belongsTo(User::class);
    }//end of belongsTo user

    public function category()
    {
        return $this->belongsTo(Categorey::class,'sub_category_id');
    }//end of belongsTo category

    public function imageProduct()
    {
        return $this->hasMany(imageProduct::class,'product_id');
    }//end of hasMany image product
    
}//end of model
