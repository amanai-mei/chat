<?php
use App\Http\Controllers\DisplayController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => 'auth'],function(){

    // Route::redirect('/register/confirm', '/register');
    // Route::post('/register/confirm', [App\Http\Controllers\Auth\RegisterController::class,'confirm'])->name('register_confirm');
    // Route::post('/register/complete', [App\Http\Controllers\Auth\RegisterController::class,'register'])->name('register_complete');

    Route::resource('display', 'DisplayController');
});
