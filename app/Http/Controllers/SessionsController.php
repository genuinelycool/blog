<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
    public function destroy(){
        // ddd('log the user out');
        // auth()->login();     // to login the user.
        // auth()->check();        // check to see if user is logged in.
        // auth()->guest();        // do we have a guest at the moment.

        auth()->logout();       // to log out the user.

        return redirect('/')->with('success', 'Goodbye!');
    }
}
