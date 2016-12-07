<?php

namespace Manija\Http\Controllers;

use Manija\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
   * Create a new controller instance.
   */
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('admin', ['only' => ['create', 'store', 'destroy']]);
      $this->middleware('adminAndTeacher', ['only' => ['index']]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.list')->with('users', User::all())->with('action', '');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return (new Auth\RegisterController())->showRegistrationForm();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return (new Auth\RegisterController())->register($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return (User::find($id) and Auth::user()->id == $id) ? view('user.show')->with('user', User::find($id)) : view('errors.user-not-exists');
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
      $user = User::find($id);
      return ($user) ? view('user.edit')->withUser($user) : view('errors.user-not-exists');
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
      $user = User::find($id);
      $this->validate($request, [
        'name'     => 'required|alpha|max:20',
        'lastName' => 'required|alpha|max:20',
        'category' => 'required|in:1,2,3',
      ]);

      $user->name        = ucfirst($request['name']);
      $user->lastName    = ucfirst($request['lastName']);
      $user->category_id = $request['category'];

      $user->save();
      return redirect(route('user.edit', $user->id));
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
      User::find($id)->delete();
      return view('user.deleted');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $users = ($request->has('user')) ? User::where('name', 'LIKE', $request->user.'%')->get() : null;
        if ($request->action == 'edit' || $request->action == 'delete')
          return ($users) ? view('user.list')->withUsers($users)->withAction($request->action) : view('user.error-not-exists');
        else
          return ($users) ? view('user.list')->withUsers($users)->withAction('') : view('errors.user-not-exists');
    }
}
