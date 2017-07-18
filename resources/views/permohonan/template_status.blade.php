@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $page_title }}</div>
                <div class="panel-body">

                  @include('layouts/alerts')

                  <form class="form-horizontal" method="POST" action="{{ route('checkpermohonan') }}">
                      {{ csrf_field() }}

                      <div class="form-group">
                          <label for="email_pemohon" class="col-md-4 control-label">Email Pemohon</label>

                          <div class="col-md-6">
                              <input type="email" class="form-control" name="email_pemohon" value="{{ old('email_pemohon') }}" required autofocus>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-8 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Semak Permohonan
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
