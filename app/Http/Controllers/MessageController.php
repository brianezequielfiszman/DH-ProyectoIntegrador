<?php

namespace Manija\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
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

      $validation = Validator::make(
        array(
          'user_recipient'  => User::find($user_recipient_id)->category->description,
        ),
        array(
          'user_recipient' => array( 'required', 'not_in:'.Auth::user()->category->description.',admin' ),
        )
      );

      if ( $validation->fails() ) {
        $errors = $validation->messages();
        return redirect()->back()->with('errors', $errors);
      }

      Message::create([
        'user_origin_id'    => $user_origin_id,
        'user_recipient_id' => $user_recipient_id,
        'message'           => $request->message
      ]);

      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Message::find($id)->delete();
      return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $message = Message::find($id);
      $this->validate($request, [
        'message'           => 'required'
      ]);
      $message->message = $request['message'];
      $message->save();
      return redirect(route('home'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $message = Message::find($id);
      return ($message) ? view('message.edit')->withMessage($message) : view('user.error-not-exists');
    }

    public function autocomplete(Request $request)
    {
      $query = $request->get('term', '');
      if(Auth::user()->category->description != 'admin')
        $data  = User::where("name","LIKE",'%'.$query.'%')->where('category_id', '!=', Auth::user()->category_id)->where('category_id', '!=', '1')->get();
      else
        $data  = User::where("name","LIKE",'%'.$query.'%')->get();
      return response()->json($data);
    }
}
