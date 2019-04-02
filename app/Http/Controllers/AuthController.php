<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        $credentials = request(['phone']);
        $user = User::where('phone', '=', $credentials)->first();
        if(!$user){
            $user = new User();
            $user->phone=$request->phone;
            $user->fb_token=$request->fb_token;
            $user->fcm_token=$request->fcm_token;
            $user->save();
		return $user;
            return response()->json(array("token"=>JWTAuth::fromUser($user),'user_id'=>$user->id));
        }
        else{
            $user->fb_token=$request->fb_token;
            $user->fcm_token=$request->fcm_token;
            $user->update();
        try {
            if (! $token = JWTAuth::fromUser($user)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(array('token'=>$token,'user_id'=>$user->id));
        }
    }

    public function me()
    {
        return response()->json(auth()->user());
    }


    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'phone' => ['required', 'string','max:15', 'unique:users'],
        ]);
    }
    protected function create(array $data)
    {
        return User::create([
            'phone' => $data['name'],
            'fb_token' => $data['fb_token'],
            'fcm_token' => Hash::make($data['fcm_token']),
        ]);
    }
}
