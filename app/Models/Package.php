<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('price' , 'like', "%$search%")
            ->orWhere('data', 'like', "%$search%")
            ->orWhere('qty_product', 'like', "%$search%");
        });
        
    }//end of scopeWhenSearch`
    
}//end of model
