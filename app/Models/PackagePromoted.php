<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagePromoted extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function promotedDealer()
    {
        return $this->belongsTo(PromotedDealer::class);

    }//end of romotedDealer

    public function package()
    {
        return $this->belongsTo(Package::class);

    }//end of package

}//end of model
