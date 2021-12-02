<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory;
    use Notifiable;

    protected $guarded  = [];

    protected $hidden   = ['password','remember_token','two_factor_recovery_codes','two_factor_secret'];

    protected $casts    = ['email_verified_at' => 'datetime'];

    protected $appends  = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);

    }//end of get image path

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('name' , 'like', "%$search%")
            ->orWhere('city', 'like', "%$search%")
            ->orWhere('country', 'like', "%$search%")
            ->orWhere('phone', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('username', 'like', "%$search%");
        });
        
    }//end ofscopeWhenSearch

    public function promoted()
    {
        return $this->hasMany(PromotedDealer::class,'user_id');

    }//end of promoted hasMany

    public function blog()
    {
        return $this->hasMany(User::class,'users_id');

    }//end of belongsTo blog

}//end of model
