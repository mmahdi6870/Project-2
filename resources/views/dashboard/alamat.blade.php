@extends('template.dashmain')
@section('container')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card shadow">
      <div class="card-body ">
          <h5>Tambah Alamat</h5>
          <hr>
          <div class="row pb-2 justify-content-center">
            <div class="col-lg-10">
             <form action="/dashboard/alamat/store">
              
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" >
                  </div>
                 
                    <button type="submit" class="btn btn-primary mt-3 text-end ">Selesai</button>
             </form>
            </div>
          </div>
      </div>
          </div>
        </div>
    </div>
</div>



@endsection