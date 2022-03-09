<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Stevebauman\Location\Facades\Location;

class WeatherController extends Controller
{
    //

    public function index(Request $req){
//        if (auth()->user()) {
//            return view('weather.index');
//        }
//        return view('signon.index');

        return view('weather.index');
//        dd($req);
//        $this->getLocation();

    }

    public function getWeather(Request $req){
        try {
            $lat = $req->latitude;
            $lon = $req->longitude;
            $res = Http::get('api.openweathermap.org/data/2.5/weather', [
                'lat' => $req->latitude,
                'lon' => $req->longitude,
                'appid' => env('WEATHER_API_KEY'),
                'units' => 'metric'
            ]);
            return $res;
        } catch (\Throwable $e){
            return response($e,500);
        }
    }
}
