<?php

namespace Manija\Http\Controllers;

class AdminController extends Controller
{
    /**
   * Create a new controller instance.
   */
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('admin');
  }

    /**
     * Display admin panel.
     */
    public function index()
    {
        return view('admin.index');
    }
}
