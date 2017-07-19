<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Dapatkan senarai users daripada table users
        // $senarai_users = DB::table('users')->paginate(10);
        $senarai_users = DB::table('users')
        ->select('id', 'nama', 'email')
        ->orderBy('id', 'desc')
        ->paginate(10);

        //dd($senarai_users);

        // Bagi response papar template senarai users
        return view('users/template_index', compact('senarai_users') );
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
      // Dapatkan rekod user daripada table users
      $user = DB::table('users')
      ->where('id', '=', $id)
      ->first();

      // Bagi response papar template senarai users
      return view('users/template_show', compact('user') );
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
