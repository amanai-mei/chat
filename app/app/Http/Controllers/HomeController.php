<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_chat;

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

    public function getData()
{
    $comments = User_chat::orderBy('created_at', 'desc')->get();
    $json = ["comments" => $comments];
    return response()->json($json);
}

}
