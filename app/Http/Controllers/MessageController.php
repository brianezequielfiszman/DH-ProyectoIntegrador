<?php

namespace Manija\Http\Controllers;

use Illuminate\Http\Request;
use Manija\Message;
use Manija\User;
use Manija\Redirect;

class MessageController extends Controller
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
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(Request $request)
    {
      $user_recipient = ($request->has('user_recipient')) ? User::where('name', $request->user_recipient)->first() : null;

      $user_origin    = ($request->has('user_origin')) ? User::find($request->user_origin) : null;

      $user_recipient_id = $user_recipient->id ?? null;
      $user_origin_id    = $user_origin->id    ?? null;

      $this->validate($request, [
        'user_origin'       => 'required|exists:users,id',
        'user_recipient'    => 'required|exists:users,name',
        'message'           => 'required'
      ]);

      Message::create([
        'user_origin_id'    => $user_origin_id,
        'user_recipient_id' => $user_recipient_id,
        'message'           => $request->message
      ]);

      return redirect()->route('userMainPage');
    }
}
