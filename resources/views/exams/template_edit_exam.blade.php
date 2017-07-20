@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Borang Maklumat Exam Baru</div>

                <div class="panel-body">

                  @include('layouts/alerts')

                  {!! Form::model( $exam, ['method' => 'PATCH', 'route' => ['updateexam', $exam->id], 'class' => 'form-horizontal']) !!}

                      @include('permohonan/template_borang_permohonan')

                  {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
