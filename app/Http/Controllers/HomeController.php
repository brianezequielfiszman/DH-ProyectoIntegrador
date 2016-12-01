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
        $this->middleware('auth')->except('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        switch (Auth::user()->category->description) {
          case 'parent':
            $user = User::find(Auth::user()->id);
            return view('home')->withMessages($user->messages);
            break;
          case 'teacher':
            $user = User::find(Auth::user()->id);
            return view('home')->withMessages($user->messages);
            break;
          case 'admin':
            return redirect(route('admin.index'));
            break;
        }
    }

    public function welcome(){
        return (Auth::check()) ? redirect(route('home')) : view('welcome');
    }

    public function showUserPage($id)
    {
        $user = User::find($id);
        return view('home')->withMessages($user->messages)->withUser($user);
    }
}
