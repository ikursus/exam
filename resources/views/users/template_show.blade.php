@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Senarai Users</div>

                <div class="panel-body">
                    Berikut adalah maklumat bagi user {{ $user->nama }}.

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>NAMA</th>
                          <th>EMAIL</th>
                        </tr>
                      </thead>
                    <tbody>
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                      </tr>
                    </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Senarai Permohonan Exam oleh {{  $user->nama }}</div>

                <div class="panel-body">
                    Berikut adalah maklumat senarai permohonan bagi user {{ $user->nama }}.

                    @if ( count( $user->senaraiPermohonan ) )

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>NAMA EXAM</th>
                        </tr>
                      </thead>
                    <tbody>
                      @foreach ( $user->senaraiPermohonan as $permohonan )
                      <tr>
                        <td>{{ $permohonan->status }}</td>
                        <td>{{ $permohonan->rekodexam->nama }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                    </table>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
