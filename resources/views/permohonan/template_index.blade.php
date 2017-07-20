@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Senarai Permohonan Exam</div>

                <div class="panel-body">

                    <p>
                      <a href="{{ route('paparborangpermohonan') }}" class="btn btn-primary">Pohon Exam Baru</a>
                    </p>

                    @include('layouts/alerts')

                    @if ( count( $senarai_permohonan ) )

                    <p>Berikut adalah senarai permohonan exam yang telah dibuat.</p>

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>NAMA PEMOHON</th>
                          <th>NAMA EXAM</th>
                          <th>STATUS</th>
                          <th>ACTION</th>
                        </tr>
                      </thead>
                    <tbody>
                    @foreach( $senarai_permohonan as $item )

                      <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->user_id }}</td>
                        <td>{{ $item->exam_id }}</td>
                        <td>{{ ucwords( $item->status ) }}</td>
                        <td>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}">
                            DELETE
                          </button>

                          <!-- Modal -->
                          <form method="POST" action="{{ route('deletepermohonan', $item->id) }}">
                          <div class="modal fade" id="modal-delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="myModalLabel">PENGESAHAN HAPUS DATA</h4>
                                </div>
                                <div class="modal-body">

                                  Adakah anda ingin menghapuskan data : {{ $item->nama }}?

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

                    @else
                    <div class="alert alert-info">Tiada rekod senarai permohonan exam buat masa ini</div>
                    @endif

                    {!! $senarai_permohonan->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
