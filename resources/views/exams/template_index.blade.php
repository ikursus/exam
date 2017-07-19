@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Senarai Users</div>

                <div class="panel-body">
                    Berikut adalah senarai users sistem ini.

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>NAMA</th>
                          <th>TARIKH MULA</th>
                          <th>TARIKH TAMAT</th>
                          <th>KUOTA</th>
                          <th>STATUS</th>
                          <th>ACTION</th>
                        </tr>
                      </thead>
                    <tbody>
                    @foreach( $senarai_exams as $exam )

                      <tr>
                        <td>{{ $exam->id }}</td>
                        <td>{{ $exam->nama }}</td>
                        <td>{{ $exam->tarikh_mula }}</td>
                        <td>{{ $exam->tarikh_mula }}</td>
                        <td>{{ $exam->kuota }}</td>
                        <td>{{ $exam->status }}</td>
                        <td>
                          <a href="{{ route('lihatexam', $exam->id) }}" class="btn btn-xs btn-primary">SHOW</a>
                        </td>
                      </tr>

                    @endforeach
                    </tbody>
                    </table>

                    {!! $senarai_exams->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
