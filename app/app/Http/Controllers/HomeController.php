<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_chat;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comments = User_chat::get();
        return view('home', ['comments' => $comments]);
    }

    public function add(Request $request)
{
    $user = Auth::user();
    $comment = $request->input('message');
    $to_id = 1;
    User_chat::create([
        'user_id' => $user->id,
        'message' => $comment,
        'to_id' => $to_id,
    ]);
    return redirect('/home');
}

    public function getData()
{
    $comments = User_chat::orderBy('created_at', 'desc')->get();
    $json = ["comments" => $comments];
    return response()->json($json);
}

}
