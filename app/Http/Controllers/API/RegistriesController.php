<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Registres\RegistriesResource;
use App\Models\RealEstateRegistry;
use Illuminate\Http\Request;

class RegistriesController extends Controller
{
    public function getAllRegistries(){
        return new RegistriesResource(RealEstateRegistry::all());
    }
}
