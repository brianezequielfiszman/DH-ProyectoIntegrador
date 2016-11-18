<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\Redirect;

class MessageController extends Controller
{
    public function sendMessage(Request $request){
        Message::create([
          'user_id' => $request->user_id,
          'user_recipient_id' => 1,
          'text' => $request->message
        ]);
        return redirect()->route('userMainPage');
    }
}
