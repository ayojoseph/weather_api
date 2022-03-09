<?php

namespace App\Http\Controllers;

use App\Models\UserActivity;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class UserActivityController extends Controller
{
    public function index(){
        $activities = UserActivity::get();
        return view('admin.index',[
            'activities' => $activities
        ]);
    }

    public function storeActivity(Request $req) {

        $location = $req->location ." ". $req->country;
        $req->user()->activities()->create([
           'location' => $location
        ]);
        return back();
    }


    public function makeAdmin(Request $req) {
        $user = auth()->user();
        $user->permissions = 1;
        $user->save();
        return back();

    }
}
