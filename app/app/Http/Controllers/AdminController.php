<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;
use App\Group;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // userの表示（ヘッダー・アカデミア生）
         $user = new User;
         $users = $user->all()->toArray();
         $role = Auth::user()->toArray();
 
         // グループの表示(カリキュラム・入社日)
         $group = new Group;
         $groups = $group->all()->toArray();
         
        // グループの登録
        $group = new Group;
        $group->group_name = $request->group_name;
        $group->save();

        session()->flash('flash_message', '入社月の登録が完了しました');
        return redirect('display')->with([
            'group' => $group,
            'users' => $users,
            'groups'  => $groups,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // マイページの表示(名前・メールアドレスの表示)
        $user_id = Auth::User()->find($id);

        // 画像の表示
        $user = Auth::User()->find($id)->posts;
        $image = new Image;
        $images = DB::table('images')->get();
        foreach($images as $image){
            if($image->user_id == (int)$user){
            }
        }
        return view('delete',[
            'user_id' => $user_id,
            'image' => $image->image,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 論理削除
        $user_id = Auth::User()->find($id);
        $user_id['del_flg'] = 1;
        $user_id->save();

        session()->flash('flash_message', 'ユーザーを削除しました');
        return redirect('display');


       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // var_dump($id);
        // $user = User()->find($id);
    }
}
