<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Validation\ValidationException;

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
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($attributes)) {
            session()->regenerate();

            return redirect('/')->with('success','Welcome Back :) ');
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);
    }



}
