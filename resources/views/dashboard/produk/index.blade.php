@extends('template.Dashmain')
@section('container')
    

<div class="container-fluid ">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center text-uppercase">Produk Forever19.ID</h1>
    @if (session()->has('success'))
    <div class="row d-flex justify-content-center">
        <div class="col-lg-7">
            <div class="alert alert-success alert-dismissible fade show mt-2 text-center" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
      
    @endif
    <!-- DataTales Example -->
  
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow  mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-primary" href="/dashboard/produk/create">Tambah Produk <i class="bi bi-file-earmark-plus"></i></a>
                </div>
                <div class="card-body ">
                    <div class="table-responsive-lg">
                        <table class="table table-bordered " id="dataTable"  cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Gambar Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                            </thead>
                            @foreach ($produk as $mu)
                            <tbody class="text-center"   >
                                <td>{{ $loop->iteration }}</td>
                                <td ><img class="img-fluid " style="width:200px" src="/assets/img/{{ $mu->image }}" alt=""></td>
                                <td >{{ $mu->title }}</td>
                                <td >@currency( $mu->harga )</td>
                                <td class="text-capitalize">{!! Str::limit($mu->deskripsi, 100)  !!}</td>
                                
                             
                                <td class="text-center  d-block">
                                    <div class="atas py-1">
                                        <a href="/dashboard/produk/{{ $mu->slug }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    </div>
                                            <div class="atas py-1">
                                                <a href="/dashboard/produk/{{ $mu->slug }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>

                                            </div>
                                        
                                        
                                     
                                      <div class="atas py-1">
                                          <form action="/dashboard/produk/{{ $mu->slug }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger border-2" onclick="return confirm('Apakah Kamu Yakin?')"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                     
                                      </div>
                                      
                                 
                                    
                                  
                                
                                </td>
                            </tbody> 
                            @endforeach
                        </table>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    

</div>



@endsection