<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:8',

        ]);

        $user = User::create([
            'name'      =>$request->name,
            'email'     =>$request->email,
            'password'  =>bcrypt($request->password),
        ]);

        $user->assignRole('user');

        $user->createToken('Token')->accessToken;

        return UserResource::make($user); 

    }
}
