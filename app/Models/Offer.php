<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table=['description','user_id','estate_id'];
    public $timestamps = true;

    public function estate(){
        return $this->belongsTo(Estate::class);
    }
}
