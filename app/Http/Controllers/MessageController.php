<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\Redirect;

class MessageController extends Controller
{
    public function sendMessage(Request $request){
        $user_recipient = ($request->has('user_recipient')) ? User::where('name', $request->user_recipient)->first() : null;

        $user_recipient_id = $user_recipient->id ?? null;

        if(isset($user_recipient_id))
        Message::create([
          'user_id' => $request->user_id,
          'user_recipient_id' => $user_recipient_id,
          'text' => $request->message
        ]);
        return redirect()->route('userMainPage');
    }
}
