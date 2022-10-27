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
        // $users = $user
        // ->join('images', 'users.id', 'user_id')
        // ->get();

        // グループの表示(カリキュラム・入社日)
        $group = new Group;
        $groupall = $group->all()->toArray();
        $groups = $group
        ->join('user_groups', 'groups.id', 'group_id')
        ->orderBy('groups.id', 'asc')
        ->get();

   
       
        // 画像の表示
        // $user = Auth::User()->find($id);
        // $image = new Image;
        // $i = $image
        // ->where('user_id',$id)->first(['image']);
        
        // ログイン後のページ遷移
        if($role['role'] == 0){
            // ユーザートップページ表示
            return view('user_home',[
                'users' => $users,
                'groups'  => $groups,
                'groupall' => $groupall,
                ]);
            }else{
                // 管理者トップページ表示
                return view('admin_home',[
                    'users' => $users,
                    'groups'  => $groups,
                    'groupall' => $groupall,
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
        // マイページの表示(名前・メールアドレスの表示)
        $user_id = Auth::User()->find($id);

        // 画像の表示
        $user = Auth::User()->find($id);
        $image = new Image;
        $i = $image
        ->where('user_id',$id)->first(['image']);
        return view('user_mypage',[
            'user_id' => $user_id,
            'image' => $i->image ?? "",
            'user' => $user,
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
        $image = new Image;
        $i = $image
        ->where('user_id',$id)->first(['image']);
        return view('u_mypage_update',[
            'user_id' => $user_id,
            'i' => $i,
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

            // 画像の登録
            // storage/app直下の任意のディレクトリにユニークなファイル名で保存
            // name=image, storage/public/image
            $image = $request->file('image')->store('public/image');
            // $imageに保存されているファイル名からpublic/image/という文字列を''（空文字）に置き換える(これで画面表示ができる様になる)
            $image = str_replace('public/image/', '', $image);
            $imageData = Image::updateOrCreate(
                ['user_id'=>$id], // where
                ['image'=>$image,'user_id'=>$id],
            );
       
            DB::commit(); // DBに反映
            session()->flash('flash_message', '更新しました');
            return view('user_mypage',[
                'user_id' => $user_id,
                'image' => $imageData->image,
            ]);
            // ->with('success', '更新しました'); 

        }catch(Exception $e){
            DB::rollback(); // トランザクションの開始まで戻る
            session()->flash('flash_message', '失敗しました');
            return view('user_mypage',[
                'user_id' => $user_id,
                'image' => $imageData->image,
            ]);
            // ->with('success', '失敗しました');    
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
        $users = User::join('images', 'users.id', 'user_id')
                ->select('images.image','users.name','users.id','users.role','users.del_flg')
                ->paginate(20);


        // 検索画面
        // ユーザー一覧をページネートで取得
        // $users = $users->paginate(20);
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
        return view('user_search',[
            'users' => $users,
            'search' => $search,
            // 'images' => $images,
            // 'images' => $images,
        ]);
    }
}
