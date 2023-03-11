@extends('template.dashmain')

@section('container')

<div class="container">
    <div class="card shadow  mb-4">
      
        <div class="card-header py-3">
            <a class="btn btn-primary" href="/dashboard/{{ $api }}/create">Tambah {{ $judul }} <i class="bi bi-file-earmark-plus"></i></a>
        </div>
        @if (session()->has('success'))
        <div class="row justify-content-center">
         <div class="col-lg-10">
            <div class="alert alert-success text-center alert-dismissible fade show mt-2" role="alert">
             {{ session('success') }}
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
         </div>
        </div>   
       @endif
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>#</th>
                            <th>Nama {{ $judul }}</th>
                            <th>Aksi</th>
                    </thead>
                    @foreach ($category as $mu)
                    <tbody class="text-center"   >
                        <td>{{ $loop->iteration }}</td>
                        <td >{{ $mu->name }}</td>
                        <td class="text-center d-block">
                            <a href="/product?{{ $api }}={{ $mu->slug }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            <a href="/dashboard/{{ $api }}/{{ $mu->slug }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <form action="/dashboard/{{ $api }}/{{ $mu->slug }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0" onclick="return confirm('Apakah Kamu Yakin?')"><i class="fas fa-trash-alt"></i></button>
                                </form>
                        </td>
                    </tbody> 
                    @endforeach
                </table>
                
            </div>
            
        </div>
    </div>
</div>

@endsection