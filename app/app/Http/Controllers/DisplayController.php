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
        // // 画像が保存されている場所：app/public/avatar
        // // 画像を取得する場所：public/storage/avatar
        // $user = new User;

        // // name属性が'image'のinputタグをファイル形式に、画像をpublic/avatarに保存
        // $image_path = $request->file('image')->store('public/avatar/');

        // // 上記処理にて保存した画像に名前を付け、userテーブルのimageカラムに、格納
        // $user->image = basename($image_path);

        // $user->save();

        // // return redirect()->route('任意のビュー');
        // return view('user_mypage',$user);

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

     //マイページの編集
    public function update(int $id, Request $request){
        //    var_dump($request); 
        $user = new User;
        $user_id = $user->find($id);
        
        $user_id->name = $request->name;
        $user_id->email = $request->email;
        $user_id->save();
        return redirect(route('display.show',$id));      
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
