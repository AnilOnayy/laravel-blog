<?php

namespace App\Http\Controllers;
use App\Models\User;

class SessionController extends Controller
{
    public function destroy() {
        auth()->logout();
        request()->session()->regenerateToken();

        return redirect('/')->with('success','Good bye!');
    }

    public function create() {

        return view('session.create');
    }

    public function store() {

        $attributes = request()->validate([
            'email' => ['required', 'email' ,'min:3', 'max:255'],
            'password' => ['required', 'min:3', 'max:255']
        ]);

        if(auth()->attempt($attributes)) {
            request()->session()->regenerate();

            $user = User::where('email',$attributes['email'])->first();
            auth()->login($user);
        }

        return redirect('/')->with('success','Welcome Back :) ');
    }

}
