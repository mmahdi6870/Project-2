@extends('template.Dashmain')

@section('container')

    
<div class=" flex-wrap flex-md-nowrap align-items-center pt-3 pl-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambahkan {{ $judul }} Baru</h1>
</div>
@if (session()->has('success'))
<div class="row ml-4">
 <div class="col-lg-7">
    <div class="alert alert-danger text-center alert-dismissible fade show mt-2" role="alert">
     {{ session('success') }}
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
 </div>
</div>   
@endif
<div class="container-fluid">
    <div class="col-lg-7">
<div class="card shadow py-4">
    <div class="row">
        <div class="col-lg-7 ">
            <div class="container">
                <form method="POST" action="/dashboard/{{ $api }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label ">Nama {{ $judul }}</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="title" name="name" autofocus value="{{ old('name') }}">
                      @error('name')
                      <div class="invalid-feedback mb-2">
                        {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="slug" class="form-label">Nama {{ $judul }}</label>
                      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"  readonly value="{{ old('slug') }}">
                      @error('slug')
                      <div class="invalid-feedback mb-2">
                        {{ $message }}
                        </div>
                      @enderror
                    </div>
                   
                    @if ($judul === 'Merek')
                       
                            
                        @else
                            <div class="mb-3">
                      <label for="image" class="form-label">Post Image -> Min height:1600</label>
                      <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
                      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="PreviewImage()">
                      @error('image')
                      <div class="invalid-feedback mb-2">
                        {{ $message }}
                        </div>
                      @enderror
                    </div>
                      
                    @endif
            
                    <button type="submit" class="btn btn-primary mb-4 mt-3 tombol">Selesai</button>
                  </form>
            </div>
            
        </div>
    </div>
    
        
</div>
</div>
</div>

<script>
const title = document.querySelector('#title');    
const slug = document.querySelector('#slug');    

title.addEventListener('change', function(){
    fetch('/dashboard/checkSlug?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
});

document.addEventListener('trix-file-accept',function(e){
  e.preventDefault();
})

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
