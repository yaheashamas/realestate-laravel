<?php

namespace App\Models;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens,Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'x_latitude',
        'y_longitude'
    ];
    protected $hidden = [
        'remember_token',
    ];

    public $timestamps = true;

    public function estates(){
       return $this->hasMany(Estate::class);
    }

    public function offers(){
       return $this->hasMany(Offer::class);
    }

    public function notifications(){
        return $this->hasMany(Notification::class);
    }

    /**
     * @inheritDoc
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @inheritDoc
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
