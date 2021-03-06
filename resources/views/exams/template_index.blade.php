@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Senarai Exams</div>

                <div class="panel-body">
                  <p>
                    <a href="{{ route('paparborangtambahexam') }}" class="btn btn-primary">Tambah Exam</a>
                  </p>

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
                          <a href="{{ route('editexam', $exam->id) }}" class="btn btn-xs btn-info">EDIT</a>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $exam->id }}">
                            DELETE
                          </button>

                          <!-- Modal -->
                          <form method="POST" action="{{ route('deleteexam', $exam->id) }}">
                          <div class="modal fade" id="modal-delete-{{ $exam->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="myModalLabel">PENGESAHAN HAPUS DATA</h4>
                                </div>
                                <div class="modal-body">

                                  Adakah anda ingin menghapuskan data : {{ $exam->nama }}?

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

                    {!! $senarai_exams->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
