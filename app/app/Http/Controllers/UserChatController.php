<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_chat;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // メッセージの登録
        $u = new User;
        $users = $u->all()->toArray();
        $user = Auth::user();
        $message = $request->input('message');
        $to_id = $request->input('to_id');

        User_chat::create([
        'user_id' => $user->id,
        'name' => $user->name,
        'message' => $message,
        'to_id' => $to_id,
        ]);
        return redirect()->route('userchat.show',['userchat' => $to_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // チャットのメッセージ表示
         $user_id = Auth::User($id);//ログインしたユーザー
         // $id->リンクタグをクリックしたユーザー
         $u = new User;
         $users = $u
             ->join('user_chats', 'users.id', 'user_id')
             ->get();
         return view('academia_chat', [
             'users' => $users,
             'user_id' => $user_id,
             'id' => $id
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
        // 削除画面の表示
        //$id->messageのid
        $user_chats = new User_chat;
        // $user_id = Auth::User()->find($id);
        $user_chat = $user_chats
        ->where('id',$id)->first(['message']);

        return view('chat_edit',[
                'user_chat' => $user_chat,
                'id' => $id,
            ]);
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
        // $users = $u
        //      ->join('user_chats', 'users.id', 'user_id')
        //      ->get();
        //  return view('chat_edit', [
        //      'users' => $users,
        //          ]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_chats = new User_chat;
        $user_id = Auth::User()->find($id);
        dd($user_id);
    }
}
