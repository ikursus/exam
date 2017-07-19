@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Borang Maklumat Exam Baru</div>

                <div class="panel-body">

                  @include('layouts/alerts')

                  <form class="form-horizontal" method="POST" action="{{ route('updateexam', $exam->id) }}">
                      {{ csrf_field() }}

                      <input type="hidden" name="_method" value="patch">"

                      <div class="form-group">
                          <label for="name" class="col-md-4 control-label">Nama</label>

                          <div class="col-md-6">
                              <input type="text" class="form-control" name="nama" value="{{ $exam->nama }}" autofocus>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="tarikh_mula" class="col-md-4 control-label">Tarikh Mula</label>

                          <div class="col-md-6">
                              <input type="date" class="form-control" name="tarikh_mula" value="{{ $exam->tarikh_mula }}" autofocus>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="tarikh_tamat" class="col-md-4 control-label">Tarikh Tamat</label>

                          <div class="col-md-6">
                              <input type="date" class="form-control" name="tarikh_tamat" value="{{ $exam->tarikh_tamat }}" autofocus>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="kuota" class="col-md-4 control-label">Kuota</label>

                          <div class="col-md-6">
                              <input type="text" class="form-control" name="kuota" value="{{ $exam->kuota }}" autofocus>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="name" class="col-md-4 control-label">Status</label>

                          <div class="col-md-6">
                              <select name="status" class="form-control">
                                <option value="buka">Buka</option>
                                <option value="tutup">Tutup</option>
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
