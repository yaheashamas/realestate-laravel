<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RealEstate\RealEstateResource;
use App\Http\Resources\RealEstate\RealEstatesResource;
use App\Http\Resources\User\UsersResource;
use App\Models\Estate;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new RealEstatesResource(Estate::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $validationRules = [
            'rent_or_sale' => 'boolean',

            'price' => 'required|numeric',
            'space' => 'required|numeric',

            'location_description' => 'required',

            'x_latitude' => 'required',
            'y_longitude' => 'required',

            'Specifications' => 'required',
            //foreign
            'area_id' => 'required',
            'user_id' => 'required',
            'realEstateRegistry_id' => 'required',
            'realEstateType_id' => 'required',

            'url' => 'required',
            'url.*' =>   'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
        $idTypeRealEstate = $request->get('realEstateType_id');
        $infoTableType = DB::table('real_estate_types')->where('id',$idTypeRealEstate)->first()->code;
        if ($infoTableType) {
            switch ($infoTableType) {
                case "HOME":
                    $validationRules["story.livery.number_of_room"] = "required";
                    break;
                case "SHOP":
                    $validationRules["roof_shed"] = "required|integer|min:0";
                    break;
                case "LAND":
                    $validationRules["bear.inviolable.room"] = "required";
                    break;
            }
        }
        $user = $id;
        $realEstate = new \App\Models\Estate();
        $realEstate->rent_or_sale =         $request->get('rent_or_sale');
        $realEstate->number_month =         $request->get('number_month');
        $realEstate->space =                $request->get('space');
        $realEstate->price =                $request->get('price');
        $realEstate->location_description = $request->get('location_description');
        $realEstate->Specifications =       $request->get('Specifications');
        $realEstate->x_latitude =           $request->get('x_latitude');
        $realEstate->y_longitude =          $request->get('y_longitude');
        $realEstate->area_id =              $request->get('area_id');
        $realEstate->realEstateRegistry_id= $request->get('realEstateRegistry_id');
        $realEstate->realEstateType_id =    $request->get('realEstateType_id');
        $realEstate->user_id =              $user;
        dd($realEstate->area_id);
        $realEstate->save();
        //save multi image
        if ($request->files->get('url')) {
            $images = $request->files->get('url');
            foreach($images as $image) {
                $profileImage = Str::uuid() . "." . $image->getClientOriginalExtension();

                $image->move('images', $profileImage);
                $insert[] =
                [
                    'url' => "$profileImage",
                    'estate_id' => "$realEstate->id"
                ];
            }
        }
        Image::insert($insert);

        return new RealEstateResource($realEstate);
    }

    /**
     * @param $id
     * @return RealEstateResource
     */
    public function show($id)
    {

        $estate = Estate::find($id);
        return new RealEstateResource($estate);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RealEstateResource
     */
    public function update(Request $request, $id)
    {
//        $validationRules = [
//            'is_sale' => 'boolean',
//            'is_rent' => 'boolean',
//            'Type_of_title_deed' => 'required',
//            'price' => 'required|numeric',
//            'space' => 'required|numeric',
//            'number_month' => 'required|numeric',
//            'location_description' => 'required',
//            'x_latitude' => 'required',
//            'y_longitude' => 'required',
//            'type' => 'required',
//            'Specifications' => 'required',
//            'city_id' => 'required',
//            'user_id' => 'required',
//            'url' => 'required',
//            'url.*' =>   'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
//        ];
//
//        $type = $request->get('type');
//        if ($type) {
//            switch ($type) {
//                case "بيت":
//                    $validationRules["specifications.story"] = "required|integer";
//                    $validationRules["specifications.livery"] = "required";
//                    $validationRules["specifications.number_of_rooms"] = "required|integer|min:0";
//                    break;
//                case "محل":
//                    $validationRules["specifications.roof_shed"] = "required|integer|min:0";
//                    break;
//                case "ارض":
//                    $validationRules["specifications.bear"] = "required";
//                    $validationRules["specifications.inviolable"] = "required";
//                    $validationRules["specifications.room"] = "required";
//                    break;
//            }
//        }
//        $user = User::find($id)->id;
//        $realEstate = \App\Models\Real::find($id);
//
//
//        $realEstate->is_sale =              $request->get('is_sale');
//        $realEstate->is_rent =              $request->get('is_rent');
//        $realEstate->Type_of_title_deed=    $request->get('Type_of_title_deed');
//        $realEstate->number_month =         $request->get('number_month');
//        $realEstate->space =                $request->get('space');
//        $realEstate->price =                $request->get('price');
//        $realEstate->location_description = $request->get('location_description');
//        $realEstate->type =                 $request->get('type');
//        $realEstate->Specifications =       $request->get('Specifications');
//        $realEstate->x_latitude =           $request->get('x_latitude');
//        $realEstate->y_longitude =          $request->get('y_longitude');
//        $realEstate->city_id =              $request->get('city_id');
//        $realEstate->user_id =              $user;
//
//        $realEstate->save();
//
//        if ($request->files->get('url')) {
//            $images = $request->files->get('url');
//            foreach($images as $image) {
//                $profileImage = Str::uuid() . "." . $image->getClientOriginalExtension();
//                $image->move('images', $profileImage);
//                $insert[] = ['url' => "$profileImage",'estate_id' => "$realEstate->id"];
//            }
//        }
//        Image::update($insert);
//
//        return new RealEstateResource($realEstate);
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        //
    }

}
