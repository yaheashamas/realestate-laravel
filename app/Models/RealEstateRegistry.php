<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RealEstateRegistry extends Model
{
    protected $fillable = ['name','code'];
    public $timestamps = true;
}
