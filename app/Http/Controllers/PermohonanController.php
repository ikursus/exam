<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Permohonan;
use App\Exam;

class PermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();


          $senarai_permohonan = Permohonan::paginate(10);
          // Kaedah join table menggunakan QUERY BUILDER
          // $senarai_permohonan = DB::table('permohonan')
          // ->join('users', 'permohonan.user_id', '=', 'users.id')
          // ->join('exams', 'permohonan.exam_id', '=', 'exams.id')
          // ->select('permohonan.*', 'users.nama', 'exams.nama as nama_exam')
          // ->paginate(10);
        

        return view('permohonan/template_index', compact('senarai_permohonan') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // Dapatkan senarai exams
      $exams = Exam::where('status', '=', 'buka')->get();

      return view('permohonan/template_add_permohonan', compact('exams'));
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
        'exam_id' => 'required|integer'
      ]);

      // Simpan rekod ke dalam database
      $data = new Permohonan;
      $data->user_id = Auth::user()->id;
      $data->exam_id = $request->input('exam_id');
      $data->status = 'pending';
      $data->save();

      // Cara kedua
      // $data = $request->all();
      // $data['user_id'] = Auth::user()->id;
      // $data['user_id'] = 'pending';
      //
      // Permohonan::create($data)

      return redirect()->route('permohonan')->with('alert-success', 'Permohonan berjaya ditambah!');
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
        Permohonan::find($id)->delete();

        return redirect()->back()->with('alert-success', 'Permohonan berjaya dihapuskan!');
    }
}
