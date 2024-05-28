<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function logginIn(LoginRequest $request){
        $loginDetails = $request->validated();
         
        if(Auth::attempt($loginDetails)){
            $user = User::where('email', $request->email)->first();

            $user->createToken('api_token')->plainTextToken;

            // return "Logged in Successfully";
            return redirect()->route("notes");
        }
      
        return redirect()->route('login')->withError('User Login Failed');
    }
}
