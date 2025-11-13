<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\CountriesOfOrigin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:50',
            'email'=>'required|string|email|unique:users,email',
            'password'=>'required|string|min:8',
        ]);

        if($validator->fails()){
            $errors=$validator->errors()->all();
            $errorMessage=implode(', ',$errors);
            return response()->json([$errorMessage],422);
        }

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        $token=$user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'=>'new user registered successfully.',
            'user'=>$user,
            'token'=>$token,
        ],201);
    }

    public function login(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=>'required|string|email|exists:users,email',
            'password'=>'required|string|min:8',
        ],[
            'email.exists'=>'user email does not exist.'
        ]);

        if($validator->fails()){
            $errors=$validator->errors()->all();
            $errorMessage=implode(', ',$errors);
            return response()->json([$errorMessage],422);
        }

        $user=User::where('email',$request->email)->first();

        if(!$user||!Hash::check($request->password,$user->password)){
            return response()->json([
                'message'=>'one or more login credentials are incorrect.',
            ],401);
        }

        $token=$user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'=>'login success.',
            'user'=>$user,
            'token'=>$token,
        ],201);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message'=>'logout success.',
        ], 200);
    }

    // frontend interaction
    public function showLoginForm(){
        return view('auth.authentication');
    }

    public function home(){
        return view('dashboard.home');
    }

    // public function create(){
    //     $categories=Categories::all();
    //     $countries=CountriesOfOrigin::all();
    //     return view('dashboard.add-item')->with('categories',$categories)->with('countries_of_origin',$countries);
    // }
}
