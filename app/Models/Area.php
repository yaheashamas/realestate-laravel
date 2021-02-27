<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['name','code'];
    public $timestamps = true;

    public function estates(){
        return $this->hasMany(Estate::class);
    }
}
