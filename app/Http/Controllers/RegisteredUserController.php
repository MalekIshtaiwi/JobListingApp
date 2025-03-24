<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create(){
        return view("auth.register");
    }

    public function store(){
        //validate
        $validatedAttributes =  request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required','email'],
            'password' => ['required', Password::min(8), 'confirmed'],
        ]);
        //create user in db
       $user =  User::create($validatedAttributes);

        //log them in
        Auth::login($user);
        //redirect to a view
        return redirect('/jobs');

    }
}
