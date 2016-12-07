<?php

namespace Manija\Http\Controllers;

use Illuminate\Http\Request;
use Manija\User;
use Manija\Message;
use Auth;
use Response;

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
        $this->middleware('teacher', ['only' => ['userHome']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        switch (Auth::user()->category->description):
          case 'parent':
            $user = User::find(Auth::user()->id);
            return view('home.parent')->withMessages($user->recentMessages())->withResponse(Response::json(User::all()));
            break;
          case 'teacher':
            $user = User::find(Auth::user()->id);
            return view('home.teacher')->withMessages($user->recentMessages());
            break;
          case 'admin':
            return redirect(route('admin.index'));
            break;
        endswitch;
    }

    public function welcome(){
        return (Auth::check()) ? redirect(route('home')) : view('welcome');
    }

    public function userHome($id){
        $user = User::find($id);
        return ($user and $user->category->description === 'parent') ? view('home.parent')->withMessages($user->recentMessages())->withUser($user) : view('errors.user-not-exists');
    }
}
