@extends('template.Dashmain')

@section('container')
    
<div class="container-fluid">
      
    <h5>Halaman Ubah Profil</h5>
    <div class="card shadow text-dark mb-4 px-4 py-4" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-8">
            
            <form action="/dashboard/ubahdata" method="POST">
              @method('PUT')
              @csrf
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="username" aria-describedby="emailHelp" value="{{ auth()->user()->nama }}" name="nama">
                  @error('nama')
                  <div  class="invalid-feedback mb-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="nohp" class="form-label">No Hp</label>
                  <input type="integer" class="form-control @error('nohp') is-invalid @enderror" id="nohp" aria-describedby="emailHelp" value="{{ auth()->user()->nohp }}" name="nohp">
                  @error('nohp')
                  <div  class="invalid-feedback mb-2">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ auth()->user()->email }}" name="email">
                  @error('email')
                  <div  class="invalid-feedback mb-2">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Ubah Profil</button>
              </form>
             
          </div>
        </div>
    </div>
</div>
@endsection