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
            <div class="card-body">
                <div class="card mb-3" >
                    <div class="row g-0">
                      <div class="col-md-6 mt-2 text-center">
                        
                                     
                    @if (auth()->user()->is_admin === 1)
                    <form action="/download/{{ $pesanan->id }}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <div class="mb-3">
                      <label for="image" class="form-label ">Bukti Pembayaran</label>
                      @if($pesanan->bukti->image )
                      <img src="/assets/img/bukti/{{ $pesanan->bukti->image }}" class="img-preview img-fluid mb-3  d-block " alt="">   
                      @else
                      <img class="img-preview img-fluid mb-3 col-sm-5" alt="">   
                      @endif
                <div class="row">
                    <div class="col-lg-8 ml-2">
                      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="PreviewImage()">
                      @error('image')
                         <div class="invalid-feedback mb-2">
                           {{ $message }}
                           </div>
                           @enderror
                  </div>
                         <div class="col-lg-2">
                             <button type="submit" class="btn btn-primary">Download</button>
                         </div>
                        </form>
                    @else
                    <form action="/dashboard/addbukti/{{ $pesanan->id }}" method="POST" enctype="multipart/form-data">
                      <div class="mb-3">
                        <label for="image" class="form-label ">Bukti Pembayaran</label>
                        @if($pesanan->bukti->image)
                        <img src="/assets/img/bukti/{{ $pesanan->bukti->image }}" class="img-preview img-fluid mb-3  d-block " alt="">   
                        @else
                        <img class="img-preview img-fluid mb-3 col-sm-5" alt="">   
                        @endif
                  <div class="row">
                    <div class="col-lg-8 ml-2">
                      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="PreviewImage()">
                      @error('image')
                      <div class="invalid-feedback mb-2">
                        {{ $message }}
                        </div>
                        @enderror
                  </div>
                    <div class="col-lg-2">
                            @csrf
                             <button type="submit" class="btn btn-primary">Masukan</button>
                             
                            </div>
                          </form>
                        
                    @endif
                  </div>
                      </div>
                      </div>
                      <div class="col-md-6">
                        <div class="card-body">
                            
                          <h5 class="card-title"> Nama Pembeli: {{ $pesanan->user->nama }}</h5>
                          <h5 class="card-title"> No Resi: {{ $pesanan->redem }}</h5>
                          <p>Alamat : {{ $pesanan->user->alamat }}</p>
                          <p class="card-text">Total Pembelian : @currency($pesanan->total) </p>
                          <p class="card-text"><small class="text-muted">Tanggal Pemesanan : {{ $pesanan->created_at }}</small></p>
                        </div>

                        
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>  
</div>



<script>
    function PreviewImage(){
const image = document.querySelector('#image');
const imgPreview = document.querySelector('.img-preview');
imgPreview.style.display = 'block';
const oFReader = new FileReader();
oFReader.readAsDataURL(image.files[0]);
oFReader.onload = function(oFREvent){
  imgPreview.src = oFREvent.target.result;
}

}

</script>

@endsection