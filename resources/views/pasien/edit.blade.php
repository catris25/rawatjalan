@extends ('master')
@section ('content')
<div class="container-fluid" style="margin-top:1%;">
  <div class="row">
  <div class="col-md-6 col-md-offset-3" style="padding-top:3%;padding-bottom:3%;">
  <div class="panel panel-default" style="background-color:#FBFBFB;margin: 0 auto;">
  <div class="panel-heading" style="background-color:#FBFBFB; font-size:30px;text-align:center;">Form Data Pasien {{$pasien->id}}</div>
    <div class="panel-body">
     <ul>
      @foreach($errors->all()as $error)
      <li class="alert alert-danger">{{$error}} </li>
      @endforeach
    </ul>

    @if(Session::has('edit_message'))
    <div class="alert alert-success">
      {{Session::get('edit_message')}}
    </div>
    @endif

    <div class="col-md-8 col-md-offset-2">
    <div class="col-md-12">
      <form class="form-horizontal" role="form" method="POST">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">

           <div class="row">
             <div class="input-field col s12">
               <input id="nama_admin" type="text" class="validate" name="nama_pasien" value="{{ $pasien->nama_pasien }}">
               <label for="nama_admin">Nama</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
             <select id="jenis_kelamin" name="jenis_kelamin">
               <option value="L">Laki-laki</option>
               <option value="P">Perempuan</option>
             </select>
             <label class="jenis_kelamin">Jenis kelamin</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="tgl_lahir" type="date" class="datepicker" name="tgl_lahir" value="{{ $pasien->tgl_lahir }}">
               <label for="tgl_lahir">Tanggal lahir</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col 12">
               <input id="alamat" type="text" class="validate" name="alamat" value="{{ $pasien->alamat }}">
               <label for="alamat">Alamat</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="telepon" type="tel" class="validate" name="telepon" value="{{ $pasien->telepon }}">
               <label for="telepon">Nomor telepon</label>
             </div>
           </div>

           <div class="row">
            <div class="input-field col s12">
             <select id="gol_darah" name="gol_darah">
               <option value="">Tidak tahu</option>
               <option value="A">A</option>
               <option value="B">B</option>
               <option value="AB">AB</option>
               <option value="O">O</option>
             </select>
             <label for="gol_darah">Golongan darah</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="alergi" type="text" class="validate" name="alergi" value="{{ $pasien->alergi }}">
               <label for="alergi">Alergi</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="riwayat_penyakit" type="text" class="validate" name="riwayat_penyakit" value="{{ $pasien->riwayat_penyakit }}">
               <label for="riwayat_penyakit">Riwayat penyakit</label>
             </div>
           </div>

           <div class="form-group">
           <div class="col-md-6 col-md-offset-4">
             <button type="submit" class="btn waves-effect waves-light" name="action">
               Submit
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
