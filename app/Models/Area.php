<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['name','code'];
    public $timestamps = true;
    protected $with = ['city'];

    public function estates(){
        return $this->hasMany(Estate::class);
    }

    public function city() {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}
