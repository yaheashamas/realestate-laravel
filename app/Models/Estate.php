<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    protected $fillable = [
        'is_active',
        'rent_or_sale',
        'number_month',
        'price',
        'space',
        'location_description',
        'x_latitude',
        'y_longitude',
        'Specifications',
        //foreign
        'area_id',
        'user_id',
        'realEstateRegistry_id',
        'realEstateType_id',
    ];
    protected $casts = [
        'specifications' => 'array'
    ];
    public $timestamps = true;

    //relation
    public function user(){
       return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(Image::class,'estate_id','id');
    }

    public  function offers(){
        return $this->hasMany(Offer::class);
    }

    public function area(){
        return  $this->belongsTo(Area::class);
    }
}
