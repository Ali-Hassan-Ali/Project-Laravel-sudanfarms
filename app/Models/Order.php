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
        return $this->belongsTo(OrderItem::class,'order_id');

    }//end of item

}//end of model
