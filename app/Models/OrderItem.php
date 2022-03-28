<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);

    }//end of order

    public function product()
    {
        return $this->belongsTo(Product::class);

    }//end of product

    public function promotedDealer()
    {
        return $this->belongsTo(PromotedDealer::class);

    }//end of belongsTo promotedDealer

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');

    }//end of belongsTo promotedDealer

    public function Promoted()
    {
        return $this->belongsTo(PromotedDealer::class,'promoted_dealer_id');

    }//end of belongsTo Promoted

}//end of model
