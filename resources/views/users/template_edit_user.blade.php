@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Borang Maklumat User {{ $user->nama }}</div>

                <div class="panel-body">

                  @include('layouts/alerts')

                  <form class="form-horizontal" method="POST" action="{{ route('updateuser', $user->id) }}">
                      {{ csrf_field() }}

                      <input type="hidden" name="_method" value="patch">

                      <div class="form-group">
                          <label for="name" class="col-md-4 control-label">Nama</label>

                          <div class="col-md-6">
                              <input type="text" class="form-control" name="nama" value="{{ $user->nama }}" autofocus>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="email" class="col-md-4 control-label">Email</label>

                          <div class="col-md-6">
                              <input type="email" class="form-control" name="email" value="{{ $user->email }}" autofocus>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="password" class="col-md-4 control-label">Password</label>

                          <div class="col-md-6">
                              <input type="password" class="form-control" name="password" autofocus>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="ic" class="col-md-4 control-label">No. IC</label>

                          <div class="col-md-6">
                              <input type="text" class="form-control" name="ic" value="{{ $user->ic }}" autofocus>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="jantina" class="col-md-4 control-label">Jantina</label>

                          <div class="col-md-6">
                              <select name="jantina" class="form-control">
                                <option value="lelaki">Lelaki</option>
                                <option value="perempuan">Perempuan</option>
                              </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="telefon" class="col-md-4 control-label">No. Telefon</label>

                          <div class="col-md-6">
                              <input type="text" class="form-control" name="telefon" value="{{ $user->telefon }}" autofocus>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="alamat" class="col-md-4 control-label">Alamat</label>

                          <div class="col-md-6">
                              <textarea name="alamat" class="form-control">{{ $user->alamat }}</textarea>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="role" class="col-md-4 control-label">Role</label>

                          <div class="col-md-6">
                              <select name="role" class="form-control">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                              </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="name" class="col-md-4 control-label">Status</label>

                          <div class="col-md-6">
                              <select name="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="banned">Banned</option>
                              </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-8 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Simpan Rekod
                              </button>
                          </div>
                      </div>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
