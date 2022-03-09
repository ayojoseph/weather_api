<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/signup', [SignUpController::class,'index'])
    ->name('signup')
    ->middleware('guest');
Route::post('/signup', [SignUpController::class, 'storeNewUser']);

Route::get('/weather', [WeatherController::class,'index'])
    ->name('weather')
    ->middleware('auth');

Route::post('/weather', [WeatherController::class,'getWeather']);

Route::post('/useractivity', [UserActivityController::class,'storeActivity'])
    ->name('useractivity')
    ->middleware('auth');

Route::get('/useractivity', [UserActivityController::class,'index'])
    ->middleware('auth');

Route::get('/makeadmin', [UserActivityController::class,'makeAdmin'])
    ->name('makeadmin')
    ->middleware('auth');

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class, 'loginAttempt']);
Route::get('/logout', [LogoutController::class,'index'])->name('logout');

Route::get('/', function () {
    return view('signon.index');
})->name('home');


