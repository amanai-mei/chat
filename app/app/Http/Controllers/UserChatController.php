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
         // チャットのメッセージ表示
        $u = new User;
        $users = $u
            ->join('user_chats', 'users.id', 'user_id')
            ->get();
        return view('academia_chat', [
            // 'messages' => $messages,
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
        // メッセージの登録
        $user = Auth::user();
        // $message = new User_chat;
        $u = new User;
        $a = $u
            ->join('user_chats', 'users.id', 'user_id')
            ->get();

        $message = $request->input('message');

        User_chat::create([
        'user_id' => $user->id,
        'name' => $user->name,
        // メッセージ保存をさせる
        'message' => $user,
        ]);
        return redirect('userchat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
