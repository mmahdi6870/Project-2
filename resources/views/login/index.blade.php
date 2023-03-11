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
       height: 40rem ; 
       width:30rem; 
     
    }
    .bawah{
    font-size: 16px!important;
    padding-top: 110px;
    margin-left: 75px;
    font-family: Poppins;
    display: block;
 }

    .form-label{
  font-weight: bold!important;
 }
    .card-login{
    background-position: -72PX;
   background-repeat: no-repeat;
   background-size: cover;
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
      .card-login{
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
 .card-login{
    background-position: -104PX;
   background-repeat: no-repeat;
   background-size: cover;
 }
     }
</style>
<div class="container d-flex justify-content-center mt-4">
    <div class="row gx-0">
        <div class="col-lg-12 col-md-6" data-aos="fade-up">
            <div class="card card-login" style="background-image:url('assets/img/login.jpg'); " >
                <div class="card-body " >
                  <h5 class="card-title title  text-center" >Login</h5>
                  @if (session()->has('success'))
                 <div class="row">
                  <div class="col-lg-12">
                     <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                      {{ session('success') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  </div>
                 </div>   
                @endif
                  @if (session()->has('loginError'))
                 <div class="row">
                  <div class="col-lg-12">
                     <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                      {{ session('loginError') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  </div>
                 </div>   
                @endif
                  <form action="/login/check" method="POST">
                    @csrf
                  <div class="mb-3">
                    <label for="nama" class="form-label">Alamat Email / Nama Pengguna</label>
                    <input type="text" class="form-control melengkung @error('nama') is-invalid @enderror" id="nama" name="nama">
                    @error('nama')
                    <div  class="invalid-feedback mb-2">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control melengkung  @error('password') is-invalid @enderror" name="password" id="password">
                    @error('password')
                    <div  class="invalid-feedback mb-2">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-check form-switch ml-4">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" onclick="myFunction3()">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Show Password</label>
                  </div>
                  <button type="submit" class="btn  tombol">LOGIN</button>
                </form>     
                   <p class="bawah">Belum memiliki akun? <a class="text-decoration-none" style="color: red" href="/register">Daftar sekarang</a></p>  
                </div>
              </div>            
        </div>
    </div>

</div> 
<script>
    function myFunction3() {
           var x = document.getElementById("password");
           if (x.type === "password") {
               x.type = "text";
           } else {
               x.type = "password";
           }
       }
</script>


@endsection