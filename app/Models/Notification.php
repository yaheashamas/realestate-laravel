<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = ['title','description','url','user_id'];
    public $timestamps = true;
    public function user(){
        return $this->belongsTo(User::class);
    }
}
