<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index() {
        return view('signon.index');
    }

    public function loginAttempt(Request $req) {
        try {
            if (auth()->attempt($req->only('username','password'))) {
//                dd(auth()->user());
                return redirect()->route('weather');
            }
            return back()->with('status','Login error');


//            return response(auth()->user(),200);
        } catch (\Throwable $e) {
            return response($e,401);
        }

    }
}
