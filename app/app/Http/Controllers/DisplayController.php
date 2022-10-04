<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new User;
        $users = $user->all()->toArray();
        return view('home',[
            'users' => $users,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::User()->find($id);
        return view('user_mypage',[
            'user_id' => $user_id,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $user_id = Auth::User()->find($id);
        return view('u_mypage_update',[
            'user_id' => $user_id,
        ]);

        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, Request $request){

        $user = new User;
        $user_id = $user->find($id);

        $user_id->name = $request->name;
        $user_id->email = $request->email;
        $user_id->password = $request->password;
        Auth::user()->user()->save($user);

        return redirect('/');

        // Auth::user()->spending()->save($spending);
        // return redirect('/display');

    //     $columns = ['name', 'email', 'password'];
    //     foreach($columns as $column) {
    //         $user->$column = $request->$column;
    //     }
    //     Auth::user()->user()->save($user);

    //    return redirect('/');

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
