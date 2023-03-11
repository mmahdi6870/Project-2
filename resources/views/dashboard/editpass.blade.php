@extends('template.Dashmain')
@section('container')
<div class="container-fluid">
      
    <div class="card shadow text-dark mb-4 px-4 py-4" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-8">
            @if (session()->has('nosuccess'))
            <div class="row ">
             <div class="col-lg-12">
                <div class="alert alert-danger alert-dismissible  fade show mt-2" role="alert">
                     {{ session('nosuccess') }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
             </div>
            </div>
               @endif
            <form action="/dashboard/ubahpass/{{ auth()->user()->iduser }}" method="POST">
              @method('PUT')
              @csrf
                <div class="mb-3">
                  <label for="passwordlama" class="form-label">Password Lama</label>
                  <input type="password" class="form-control @error('passwordlama') is-invalid @enderror" id="passwordlama" aria-describedby="emailHelp" " name="passwordlama">
                  @error('passwordlama')
                  <div  class="invalid-feedback mb-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
           
                <div class="mb-3">
                  <label for="password" class="form-label">Password Baru</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" aria-describedby="emailHelp" " name="password">
                  @error('password')
                  <div  class="invalid-feedback mb-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="password2" class="form-label">Konfirmasi Password Baru</label>
                  <input type="password" class="form-control @error('password2') is-invalid @enderror" id="password2" aria-describedby="emailHelp"  name="password2">
                  @error('password2')
                  <div  class="invalid-feedback mb-2">
                      {{ $message }}
                    </div>
                    @enderror
                    <div class="form-check form-switch ml-4 pt-2    ">
                        <input class="form-check-input " type="checkbox" role="switch" id="flexSwitchCheckDefault" onclick="myFunction2()">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Lihat Password</label>
                      </div>
                </div>
                
                <button type="submit" class="btn btn-success">Ubah Password</button>
              </form>
             
          </div>
        </div>
    </div>
</div>
<script>
	function myFunction2() {
		   var x = document.getElementById("password");
           var y = document.getElementById("password2");
           var z = document.getElementById("passwordlama");
		   if (x.type === "password") {
			   x.type = "text";
               y.type = "text";
               z.type = "text";
		   } else {
			   x.type = "password";
               y.type = "password";
               z.type = "password";
		   }
	   }
</script>

@endsection