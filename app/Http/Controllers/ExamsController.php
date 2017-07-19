<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senarai_exams = DB::table('exams')->paginate(10);

        return view('exams/template_index', compact('senarai_exams') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exams/template_add_exam');
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
        'nama' => 'required|string|min:3',
        'tarikh_mula' => 'required',
        'tarikh_tamat' => 'required',
        'kuota' => 'required|numeric',
        'status' => 'required'
      ]);

      // Dapatkan semua data yang dikirimkan.
      $data = $request->only('nama', 'tarikh_mula', 'tarikh_tamat', 'kuota', 'status');

      // Simpan data ke dalam database
      DB::table('exams')->insert( $data );

      // Bagi response
      return redirect()->route('exams');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $exam = DB::table('exams')->where('id', $id)->first();

      return view('exams/template_show', compact('exam') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $exam = DB::table('exams')->where('id', $id)->first();

      return view('exams/template_edit_exam', compact('exam') );
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
      $this->validate($request, [
        'nama' => 'required|string|min:3',
        'tarikh_mula' => 'required',
        'tarikh_tamat' => 'required',
        'kuota' => 'required|numeric',
        'status' => 'required'
      ]);

      // Dapatkan semua data yang dikirimkan.
      $data = $request->only('nama', 'tarikh_mula', 'tarikh_tamat', 'kuota', 'status');

      // Simpan data ke dalam database
      DB::table('exams')->where('id', $id)->update( $data );

      // Bagi response
      return redirect()->route('exams');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = DB::table('exams')->where('id', $id)->delete();

        return redirect()->route('exams');
    }
}
