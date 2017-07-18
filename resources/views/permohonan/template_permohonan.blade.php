@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $page_title }}</div>
                <div class="panel-body">

                  @include('layouts/alerts')

                  <form class="form-horizontal" method="POST" action="{{ route('storepermohonan') }}">
                      {{ csrf_field() }}

                      <div class="form-group">
                          <label for="nama_pemohon" class="col-md-4 control-label">Nama Pemohon</label>

                          <div class="col-md-6">
                              <input type="text" class="form-control" name="nama_pemohon" value="{{ old('nama_pemohon') }}"  autofocus>
                              {!! $errors->first('nama_pemohon', '<span class="text-danger">:message</span>') !!}
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="email_pemohon" class="col-md-4 control-label">Email Pemohon</label>

                          <div class="col-md-6">
                              <input type="email" class="form-control" name="email_pemohon" value="{{ old('email_pemohon') }}" required autofocus>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="telefon_pemohon" class="col-md-4 control-label">Telefon Pemohon</label>

                          <div class="col-md-6">
                              <input type="text" class="form-control" name="telefon_pemohon" value="{{ old('telefon_pemohon') }}" required autofocus>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="exam_id" class="col-md-4 control-label">Pilihan Exam</label>

                          <div class="col-md-6">
                              <select name="exam_id" class="form-control">
                                <option value="1">Exam 1</option>
                                <option value="2">Exam 2</option>
                                <option value="3">Exam 3</option>
                              </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="tarikh_exam" class="col-md-4 control-label">Tarikh Exam</label>

                          <div class="col-md-6">
                              <select name="tarikh_exam" class="form-control">
                                <option value="1">1 Ogos 2017</option>
                                <option value="2">2 Ogos 2017</option>
                                <option value="3">3 Ogos 2017</option>
                              </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-8 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Hantar Permohonan
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
