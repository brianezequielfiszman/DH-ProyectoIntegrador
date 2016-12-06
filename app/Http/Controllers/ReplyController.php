<?php

namespace Manija\Http\Controllers;

use Illuminate\Http\Request;
use Manija\User;
use Manija\Message;
use Manija\Reply;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $message        = ($request->has('message_id')) ? Message::find($request->message_id) : null;
      $message_id     = $message->id        ?? null;

      $this->validate($request, [
        'message_id'        => 'required',
        'content'           => 'required'
      ]);

      if ($request->origin_id != $message->user_recipient_id || isset($message->reply_id)):
        return redirect()->back();
      else:
        $storedReply = Reply::create([ 'content' => $request->content ]);
        $message->reply_id = $storedReply->id;
        $message->save();
      endif;


      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
}
