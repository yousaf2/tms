<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Admin Routes
Route::group(['prefix'=>'admin','middleware'=>'is_admin'],function(){
    Route::get('/',function(){
        return view('admin/dashboard',[App\Http\Controllers\HomeController::class, 'index']);
    });
});
//Team Managers Routes
Route::group(['prefix'=>'team_lead','middleware'=>'is_team_lead'],function(){
    Route::get('/',function(){
        return view('team_manager/dashboard',[App\Http\Controllers\HomeController::class, 'team_lead_dashboard']);
    });
});
//Team Members Routes
Route::group(['prefix'=>'team_member','middleware'=>'is_team_member'],function(){
    Route::get('/',function(){
        return view('team_member/dashboard',[App\Http\Controllers\HomeController::class, 'team_member_dashboard']);
    });
});
