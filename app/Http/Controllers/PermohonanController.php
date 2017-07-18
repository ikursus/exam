<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermohonanController extends Controller
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
    public function paparborangpermohonan()
    {
      $page_title = 'Borang Permohonan Menduduki Peperiksaan';

      return view('permohonan/template_permohonan', compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Validate data
      $this->validate($request, [
        'nama_pemohon' => 'required|string|min:3',
        'email_pemohon' => 'required|email'
      ] );


        return $request->all();
        // return $request->input('nama_pemohon');
    }

    public function statuspermohonan()
    {
      $page_title = 'Status Permohonan Exam';

      return view('permohonan/template_status', compact('page_title') );
    }

    public function checkpermohonan(Request $request)
    {
      // Validate data
      $this->validate($request, [
        'email_pemohon' => 'required|email'
      ] );

        return $request->all();
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
