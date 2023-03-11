@extends('template.Dashmain')

@section('container')

    
<div class=" flex-wrap flex-md-nowrap align-items-center pt-3 pl-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambahkan Produk Baru</h1>
</div>
<div class="container-fluid">
    <div class="col-lg-7">
<div class="card shadow py-4">
    <div class="row">
        <div class="col-lg-7 ">
            <div class="container">
                <form method="POST" action="/dashboard/produk" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="title" class="form-label ">Nama Produk</label>
                      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" autofocus value="{{ old('title') }}">
                      @error('title')
                      <div class="invalid-feedback mb-2">
                        {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="slug" class="form-label">Nama Produk</label>
                      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"  readonly value="{{ old('slug') }}">
                      @error('slug')
                      <div class="invalid-feedback mb-2">
                        {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="harga" class="form-label">Harga Produk</label>
                      <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga"  value="{{ old('harga') }}">
                      @error('harga')
                      <div class="invalid-feedback mb-2">
                        {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="category" class="form-label">Kategori</label>
                      <select class="form-select" name="category_id">
                        <option  selected disabled></option>
                        @foreach ($category as $cate)
                        @if (old('category_id')== $cate->id)
                        <option value="{{ $cate->id }}" selected>{{ $cate->name }}</option>
                        @else
                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                        @endif           
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="merek" class="form-label">Merek</label>
                      <select class="form-select" name="merek_id">
                      <option  selected disabled></option>
                        @foreach ($mereks as $cate)
                        @if (old('mereky_id')== $cate->id)
                        <option value="{{ $cate->id }}" selected>{{ $cate->name }}</option>
                        @else
                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                        @endif           
                        @endforeach
                      </select>
                    </div>
            
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
            
                    <div class="mb-3">
                      <label for="deskripsi" class="form-label">Deskripsi</label>
                      <input class="@error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}" id="deskripsi" type="hidden" name="deskripsi">
                      <trix-editor input="deskripsi"></trix-editor>
                    </div>
                    @error('deskripsi')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    
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
