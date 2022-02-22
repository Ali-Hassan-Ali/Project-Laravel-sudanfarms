<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
        
    }//end of user

    public function item()
    {
        return $this->hasMany(OrderItem::class,'order_id');

    }//end of item

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('id' , 'like', "%$search%")
            ->orWhere('phone', 'like', "%$search%");
        });
        
    }//end of scope WhenSearch`

}//end of model
