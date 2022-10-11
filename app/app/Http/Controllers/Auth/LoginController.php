<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Group;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    // public function redirectPath()
    // {
    //     $user = new User;
    //     $users = $user->all()->toArray();

    //     $group = new Group;
    //     $groups = $group->all()->toArray();
    //     if($user['role'] == 0){
    //         // ユーザートップページ表示
    //         return view('home',[
    //             'users' => $users,
    //             'groups'  => $groups,
    //         ]);
    //     }else{
    //         // 管理者トップページ
    //         return view('asmin_home',[
    //             'users' => $users,
    //             'groups'  => $groups,
    //         ]);
    //     }
    
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
