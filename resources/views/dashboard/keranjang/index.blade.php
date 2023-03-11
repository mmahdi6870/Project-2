@extends('template.dashmain')
@section('container')
<div class="container-fluid">
    <h4 class="text-center">Daftar Pesanan</h4>
    @if (session()->has('success'))
    <div class="row justify-content-center">
     <div class="col-lg-10">
        <div class="alert alert-success alert-dismissible fade text-center show mt-2" role="alert">
         {{ session('success') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
     </div>
    </div>   
   @endif
    @if (session()->has('danger'))
    <div class="row justify-content-center">
     <div class="col-lg-10">
        <div class="alert alert-danger alert-dismissible fade text-center show mt-2" role="alert">
         {{ session('danger') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
     </div>
    </div>   
   @endif
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card shadow">
    <div class="card-body ">
        <h5>Nama Pemesan : {{ auth()->user()->nama }}</h5>
        <div class="row pb-2">
          <div class="col-lg-10">
            <p class="text-capitalize">Alamat : {{ auth()->user()->alamat }}</p>
          </div>
          <div class="col-lg-2">
              <a href="/dashboard/alamat" class="btn btn-primary text-end">Perbarui Alamat</a>
          </div>
        </div>
        
       
        <table class="table table-bordered border-primary table-responsive-sm">
            <thead class="table-dark text-center">
              <tr>
                <th  scope="col">Aksi</th>
                <th  scope="col">#</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga Satuan</th>
                <th  scope="col">Jumlah Pesanan</th>
                <th  scope="col">Jumlah Harga</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                @foreach ($pembelian as $item)
                <th  scope="row">
                  <form action="/dashboard/keranjang/hapus/{{ $item->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Apakah Kamu Yakin?')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                  </th>
                <th  scope="row">{{ $loop->iteration }}</th>
                <td><a class="text-decoration-none" href="/dashboard/produk/{{ $item->produk[0]->slug }}">{{ $item->produk[0]->title}}</a></td>
                <td>@currency( $item->produk[0]->harga) </td>
                <td >{{ $item->jumlah }}</td>
                <td >  @currency($item->total)</td>
              </tr>
              @endforeach
            </tbody>
            <tfoot class="text-center">
              <th colspan="2"># </th>
              <th  colspan="3">Total Harga: </th>
              <th>@currency($total)</th>
            </tfoot>
           
            
          </table>
      <form action="/dashboard/keranjang/pembayaran/{{ auth()->user()->id }}" method="Post">
        @csrf
        <input type="hidden" name="totals" value="{{ $total }}">
        <button type="submit" class="btn btn-success">CheckOut</button>
      </form>
    </div>
  </div>
      </div>
    </div>
    
</div>
@endsection