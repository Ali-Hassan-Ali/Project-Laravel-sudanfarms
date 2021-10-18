<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotedDealer extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['logo_path','file_path','name'];

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
    
}//end of model
