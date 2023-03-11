@extends('template.dashmain')
@section('container')
    
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
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
             <div class="card border-dark">
        <div class="card-body">
            <div class="card-header">
              <h4 class="text-center text-uppercase">pembayaran</h4>  
            </div>
          <div class="row mt-2">
            <div class="col-lg-6">
             <p>Nama: {{ $user->nama }}</p>
             <p>Nama: {{ $user->alamat }}</p>
             <p>No Hp: {{ $user->nohp }}</p>
            </div>
            <div class="col-lg-6">
                <p>Tanggal Pesanan : {{ $waktu }}</p>   
                <p>Harga Pesanan : @currency ($total)</p> 
            </div>
          </div>
          <hr>
          <p class="text-mute text-capitalize">Note: Setelah melakukan pembayaran segera masukan bukti pembayaran<br> pada input bukti pembayaran agar pesanan segera diproses, Terimaka Kasih <i class="bi bi-hand-thumbs-up"></i></p>
          <hr>
          <div class="row justify-content-center">
            <div class="col-lg-12">
                     <h5 class="text-center">DANA</h5>  
                        <a class="d-block text-center" href="https://link.dana.id/qr/8nswr7j"><img src="/assets/img/qr/Forever19.id.png"  style="width:100px;"  alt=""></a>
            </div>
          </div>
   

        </div>
        <form action="/dashboard/bukti/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="totals" value="{{ $total }}">
            <div class="card-footer bg-dark">
                  <div class="row justify-content-center">
              <div class="col-lg-2">
                  <button type="submit" class="btn btn-danger" style="width: 95px;">Selesai</button>
              </div>
            </div>
            </div>
        
          
    </form>
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