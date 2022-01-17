<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagePromoted extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $appends = ['image_path'];

    public function promotedDealer()
    {
        return $this->belongsTo(PromotedDealer::class);

    }//end of romotedDealer

    public function package()
    {
        return $this->belongsTo(Package::class);

    }//end of package

    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);

    }//end of get image path

}//end of model
