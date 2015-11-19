@extends('master')

@section('content')
<div class="container">
   <div class="well well-lg">

     <h2>Form Tambah Pasien</h2>
      <ul>
       @foreach($errors->all()as $error)
       <li class="alert alert-danger">{{$error}} </li>
       @endforeach
     </ul>

       <div class="col-md-6">
         <form class="form-horizontal" role="form" method="POST" action="{{ url('pasien/tambah') }}">
  						<input type="hidden" name="_token" value="{{ csrf_token() }}">

  						<div class="form-group">
  							<label class="col-md-4 control-label">Nama</label>
  							<div class="col-md-6">
  								<input type="text" class="form-control" name="nama_pasien" value="{{ old('nama_pasien') }}">
  							</div>
  						</div>

              <div class="form-group">
  							<label class="col-md-4 control-label">Jenis kelamin</label>
  							<select name="jenis_kelamin">
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
  						</div>

              <div class="form-group">
  							<label class="col-md-4 control-label">Tanggal lahir</label>
  							<div class="col-md-6">
  								<input type="date" class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
  							</div>
  						</div>

              <div class="form-group">
  							<label class="col-md-4 control-label">Alamat</label>
  							<div class="col-md-6">
  								<input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}">
  							</div>
  						</div>

              <div class="form-group">
  							<label class="col-md-4 control-label">Nomor telepon</label>
  							<div class="col-md-6">
  								<input type="number" class="form-control" name="telepon" value="{{ old('telepon') }}">
  							</div>
  						</div>

              <div class="form-group">
  							<label class="col-md-4 control-label">Golongan darah</label>
                <select name="gol_darah">
                  <option value="">Tidak tahu</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="AB">AB</option>
                  <option value="O">O</option>
                </select>
  						</div>

              <div class="form-group">
  							<label class="col-md-4 control-label">Alergi</label>
  							<div class="col-md-6">
  								<input type="text" class="form-control" name="alergi" value="{{ old('alergi') }}">
  							</div>
  						</div>

              <div class="form-group">
  							<label class="col-md-4 control-label">Riwayat penyakit</label>
  							<div class="col-md-6">
  								<input type="text" class="form-control" name="riwayat_penyakit" value="{{ old('riwayat_penyakit') }}">
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
