<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name','code'];
    public $timestamps = true;

    // relation ship
    public function areas(){
       return $this->hasMany(Area::class);
    }
}
