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

                    @include('layouts/alerts')

                    <p>Berikut adalah senarai users sistem ini.</p>

                    <table class="table table-bordered" id="users-table">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>NAMA</th>
                          <th>EMAIL</th>
                          <th>ACTION</th>
                        </tr>
                      </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatablesUsers') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nama', name: 'nama' },
            { data: 'email', name: 'email' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endsection
