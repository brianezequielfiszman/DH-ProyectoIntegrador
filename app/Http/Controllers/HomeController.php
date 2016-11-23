<?php

namespace Manija\Http\Controllers;

use Illuminate\Http\Request;
use Manija\User;
use Manija\Message;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('home')->withMessages($user->receivedMessages);
    }

    public function showUserPage($id)
    {
        $user = User::find($id);
        return view('home')->withMessages($user->receivedMessages)->withUser($user);
    }
}
