@extends('master')

@section('content')
<div class="container-fluid" style="margin-top:1%;">
  <div class="row">
    <div class="col-md-6 col-md-offset-3" style="padding-top:3%;padding-bottom:3%;">
    <div class="panel panel-default" style="background-color:#FBFBFB;padding-top:3%;padding-bottom:3%;">
    <div class="panel-heading" style="background-color:#FBFBFB; font-size:30px;text-align:center;">Form Tambah Pasien</div>
    <div class="panel-body">

      <ul>
       @foreach($errors->all()as $error)
       <li class="alert alert-danger">{{$error}} </li>
       @endforeach
     </ul>

       <div class="col-md-8 col-md-offset-2" style="margin-top:1%;">
       <div class="col-md-12">
         <form class="form-horizontal" role="form" method="POST" action="{{ url('pasien/tambah') }}">
  						<input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row">
  							<div class="input-field col s12">
  								<input id="nama_pasien" type="text" class="validate" name="nama_pasien" value="{{ old('nama_pasien') }}">
                  <label for="nama_pasien">Nama*</label>
  							</div>
  						</div>

              <div class="row">
                <div class="input-field col s12">
                  <input id="nik" type="text" class="validate" name="nik" value="{{ old('nik') }}" pattern="\d*" minlength="16" maxlength="16">
                  <label for="nik">NIK*</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">

  							<select name="jenis_kelamin" id="jenis_kelamin">
                  <option value="" disabled selected>Masukkan jenis kelamin</option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
                <label for="jenis_kelamin">Jenis Kelamin*</label>
                </div>
  						</div>

              <div class="row">
  							<div class="input-field col s12">
  								<input id="tgl_lahir" type="date" class="datepicker" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                  <label for="tgl_lahir">Tanggal lahir*</label>
  							</div>
  						</div>

              <div class="row">
  							<div class="input-field col s12">
  								<input id="alamat" type="text" class="validate" name="alamat" value="{{ old('alamat') }}">
                  <label for="alamat">Alamat*</label>
  							</div>
  						</div>

              <div class="row">
  							<div class="input-field col s12">
  								<input id="telepon" type="tel" class="validate" name="telepon" value="{{ old('telepon') }}" pattern="\d*">
                  <label for="telepon">Nomor telepon</label>
  							</div>
  						</div>

              <div class="row">
                <div class="input-field col s12">
                  <select name="gol_darah" id="gol_darah">
                    <option value="" disabled selected>Pilih gol. darah</option>
                    <option value="">Tidak tahu</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                  </select>
                  <label for="gol_darah">Golongan darah*</label>
                </div>
  						</div>

              <div class="row">
  							<div class="input-field col s12">
  								<input id="alergi" type="text" class="validate" name="alergi" value="{{ old('alergi') }}">
                  <label for="alergi">Alergi</label>
  							</div>
  						</div>

              <div class="row">
  							<div class="input-field col s12">
  								<input id="riwayat_penyakit" type="text" class="validate" name="riwayat_penyakit" value="{{ old('riwayat_penyakit') }}">
                  <label for="riwayat_penyakit">Riwayat penyakit</label>
  							</div>
  						</div>

              <div class="form-group">
							<div class="col-md-6 col-md-offset-4">
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                </button>
							</div>
						</div>
            </form>

        </div>
      </div>
      </div>
      </div>
   </div>
   </div>
</div>

@endsection
