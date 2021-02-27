<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Type\TypeResource;
use App\Models\RealEstateType;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function getAllType(){
        return new TypeResource(RealEstateType::all());
    }
}
