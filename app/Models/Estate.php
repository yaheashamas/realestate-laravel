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
    protected $with = [
        "images",
        'area',
        "register",
        "type",
    ];
    public $timestamps = true;
    //relation one to many
    public function images(){
        return $this->hasMany(Image::class,'estate_id','id');
    }

    public function offers(){
        return $this->hasMany(Offer::class);
    }

    public function area(){
        return $this->belongsTo(Area::class,'area_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function register(){
        return $this->belongsTo(RealEstateRegistry::class,'realEstateRegistry_id','id');
    }
    public function type(){
        return $this->belongsTo(RealEstateType::class,'realEstateType_id','id');
    }

}
