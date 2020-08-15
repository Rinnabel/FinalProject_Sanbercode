@extends('master')

@section ('content')

    <div class="mt-3 ml-3 ">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Pertanyaan</h3>
            </div>
                <!-- /.card-header -->
                <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">
                {{ session('success')}}
                </div>
                @endif
                <a class="btn btn-primary mb-2" href="/pertanyaan/create">Create New </a>
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Judul</th>
                      <th>Isi</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($post as $key => $p)
                        <tr>
                        <td> {{ $key + 1 }} </td>
                        <td> {{ $p->judul }} </td>
                        <td> {{ $p->isi  }}</td>
                        <td style="display: flex;"> 
                        <a href="/pertanyaan/{{ $p->id }}" class="btn btn-info btn-sm">Show</a>
                            <a href="/pertanyaan/{{ $p->id }}/edit" class="btn btn-default btn-sm">Edit</a>
                            <form action="/pertanyaan/{{ $p->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                            </form>
                        </tr>
                        @empty
                        <tr>
                        <td colspan="4" align="center"> No Posts </td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- .card-body --> 
              <!-- <div class="card-footer">
                  <a href="/pertanyaan/create" action class="btn btn-info">Buat Pertanyaan Baru</a>
                </div>
            </div>
    </div>
                
@endsection