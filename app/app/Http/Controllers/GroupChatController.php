<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_chat;
use App\Group_chat;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //一覧表示(TOPページ)
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //作成データの個別表示
    {
        // $id->リンクタグをクリックしたグループ
        // チャットのメッセージ表示
        $user_id = Auth::User($id);//ログインしたユーザー
        $group_chats = new Group_chat;
        return view('group_chat');
        

        // $u = new User;
        // $users = $u
        //     ->join('user_chats', 'users.id', 'user_id')
        //     ->get();
        // return view('group_chat', [
        //     'users' => $users,
        //     'user_id' => $user_id,
        //     'id' => $id
        //         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //作成データの編集用フォームの表示
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
        //
    }
}
