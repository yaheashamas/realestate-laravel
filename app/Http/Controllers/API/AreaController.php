<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Area\AreaResource;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    //get name areas from id city
    public function getAllAreas($id){
        $areas = DB::table('areas')->where('city_id',$id)->get();
        return new AreaResource($areas);
    }
}
