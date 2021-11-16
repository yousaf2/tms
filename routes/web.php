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

//Admin Routes
Route::group(['prefix'=>'admin','middleware'=>'admin_role'],function(){
    Route::get('/',[App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/profile',[App\Http\Controllers\AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/update_profile',[App\Http\Controllers\AdminController::class, 'update_profile'])->name('admin.update.profile');
});

Route::group(['prefix'=>'team_member','middleware'=>'team_member_role'],function(){
    Route::get('/',[App\Http\Controllers\TeamController::class, 'index']);
});

Route::group(['prefix'=>'team_lead','middleware'=>'team_lead_role'],function(){
    Route::get('/',[App\Http\Controllers\TeamLeadController::class, 'index']);
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
