@extends('template.Dashmain')

@section('container')


    
<div class="d-flex container-fluid flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah Data {{ $judul }}</h1>
</div>

<div class="container-fluid">
    <div class="col-lg-7">
<div class="card shadow py-4">
    <div class="row">
        <div class="col-lg-7 ">
            <div class="container">
                <form method="POST" action="/dashboard/{{ $api }}/{{ $category->slug }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label ">Nama {{ $judul }}</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="title" name="name" autofocus value="{{ old('name', $category->name) }}">
                      @error('name')
                      <div class="invalid-feedback mb-2">
                        {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="slug" class="form-label">Nama {{ $judul }}</label>
                      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"  readonly value="{{ old('slug', $category->slug) }}">
                      @error('slug')
                      <div class="invalid-feedback mb-2">
                        {{ $message }}
                        </div>
                      @enderror
                    </div>
                  
            
            @if ($judul == "Merek")
                
            @else
                 <div class="mb-3">
                      <label for="image" class="form-label">produk Image</label>
                      @if($category->image)
                      <img src="/assets/img/{{ $category->image }}" class="img-preview img-fluid mb-3 col-sm-5 d-block " alt="">   
                      @else
                      <img class="img-preview img-fluid mb-3 col-sm-5" alt="">   
                      @endif
                      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="PreviewImage()">
                      @error('image')
                      <div class="invalid-feedback mb-2">
                        {{ $message }}
                        </div>
                      @enderror
                    </div>
            @endif
                    <button type="submit" class="btn btn-primary mb-4">Update {{ $judul }}</button>
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