@extends('master')

@section('content')
<div class="container">
   <div class="well well-lg">

     <h2>Form Tambah Poli</h2>
      <ul>
       @foreach($errors->all()as $error)
       <li class="alert alert-danger">{{$error}} </li>
       @endforeach
     </ul>

       <div class="col-md-6">
         <form class="form-horizontal" role="form" method="POST" action="{{ url('poli/tambah') }}">
  						<input type="hidden" name="_token" value="{{ csrf_token() }}">

  						<div class="form-group">
  							<label class="col-md-4 control-label">Nama poli</label>
  							<div class="col-md-6">
  								<input type="text" class="form-control" name="nama_poli" value="{{ old('nama_poli') }}">
  							</div>
  						</div>

              <div class="form-group">
                <label class="col-md-4 control-label">Deskripsi poli</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="deskripsi" value="{{ old('deskripsi') }}">
                </div>
              </div>

              <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Submit
                </button>
              </div>
            </div>
          </form>
        </div>
    </div>
</div>

@endsection
