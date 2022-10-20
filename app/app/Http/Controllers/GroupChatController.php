<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_chat;
use App\Group_chat;
use App\User_group;
use App\User;
use App\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) //一覧表示(TOPページ)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //新規作成画面の表示
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //新規作成画面のデータ保存
    {
        // メッセージの登録
        $user = Auth::user();
        $message = $request->input('message');
        $group_id = $request->input('group_id');

        Group_chat::create([
            'group_id' => $group_id,
            'user_id' => $user->id,
            'message' => $message,
            ]);
            return redirect()->route('groupchat.show',['groupchat' => $group_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //作成データの個別表示
    {
        // チャットのメッセージ表示
        // $id->リンクタグをクリックしたグループのid
        $user_id = Auth::User($id);//ログインしたユーザー
        $group_chats = new Group_chat;
           $u = new User;
           $users = $u
                ->join('group_chats', 'users.id', 'user_id')
                ->where('group_chats.group_id','=',$id)->get();
           $user_groups = new User_group;
           $user_group = $user_groups
           ->join('groups', 'user_groups.group_id', 'groups.id')->get();

        return view('group_chat', [
            'user_id' => $user_id,
            'users' => $users,
            'user_group' => $user_group,
            'id' => $id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //作成データの編集用フォームの表示
    {
            // 編集画面の表示
        //$id->messageのid
        $user_chats = new Group_chat;
        // $user_id = Auth::User()->find($id);
        $user_chat = $user_chats
        ->where('id',$id)->first(['message']);
        $time = $user_chats
        ->where('id',$id)->first(['created_at']);
        return view('group_chat_detail',[
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
        $message_id = Group_chat::find($id);
        $message_id->message = $request->message;
        $message_id->save();
        session()->flash('flash_message', 'メッセージを編集しました');
        return redirect()->route('groupchat.show',['groupchat' => $message_id->group_id]);
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
        // dd($message_id->to_id);
        $message_id->delete();
        session()->flash('flash_message', 'メッセージを削除しました');
        return redirect()->route('groupchat.show',['groupchat' => $message_id->group_id]);
    }
}
