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

class UserGroupController extends Controller
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
        // グループチャットの招待画面表示
        $user = new User;
        $users = $user->all()->toArray();
 
        // グループの表示(カリキュラム・入社日)
        $group = new Group;
        $groups = $group->all()->toArray();

        return view('group_invite',[
            'users' => $users,
            'groups' => $groups,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // user_groupsへ保存
        $groups = new User_group;
        $groups->group_id = $request->group_id;
        $groups->user_id = $request->user_id;
        $groups->save();

        session()->flash('flash_message', 'グループへの招待が完了しました');
        return redirect('display');
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
