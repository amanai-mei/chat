<?php
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\ChatyController;
use App\Http\Controllers\UserChatyController;


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

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'],function(){
    
    // Route::redirect('/register/confirm', '/register');    //追記
    // Route::post('/register/confirm', [App\Http\Controllers\Auth\RegisterController::class,'confirm']);    //追記
    // Route::post('/register/complete', [App\Http\Controllers\Auth\RegisterController::class,'register']);  //追記
    
    Route::resource('display', 'DisplayController');
    Route::resource('chat', 'ChatController');
    Route::resource('userchat', 'UserChatController');
    
});
