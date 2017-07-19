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

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $user->id }}">
                            DELETE
                          </button>

                          <!-- Modal -->
                          <form method="POST" action="{{ route('deleteuser', $user->id) }}">
                          <div class="modal fade" id="modal-delete-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="myModalLabel">PENGESAHAN HAPUS DATA</h4>
                                </div>
                                <div class="modal-body">

                                  Adakah anda ingin menghapuskan data : {{ $user->nama }}?

                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">


                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-danger">SAHKAN</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          </form>



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
