<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\User;
use Datatables;

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
        // $senarai_users = DB::table('users')
        // ->select('id', 'nama', 'email')
        // ->orderBy('id', 'desc')
        // ->paginate(10);

        // $senarai_users = User::select('id', 'nama', 'email')
        // ->orderBy('id', 'desc')
        // ->paginate(10);

        //dd($senarai_users);

        // Bagi response papar template senarai users
        // return view('users/template_index', compact('senarai_users') );
        return view('users/template_index');
    }

    public function datatables()
    {
      // Query ke table users
      $senarai_users = User::select(
        'id',
        'nama',
        'email',
        'telefon',
        'status',
        'role'
      );

      // Return response
      return Datatables::of($senarai_users)
      ->addColumn('action', function ($user) {
        return '

<a href="' . route('lihatuser', $user->id) . '" class="btn btn-xs btn-primary">SHOW</a>
<a href="' . route('edituser', $user->id) . '" class="btn btn-xs btn-info">EDIT</a>

<!-- Button trigger modal -->
<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete-' . $user->id . '">
DELETE
</button>

<!-- Modal -->
<form method="POST" action="'. route('deleteuser', $user->id) .'">
<div class="modal fade" id="modal-delete-' . $user->id . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">PENGESAHAN HAPUS DATA</h4>
</div>
<div class="modal-body">

  Adakah anda ingin menghapuskan data : ' . $user->nama . '?

 ' . csrf_field() . '
  <input type="hidden" name="_method" value="delete">


</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-danger">SAHKAN</button>
</div>
</div>
</div>
</div>
</form>

        ';

      })
      ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users/template_add_user');
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
          'email' => 'required|email',
          'password' => 'required|min:3',
          'ic' => 'required|numeric'
        ]);

        // Dapatkan semua data yang dikirimkan.
        $data = $request->except('password');
        $data['password'] = bcrypt( $request->input('password') );

        // Simpan data ke dalam database
        // DB::table('users')->insert( $data );
        User::create( $data );

        // Bagi response
        return redirect()->route('users')->with('alert-success', 'Anda berjaya menambah user baru!');
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
      // $user = DB::table('users')
      // ->where('id', '=', $id)
      // ->first();

      $user = User::find($id);

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
      // Dapatkan rekod user daripada table users
      // $user = DB::table('users')
      // ->where('id', '=', $id)
      // ->first();

      $user = User::find($id);

      // Bagi response papar template senarai users
      return view('users/template_edit_user', compact('user') );
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
        'email' => 'required|email',
        'ic' => 'required|numeric'
      ]);

      // Dapatkan semua data yang dikirimkan.
      $data = $request->except('password');

      // Sekiranya ruangan password tidak kosong, maka dapatkan dan encrypt password baru
      if ( !empty ($request->input('password') ) )
      {
        $data['password'] = bcrypt( $request->input('password') );
      }

      // Kemaskini data ke dalam database
      // DB::table('users')->where('id', '=', $id)->update( $data );
      User::find($id)->update($data);
      // Bagi response
      return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // Dapatkan rekod user daripada table users
      // $user = DB::table('users')
      // ->where('id', '=', $id)
      // ->delete();

      // $user = User::find($id)->delete();
      // DApatkan maklumat user
      $user = User::find($id);
      // Semak status user
      if ( $user->role == 'admin' )
      {
        return redirect()->route('users')->with('alert-danger', 'Anda tidak boleh delete admin!');
      }
      // Kalau tak ada masalah, teruskan proses delete
      $user->delete();

      // Bagi response
      return redirect()->route('users')->with('alert-success', 'Anda berjaya menghapuskan user!');
    }
}
