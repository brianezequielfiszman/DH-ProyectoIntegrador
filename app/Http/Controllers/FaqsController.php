<?php

namespace Manija\Http\Controllers;

use Illuminate\Http\Request;
use Manija\Faqs;

class FaqsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['only' => ['create', 'store', 'destroy', 'edit', 'update', 'list', 'deleteList', 'editList']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('faqs.index')->withFaqs(Faqs::all());
    }

    public function list($action = '')
    {
        return view('admin.faqs.index')->withFaqs(Faqs::all())->withAction($action);
    }

    public function editList()
    {
        return $this->list('edit');
    }

    public function deleteList()
    {
        return $this->list('delete');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'title'     => 'required|min:10|max:225',
          'content'   => 'required|min:10|max:225'
        ]);

        Faqs::create([
          'title'   => $request->title,
          'content' => $request->content
        ]);

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
