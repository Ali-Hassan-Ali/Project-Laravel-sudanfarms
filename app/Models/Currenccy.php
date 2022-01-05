<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currenccy extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('created_at' , 'like', "%$search%")
            ->orWhere('amount', 'like', "%$search%");
        });
        
    }//end of scopeWhenSearch`
    
}//end of model
