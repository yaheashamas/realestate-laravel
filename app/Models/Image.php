<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Image extends Model
{
    protected $fillable = [
        'url','estate_id','created_at','updated_at'
    ];

    public $timestamps = true;

    public function estate(){
       return $this->belongsTo(Estate::class);
    }

    public function getUrlAttribute($value) {
        return env('APP_URL')."images/$value";
    }
}
