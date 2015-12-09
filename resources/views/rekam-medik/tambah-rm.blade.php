@extends('master')

@section('content')
<div class="container-fluid" style="margin-top:1%;">
  <div class="row">
    <div class="col-md-6 col-md-offset-3" style="padding-top:3%;padding-bottom:3%;">
    <div class="panel panel-default" style="background-color:#FBFBFB;padding-top:3%;padding-bottom:3%;">
    <div class="panel-heading" style="background-color:#FBFBFB; font-size:30px;text-align:center;">Form Tambah Rekam Medik</div>
    <div class="panel-body">

      <ul>
       @foreach($errors->all()as $error)
       <li class="alert alert-danger">{{$error}} </li>
       @endforeach
     </ul>

       <div class="col-md-8 col-md-offset-2">
       <div class="col-md-12">
         <form class="form-horizontal" role="form" method="POST" action="{{ url('rekam-medik/tambah') }}">
  						<input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row">
  							<div class="input-field col s12">
  								<input id="id_pasien" type="text" class="validate" name="id_pasien" value="{{ old('id_pasien') }}">
                  <label for="id_pasien">ID Pasien</label>
  							</div>
  						</div>

              <div class="row">
                <div class="input-field col s12">
                  <input id="usia_berobat" type="text" class="validate" name="usia_berobat" value="{{ old('usia_berobat') }}">
                  <label for="usia_berobat">Usia</label>
                </div>
              </div>

              <div class="row">
  							<div class="input-field col s12">
  								<input id="tgl_berobat" type="date" class="datepicker" name="tgl_berobat" value="{{ old('tgl_berobat') }}">
                  <label for="tgl_berobat">Tanggal berobat</label>
  							</div>
  						</div>

              <div class="row">
  							<div class="input-field col s12">
  								<input id="tinggi_badan" type="number" class="validate" name="tinggi_badan" value="{{ old('tinggi_badan') }}">
                  <label for="tinggi_badan">Tinggi badan</label>
  							</div>
  						</div>

              <div class="row">
  							<div class="input-field col s12">
  								<input id="berat_badan" type="number" class="validate" name="berat_badan" value="{{ old('berat_badan') }}">
                  <label for="telepon">Nomor telepon</label>
  							</div>
  						</div>

              <div class="row">
  							<div class="input-field col s12">
  								<input id="tekanan_darah" type="text" class="validate" name="tekanan_darah" value="{{ old('tekanan_darah') }}">
                  <label for="alergi">Alergi</label>
  							</div>
  						</div>

              <div class="row">
  							<div class="input-field col s12">
  								<input id="resep" type="text" class="validate" name="resep" value="{{ old('resep') }}">
                  <label for="resep">Resep</label>
  							</div>
  						</div>

              <div class="row">
  							<div class="input-field col s12">
  								<input id="anamnesis" type="text" class="validate" name="anamnesis" value="{{ old('anamnesis') }}">
                  <label for="anamnesis">Anamnesis</label>
  							</div>
  						</div>

              <div class="row">
  							<div class="input-field col s12">
  								<input id="diagnosis" type="text" class="validate" name="diagnosis" value="{{ old('diagnosis') }}">
                  <label for="diagnosis">Diagnosis</label>
  							</div>
  						</div>

              <div class="row">
  							<div class="input-field col s12">
  								<input id="tindakan" type="text" class="validate" name="tindakan" value="{{ old('tindakan') }}">
                  <label for="tindakan">Tindakan</label>
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
