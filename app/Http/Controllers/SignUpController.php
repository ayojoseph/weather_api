<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    //
    public function index(){
        return view('signup.index');
    }

    public function storeNewUser(Request $req) {
        User::create([
            'first_name' => $req->firstname,
            'last_name' => $req->lastname,
            'username' => $req->username,
            'password' => Hash::make($req->password),
            'permissions' => 0,

        ]);

//        auth()->attempt($req->only('username','password'));
        auth()->attempt([
            'username' => $req->username,
            'password' => $req->password
        ]);
//        dd(auth()->user());

        return redirect()->route('weather');
//        dd($req);
    }

}
