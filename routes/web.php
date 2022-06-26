<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HeadController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view('landingpage', ['title' => 'Landing Page']);
});

Route::middleware(['auth'])->group(function () { 
    // already authenticated
    Route::resource('dashboard/head', HeadController::class) ->middleware('head');
    Route::resource('dashboard/admin', AdminController::class) ->middleware('admin');
    Route::resource('dashboard/visitor', VisitorController::class) ->middleware('visitor');
    Route::get('/dashboard', function () {
        return view('dashboard.index',[
            'title' => 'Dashboard',
        ]);
    });
});

Route::middleware(['guest',])->group(function () {
    
    // not authenticated
    Route::resource('register', RegisterController::class);
    Route::get('/login', [LoginController::class, 'index']) ->name('login');
});


Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

