@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Senarai Users</div>

                <div class="panel-body">

                    <p>
                      <a href="{{ route('paparborangtambahuser') }}" class="btn btn-primary">Tambah User</a>
                    </p>

                    <p>Berikut adalah senarai users sistem ini.</p>

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>NAMA</th>
                          <th>EMAIL</th>
                          <th>ACTION</th>
                        </tr>
                      </thead>
                    <tbody>
                    @foreach( $senarai_users as $user )

                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                          <a href="{{ route('lihatuser', $user->id) }}" class="btn btn-xs btn-primary">SHOW</a>
                          <a href="{{ route('edituser', $user->id) }}" class="btn btn-xs btn-info">EDIT</a>
                        </td>
                      </tr>

                    @endforeach
                    </tbody>
                    </table>

                    {!! $senarai_users->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
