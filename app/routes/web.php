<?php
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\ChatyController;
use App\Http\Controllers\UserChatyController;
use App\Http\Controllers\GroupChatyController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\UserGroupController;
use App\Http\Controllers\Auth\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;



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


// パスワードリセット関連
Route::prefix('password_reset')->name('password_reset.')->group(function () {
    Route::prefix('email')->name('email.')->group(function () {
        // パスワードリセットメール送信フォームページ
        Route::get('/', [PasswordController::class, 'emailFormResetPassword'])->name('form');
        // メール送信処理
        Route::post('/', [PasswordController::class, 'sendEmailResetPassword'])->name('send');
        // メール送信完了ページ
        Route::get('/send_complete', [PasswordController::class, 'sendComplete'])->name('send_complete');
    });
    // パスワード再設定ページ
    Route::get('/edit', [PasswordController::class, 'edit'])->name('edit');
    // パスワード更新処理
    Route::post('/update', [PasswordController::class, 'update'])->name('update');
    // パスワード更新終了ページ
    Route::get('/edited', [PasswordController::class, 'edited'])->name('edited');
});


Route::group(['middleware' => 'auth'],function(){
    
    Route::resource('display', 'DisplayController');
    Route::resource('chat', 'ChatController');
    Route::resource('userchat', 'UserChatController');
    Route::resource('groupchat', 'GroupChatController');
    Route::resource('admin', 'AdminController');
    Route::resource('usergroup', 'UserGroupController');
    Route::get('/user/search', 'DisplayController@searchUser')->name('searchUser');
    Route::get('/search', 'AdminController@searchAdmin')->name('searchAdmin');

    // Route::get('/result/ajax', 'HomeController@getData');
    // Route::get('/home', 'HomeController@index');
    // Route::post('/add', 'HomeController@add')->name('add');

    Route::get('/result/ajax', 'UserChatController@getData');
    // Route::get('/home', 'UserChatController@index');
});
