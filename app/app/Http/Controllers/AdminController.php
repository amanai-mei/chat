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
         // groupsへの登録
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
        $image = new Image;
        $i = $image
        ->where('user_id',$id)->first(['image']);
        return view('delete',[
            'user_id' => $user_id,
            'image' => $i->image ?? "",
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
        //
    }

    public function searchAdmin(Request $request) // 新規作成画面のデータ保存
    {
             $users = User::join('images', 'users.id', 'user_id')
                ->select('images.image','users.name','users.id','users.role','users.del_flg')
                ->paginate(20);

        // 検索画面
        // ユーザー一覧をページネートで取得
        // $users = User::paginate(20);

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
        return view('admin_search')
        ->with([
            'users' => $users,
            'search' => $search,
            // 'images' => $images,
        ]);
    }
}
