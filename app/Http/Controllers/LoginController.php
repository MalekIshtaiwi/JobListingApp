<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create(){
        return view("auth.login");
    }

    public function store(){
        // validate
        $validatedAttributes = request()->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
        // attempt login (authenticate)
        if(!Auth::attempt($validatedAttributes)){
            throw ValidationException::withMessages([
                'email'=> 'Sorry, those credentials do not match',
            ]);
        }
        // regenerate the session token
        request()->session()->regenerate();
        // redirect
        return redirect('/jobs');
    }
    public function destroy(){
        Auth::logout();

        return redirect("/");
    }
}
