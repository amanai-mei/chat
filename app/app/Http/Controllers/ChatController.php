<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;
use App\Group;
use App\Group_chat;
use App\User_group;
use App\User_chat;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//一覧表示(TOPページ)
    {
        // $messages = Message::get();
        // return view('academia_chat', ['message' => $message]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//新規作成画面の表示
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)// 新規作成画面のデータ保存
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)// 作成データの個別表示
    {
        // グループチャットの表示
        // $id->リンクタグをクリックしたグループのid
        $user_id = Auth::User($id);//ログインしたユーザー
        $group_chats = new Group_chat;
           $u = new User;
           $users = $u
           ->join('group_chats', 'users.id', 'user_id')
           ->where('group_chats.group_id','=',$id)->get();
           $groups = new Group;
           $group = $groups->where('id',$id)->get();


        return view('admin_group_chat', [
            'user_id' => $user_id,
            'users' => $users,
            'group' => $group,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)// 作成データの編集用フォームの表示
    {
           // 編集画面の表示
        //$id->messageのid
        $user_chats = new Group_chat;
        // $user_id = Auth::User()->find($id);
        $user_chat = $user_chats
        ->where('id',$id)->first(['message']);
        $time = $user_chats
        ->where('id',$id)->first(['created_at']);
        return view('admin_group_chat_detail',[
                'user_chat' => $user_chat,
                'id' => $id,
                'time' => $time,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // メッセージの削除
        // id->userchats id
        $message_id = Group_chat::find($id);
        $message_id->delete();
        session()->flash('flash_message', 'メッセージを削除しました');
        return redirect()->route('chat.show',['chat' => $message_id->group_id]);
    }
}
