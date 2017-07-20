@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Permohonan Menduduki Exam</div>
                <div class="panel-body">

                  @include('layouts/alerts')

                  <form class="form-horizontal" method="POST" action="{{ route('storepermohonan') }}">
                      {{ csrf_field() }}

                      <div class="form-group">
                          <label for="exam_id" class="col-md-4 control-label">Pilihan Exam</label>

                          <div class="col-md-6">
                              <select name="exam_id" class="form-control">
                                @foreach( $exams as $item )
                                <option value="{{ $item->id }}">{{ $item->nama }} ({{ $item->tarikh_mula }})</option>
                                @endforeach
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
