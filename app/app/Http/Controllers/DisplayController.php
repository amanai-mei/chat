<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;
use App\Group;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        //
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
    public function update(int $id, Request $request)
    { // 編集データの保存

        try {
            DB::beginTransaction(); //トランザクションの開始
            $user = new User;
            // findOrFail()：エラー（404HTTPレスポンス）を返す。例外処理。
            $user_id = $user->findOrFail($id);
            
            // マイページの名前・メールアドレスの編集
            $user_id->name = $request->name;
            $user_id->email = $request->email;
            $user_id->save();

            // 画像
            $imageData = Image::updateOrCreate(
                ['user_id'=>$id],
                ['image'=>$request->image,'user_id'=>$id],
            );
            DB::commit(); // DBに反映
            return view('user_mypage',[
                'user_id' => $user_id,
                'image' => $imageData->image,
            ])->with('success', '更新しました'); 

        }catch(Exception $e){
            DB::rollback(); // トランザクションの開始まで戻る
            return view('user_mypage',[
                'user_id' => $user_id,
                'image' => $imageData->image,
            ])->with('success', '失敗しました');    
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

    public function searchUser(Request $request) // 新規作成画面のデータ保存
    {
        // 検索画面

        // ユーザー一覧をページネートで取得
        $users = User::paginate(20);

        // 検索フォームで入力された値を取得する
        $search = $request->input('search');

        // クエリビルダ
        $query = User::query(); 
        
        if ($search) {

            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('name', 'like', '%'.$value.'%');
            }
            // 上記で取得した$queryをページネートにし、変数$usersに代入
            $users = $query->paginate(20);
        }
        var_dump($users['total']);
        return view('user_search')
        ->with([
            'users' => $users,
            'search' => $search,
        ]);
    }
}
