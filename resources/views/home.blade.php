@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>NAMA</th>
                          <th>EMAIL</th>
                        </tr>
                      </thead>
                    <tbody>
                    @foreach( $users as $user )

                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                      </tr>

                    @endforeach
                    </tbody>
                    </table>

                    {!! $users->links() !!}
                    {!! $users->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
