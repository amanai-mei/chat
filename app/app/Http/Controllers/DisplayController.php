<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;
use App\Group;

use Illuminate\Support\Facades\Auth;
use ILLuminate\support\Facades\DB;

class DisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //一覧表示(TOPページ)
    {
        // userの表示（ヘッダー・アカデミア生）
        $user = new User;
        $users = $user->all()->toArray();
        $role = Auth::user()->toArray();

        // グループの表示(カリキュラム・入社日)
        $group = new Group;
        $groups = $group->all()->toArray();
        
        // ログイン後のページ遷移
        if($role['role'] == 0){
            // ユーザートップページ表示
            return view('user_home',[
                'users' => $users,
                'groups'  => $groups,
                ]);
            }else{
                // 管理者トップページ表示
                return view('admin_home',[
                    'users' => $users,
                    'groups'  => $groups,
                ]);
            }
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
    public function store(Request $request) // 新規作成画面のデータ保存
    {
        // 検索フォームで入力された値を取得する
        $search = $request->input('search');

        // クエリビルダ
        $query = User::query(); 
        
        if ($search) {

            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('name', 'like', '%'.$value.'%');
            }
        }
        return view('user_home')
        ->with([
            'users' => $users,
            'search' => $search,
        ]);
    }
    
        
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // 作成データの個別表示
    {
        // マイページの表示
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
    public function edit(int $id) // 作成データの編集用フォームの表示
    {
        // マイページ編集画面の表示
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

     //マイページの編集・登録
    public function update(int $id, Request $request){ // 編集データの保存

        try {
            DB::beginTransaction();
            $user = new User;
            $user_id = $user->findOrFail($id);
            
            $user_id->name = $request->name;
            $user_id->email = $request->email;
            $user_id->save();
            return redirect(route('display.show',$id));//画像登録時削除
            $image = new Image;
            $imageData = $image->where('user_id',$id)->firstOrFail();
            $imageData->image = $request->image;
            $imageData->save();
            DB::commit();
            return redirect(route('display.show',$id))
            ->with('success', '更新しました');    
        }catch(Exception $e){
            DB::rollback();
            return redirect(route('display.show',$id))
            ->with('success', '失敗しました');    
        }
             
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // データの削除
    {
        //
    }
}
