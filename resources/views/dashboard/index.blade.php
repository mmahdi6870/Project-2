@extends('template.Dashmain')
@section('container')
    
<div class="container-fluid">
   <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-capitalize">Selamat Datang,  {{ auth()->user()->nama }}</h6>
    </div>
    <div class="card-body">
                                   @if (session()->has('success'))
                                   <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                       <div class="alert alert-success alert-dismissible text-center fade show mt-2" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                   </div>
                                      @endif
                                    @if (session()->has('loginError'))
                                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                            {{ session('loginError') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                      @endif
        <div class="row gx-0 justify-content-center">
            <div class="col-lg-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <style>
                          @media (min-width: 992px) { 

                          .gambars{
                            margin-top: 30px;
                            margin-left: 20px;
                          }
                          
                          }
                        </style>
                        @if(auth()->user()->gender === 1)
                        <img src="/sb/img/girl.png" class="img-fluid gambars rounded-start " alt="...">
                        @else
                        <img src="/sb/img/man.png" class="img-fluid gambars rounded-start " alt="...">
                        @endif
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <p class="card-title">Nama: {{ auth()->user()->nama }}</p>
                          <p class="card-title">No HP: {{ auth()->user()->nohp }}</p>
                          @if(auth()->user()->gender === 1)
                          <p class="card-title">Jenis Kelamin: Perempuan</p>
                          @else
                          <p class="card-title">Jenis Kelamin: Laki-Laki</p>
                          @endif
                          <p class="card-text">Email: {{ auth()->user()->email }}</p>
                          @if (auth()->user()->is_admin == 1) 
                                 <p class="card-text">Status: Admin</p>
                              @else
                                <p class="card-text">Status: Pembeli</p>       
                          @endif
                          <p class="card-text"><small class="text-primary">Bergabung {{ auth()->user()->created_at->diffForHumans() }}</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-6">
                <a href="/edit" class="btn btn-warning">Ubah Profil</a>
                <a href="/editpass" class="btn btn-info">Ubah Password</a>
            </div>
        </div>
       
</div> 
</div>
</div>

@endsection