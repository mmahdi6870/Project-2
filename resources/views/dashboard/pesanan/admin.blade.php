@extends('template.dashmain')

@section('container')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if (session()->has('success'))
                <div class="row justify-content-center">
                 <div class="col-lg-8">
                    <div class="alert alert-success alert-dismissible fade text-center show mt-2" role="alert">
                     {{ session('success') }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
                 </div>
                </div>   
               @endif
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="text-center text-uppercase">Pesanan Pelanggan</h5>
                    </div>
                    <div class="card-body bg-dark" >
                        <div class="table-responsive">
                        <table class="table text-white text-center  border-warning">
                            <thead>
                              <tr>
                                
                                <th scope="col" colspan="2">#</th>
                                <th scope="col">Kode Pesanan</th>
                                <th scope="col">Tanggal pesanan</th>
                                <th scope="col">Dibayar</th>
                                <th scope="col">Dikirim</th>
                                <th scope="col">Aksi</th>   
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $pes)
                                <tr>
                                    <td>
                                        <form action="/dashboard/bukti/delete/{{ $pes->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger border-2" onclick="return confirm('Apakah Kamu Yakin?')"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                    </td>
                                    <th scope="row">{{ $loop->iteration}}</th>
                                    <td>{{ $pes->redem }}</td>
                                    <td>{{ $pes->created_at }}</td>
                                    @if ($pes->bayar === 0)
                                        <td class="text-danger">Menunggu Konfirmasi Penjual</td>
                                    @else
                                    <td class="text-success">Sudah Dibayar</td>
                                    @endif
                                    @if ($pes->dikirim === 0)
                                    <td class="text-danger">Menunggu Pengiriman Penjual</td>
                                    @else
                                    <td class="text-success">Sudah Dikirim</td>
                                    @endif
                                    <td>
                                        <div class="row gx-0">
                                            <div class="col-lg-4 ">
                                                <a href="/bukti/{{ $pes->id }}" class="btn btn-outline-warning"><i class="bi bi-pencil-square"></i></a>
                                                
                                            </div>
                                            <style>
                                                @media (max-width: 991.98px) { 
                                                    .harus{
                                                        padding-top:10px; 
                                                        padding-bottom:10px; 
                                                    }
                                                 }
                                            </style>
                                            <div class="col-lg-4 harus">
                                                <form action="/dashboard/dibayar/{{ $pes->id }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="btn btn-outline-success"><i class="bi bi-cash-stack"></i></button>
                                                </form>

                                            </div>
                                            <div class="col-lg-4">
                                                <form action="/dashboard/dikirim/{{ $pes->id }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="btn btn-outline-info"><i class="bi bi-truck"></i></button>
                                                </form>

                                            </div>
                                        </div>
                                        

                                    </td>
                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection