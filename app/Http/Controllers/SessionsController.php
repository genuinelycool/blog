<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function store(){
        // validate the request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // attempt to authenticate and log in the user
        // based on the provided credentials
        if(auth()->attempt($attributes)){
            session()->regenerate();
            // session fixation

            // redirect with a sucess flash message
            return redirect('/')->with('success', 'Welcome Back!');
        }

        // auth failed.
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);

        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => 'Your provided credentials could not be verified.']);

    }

    public function destroy(){
        // ddd('log the user out');
        // auth()->login();     // to login the user.
        // auth()->check();        // check to see if user is logged in.
        // auth()->guest();        // do we have a guest at the moment.

        auth()->logout();       // to log out the user.

        return redirect('/')->with('success', 'Goodbye!');
    }
}
