<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function findUser(Request $request)
    {
        $users = ($request->has('user')) ? User::where('name', 'LIKE', '%'.$request->user.'%')->get() : null;
        return ($users) ? view('users.show')->withUsers($users) : view('welcome');
    }
}
