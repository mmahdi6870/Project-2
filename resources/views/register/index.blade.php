@extends('template.main2')
@section('container')
<style>
  body{
  background-size: 200%;
    animation: gradient-animation 8s infinite alternate;
    padding-bottom: 80px;
}
@keyframes gradient-animation {
    0%{
        background-position: left;
    }
    100%{
        background-position: right;
    }
} 
  @media (min-width: 992px) { 
    .card-body{
      height: 57rem ; 
      width: 30rem;
     
    }
    .card-register{
    background-position: -150PX;
   background-repeat: no-repeat;
   background-size: cover;
 }
 .form-label{
  font-weight: bold!important;
 }
    .tombol{
    margin-top: 40px;
    width: 450px;
    border-radius: 50rem;
    background-color: black!important;
    color: white;
    font-family: Poppins;
    font-weight: 700;
    letter-spacing: 3px;
 }
   }
  .card-body{
      z-index:4;
    }

    @media (max-width: 767.98px) { 
      .card-register{
        width: 400px;
      }
      .form-label{
  font-weight: bold!important;
 }
      .tombol{
    margin-top: 40px;
    width: 370px;
    border-radius: 50rem;
    background-color: black!important;
    color: white;
    font-family: Poppins;
    font-weight: 700;
    letter-spacing: 3px;
 }
 .card-register{
    background-position: -154PX;
   background-repeat: no-repeat;
   background-size: 700px;
 }
     }
</style>
<div class="container d-flex justify-content-center mt-4">
    <div class="row gx-0">
        <div class="col-lg-12" data-aos="fade-up">
            <div class="card card-register" style="background-image:url('assets/img/login.jpg');" >
                <div class="card-body "  >
                  <h5 class="card-title title  text-center" >Daftar</h5>
                  @if (session()->has('nosuccess'))
                 <div class="row">
                  <div class="col-lg-12">
                     <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                      {{ session('nosuccess') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  </div>
                 </div>   
                @endif
                  <form action="/register/store" method="POST">
                    @csrf
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama Pengguna</label>
                    <input type="text" class="form-control melengkung @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" >
                    @error('nama')
                    <div  class="invalid-feedback mb-2">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="mb-3">
                    <label for="nohp" class="form-label">Nomor Handphone</label>
                    <input type="number" class="form-control melengkung  @error('nohp') is-invalid @enderror" id="nohp" name="nohp" value="{{ old('nohp') }}">
                    @error('nohp')
                    <div  class="invalid-feedback mb-2">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" class="form-control melengkung  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <div  class="invalid-feedback mb-2">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  
                  <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select class="form-select form-select-lg melengkung mb-3" name="gender" id="gender " aria-label=".form-select-lg example">
  <option selected disabled></option>
  <option value="0">Laki-Laki</option>
  <option value="1">Perempuan</option>
</select>

                    @error('password')
                    <div  class="invalid-feedback mb-2">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control melengkung @error('password') is-invalid @enderror" name="password" id="password">
                    @error('password')
                    <div  class="invalid-feedback mb-2">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="mb-3">
                    <label for="password2" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control melengkung  @error('password2') is-invalid @enderror" name="password2" id="password2">
                    @error('password2')
                    <div  class="invalid-feedback mb-2">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-check form-switch ml-4">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" onclick="myFunction3()">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Show Password</label>
                  </div>
                  <button type="submit" class="btn  tombol">Daftar</button>
                </form>     
                   <p style="padding-top:60px;" class="bawah">Sudah memiliki akun? <a class="text-decoration-none" style="color: red" href="/login">Masuk sekarang</a></p>  
                </div>
              </div>            
        </div>
    </div>

</div> 
<script>
    function myFunction3() {
           var x = document.getElementById("password");
           var y = document.getElementById("password2");
           if (x.type === "password") {
               x.type = "text";
           } else {
               x.type = "password";
           }
           if (y.type === "password") {
               y.type = "text";
           } else {
               y.type = "password";
           }
       }
</script>
@endsection