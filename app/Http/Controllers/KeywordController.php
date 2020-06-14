<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keyword;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class KeywordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::check() && Auth::user()->isAdmin())
        return view ('shop.admin_pages.add_keyword');
      else return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(Auth::check() && Auth::user()->isAdmin()){
          $validator = Validator::make($request->all(), [
              'name' => 'required|regex:/^[a-zA-Z ]+$/|unique:keywords'
          ]);

          if ($validator->fails()) {
              return redirect('/keyword/create')->withErrors($validator);
          }
          $keyword = new Keyword;
          $keyword->Name=$request->name;
          $keyword->save();
          return redirect ('/admin');
        } else return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
