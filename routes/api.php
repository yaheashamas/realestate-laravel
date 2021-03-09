<?php

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/*Start Routes Users*/
Route::get('users','API\UserController@index');
Route::get('user/{id}','API\UserController@show');
Route::post('user/{id}','API\UserController@update');
Route::post('user/{id}/realestate','API\UserController@allUserRealEstate');
Route::post('register','API\UserController@store');
Route::post('login','API\Auth\LoginController@Login');
Route::get('user','API\UserController@getAuthenticatedUser');
/*End Routes Users*/

/*Start Routes RealEstate*/
Route::get('realestate/{id}','API\EstateController@show');
Route::post('realestates','API\EstateController@index');
Route::post('realestate/user/{id}','API\EstateController@store');
Route::post('realestate/{id}/user','API\EstateController@update');
/*End Routes RealEstate*/

/*Start Route offer*/

/*End Route offer*/

/*start Route city*/
Route::get('cities','API\CityController@getAllCities');
/*end Route city*/

/*start Route area*/
Route::get('areas/{id}','API\AreaController@getAllAreas');
/*end Route area*/

/*start Route type*/
Route::get('types','API\TypeController@getAllType');
/*end Route type*/

/*start Route Registries*/
Route::get('Registries','API\RegistriesController@getAllRegistries');
/*end Route Registries*/

/*start Route Auth*/
Route::group(['middleware' => ['jwt.verify']], function() {
});
/*End Route Auth*/
