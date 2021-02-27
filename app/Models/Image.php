<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'url','estate_id','created_at','updated_at'
    ];
    protected $casts = [
        'url' => 'array'
    ];
    public $timestamps = true;

    public function estate(){
       return $this->belongsTo(Estate::class);
    }
}
