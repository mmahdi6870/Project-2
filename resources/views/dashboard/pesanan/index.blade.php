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
                      <div class="card shadow border-info">
                        <div class="card-header">
                            <h4 class="text-center text-uppercase">Daftar Pesanan {{ auth()->user()->nama }}</h4>
                        </div>
                        <div class="table-responsive">
                        <table class="table  text-center">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">cek Barang</th>
                                <th scope="col">Kode Pesanan</th>
                                <th scope="col">Tanggal pesanan</th>
                                <th scope="col">Dibayar</th>
                                <th scope="col">Dikirim</th>                                                    
                                <th scope="col">Aksi</th>
                                <th scope="col">Bukti Pembayaran</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $pes)
                                <tr>
                                    <th scope="row">{{ $loop->iteration}}</th>
                                    <td>
                                    <form action="/dashboard/cekbrg/{{ $pes->id }}" method="POST">
                                      @csrf
                                    <button type="submit" class="btn btn-success disabled "><i class="bi bi-search"></i></button>  
                                    </form> 
                                    </td>
                                    <td>{{ $pes->redem }}</td>
                                    <td>{{ $pes->created_at }}</td>
                                    @if ($pes->bayar == 0)
                                        <td class="text-danger">Menunggu Konfirmasi Penjual</td>
                                    @else
                                    <td class="text-success">Sudah Dibayar</td>
                                    @endif
                                    @if ($pes->dikirim == 0)
                                    <td class="text-danger">Menunggu Pengiriman Penjual</td>
                                    @else
                                    <td class="text-success">Sudah Dikirim</td>
                                    @endif
                                    <td>
                                      <form action="/dashboard/bukti/delete/{{ $pes->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-danger border-2" onclick="return confirm('Apakah Kamu Yakin?')">Batalkan Pesanan</button>
                                        </form>
                                    </td>
                                    <td>
                                      <a href="/bukti/{{ $pes->id }}" class="btn btn-outline-warning">Bukti pembayaran</a>
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
 

@endsection