@extends ('master')
@section ('content')
<div class="container-fluid" style="margin-top:1%;">
  <div class="row">
  <div class="col-md-6 col-md-offset-3" style="padding-top:3%;padding-bottom:3%;">
  <div class="panel panel-default" style="background-color:#FBFBFB;margin: 0 auto;">
  <div class="panel-heading" style="background-color:#FBFBFB; font-size:30px;text-align:center;">Form Data Dokter {{$dokter->id}}</div>
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
               <input id="nama_admin" type="text" class="validate" name="nama_dokter" value="{{ $dokter->nama_dokter }}">
               <label for="nama_admin">Nama</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="nik" type="text" class="validate" name="nik" value="{{ $dokter->nik }}">
               <label for="nik">NIK</label>
             </div>
           </div>



           <div class="row">
             <div class="input-field col s12">
             <select id="jenis_kelamin" name="jenis_kelamin">
               <option value="L" @if ($dokter->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
               <option value="P"  @if ($dokter->jenis_kelamin == 'P') selected @endif>Perempuan</option>
             </select>
             <label class="jenis_kelamin">Jenis kelamin</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="tgl_lahir" type="date" class="datepicker" name="tgl_lahir" value="{{ $dokter->tanggal_lahir }}">
               <label for="tgl_lahir">Tanggal lahir</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="alamat" type="text" class="validate" name="alamat" value="{{ $dokter->alamat }}">
               <label for="alamat">Alamat</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="telepon" type="tel" class="validate" name="telepon" value="{{ $dokter->telepon }}">
               <label for="telepon">Nomor telepon</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="spesialisasi" type="tel" class="validate" name="spesialisasi" value="{{ $dokter->spesialisasi }}">
               <label for="spesialisasi">Spesialisasi</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="email" type="tel" class="validate" name="email" value="{{ $dokter->email }}">
               <label for="email">E-mail</label>
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
