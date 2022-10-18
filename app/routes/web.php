<?php
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\ChatyController;
use App\Http\Controllers\UserChatyController;
use App\Http\Controllers\GroupChatyController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdminController;


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

// ログイン画面表示
Route::get('/', function () {
    return view('auth.login');
});

// 管理者登録画面表示
Route::get('/register_admin', function () {
    return view('auth.admin_register');
});

Route::group(['middleware' => 'auth'],function(){
    
    Route::resource('display', 'DisplayController');
    Route::resource('chat', 'ChatController');
    Route::resource('userchat', 'UserChatController');
    Route::resource('groupchat', 'GroupChatController');
    Route::resource('admin', 'AdminController');
    Route::get('/user/search', 'DisplayController@searchUser')->name('searchUser');

    
});
