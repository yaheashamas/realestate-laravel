<?php

namespace App\Http\Controllers\API;


use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UsersResource;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;


class UserController extends Controller
{
    /**
     * @return UsersResource
     */
    public function index()
    {
        return new UsersResource( User::all());
    }

    /**
     * @param Request $request
     * @return UserResource
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:20',
            'email' => 'required|Email',
            'password' => 'required',
            'phone_number' => 'required|unique:users',
        ]);
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->phone_number = $request->get('phone_number');
        $user->x_latitude = $request->get('x_latitude');
        $user->y_longitude = $request->get('y_longitude');
        $token = JWTAuth::fromUser($user);
        $user->save();
        return new UserResource($user);
    }

    /**
     * @param $id
     * @return UserResource
     */
    public function show($id)
    {
        $user = User::find($id);
        return new UserResource($user);
    }

    /**
     * @param Request $request
     * @param $id
     * @return UserResource
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:4|max:20',
            'email' => 'required|Email',
            'password' => 'required',
            'phone_number' => 'required|digits:10|regex:/(09)/',
        ]);
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->phone_number = $request->get('phone_number');
        $user->x_latitude = $request->get('x_latitude');
        $user->y_longitude = $request->get('y_longitude');
        $user->save();
        return new UserResource($user);
    }

    public function allUserRealEstate($id){
        $user = User::find($id);
        $allRealEstate = $user->realEstates;
        return new UsersResource($allRealEstate);
    }
    //login
    public function login(Request $request){
        $request->validate([
           'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)){
            $user = User::where('email',$request->get('email'))->first();
            return $user->api_token;
        }
        return "not Found";
    }
    // handle
    public function getAuthenticatedUser(){
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }


        return response()->json(compact('user'));
    }
}
