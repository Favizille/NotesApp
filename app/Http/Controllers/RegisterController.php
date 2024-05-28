<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function register(){
        return view('register');
    }

    public function registration(RegisterRequest $request){
        $userDetails = $request->validated();

        $registrationSuccessful = User::create($userDetails);

        if(!$registrationSuccessful){
            return redirect()->route("register")->withErrors("User couldn't be registered");
        }

        return "Succesfully registered";
        // return redirect()->route('notes');

    }
}
