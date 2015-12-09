@extends ('master')
@section ('content')
<div class="container-fluid" style="margin-top:1%;">
  <div class="row">
  <div class="col-md-6 col-md-offset-3" style="padding-top:3%;padding-bottom:3%;">
  <div class="panel panel-default" style="background-color:#FBFBFB;margin: 0 auto;">
  <div class="panel-heading" style="background-color:#FBFBFB; font-size:30px;text-align:center;">Data Record Rekam Medik</div>
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
               <input id="id" type="text" class="validate" name="id" value="{{ $rekamMedik->kode_visit }}" readonly>
               <label for="id">Pasien</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="kode_visit" type="text" class="validate" name="kode_visit" value="{{ $rekamMedik->kode_visit }}" readonly>
               <label for="kode_visit">Kode Visit</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="usia_berobat" type="text" class="validate" name="usia_berobat" value="{{ $rekamMedik->usia_berobat }}">
               <label for="usia_berobat">Usia berobat</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="tgl_visit" type="date" class="datepicker" name="tgl_visit" value="{{ $rekamMedik->tgl_visit }}">
               <label for="tgl_visit">Tanggal visit</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="tinggi_badan" type="number" class="validate" name="tinggi_badan" value="{{ $rekamMedik->tinggi_badan }}">
               <label for="tinggi_badan">Tinggi badan (cm)</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="berat_badan" type="number" class="validate" name="berat_badan" value="{{ $rekamMedik->berat_badan }}">
               <label for="berat_badan">Berat badan (kg)</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="tekanan_darah" type="text" class="validate" name="tekanan_darah" value="{{ $rekamMedik->tekanan_darah }}">
               <label for="tekanan_darah">Tekanan darah (mmHg)</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="resep" type="text" class="validate" name="resep" value="{{ $rekamMedik->resep }}">
               <label for="resep">Resep</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="anamnesis" type="text" class="validate" name="anamnesis" value="{{ $rekamMedik->anamnesis }}">
               <label for="anamnesis">Anamnesis</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="diagnosis" type="text" class="validate" name="diagnosis" value="{{ $rekamMedik->diagnosis }}">
               <label for="diagnosis">Diagnosis</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <input id="tindakan" type="text" class="validate" name="tindakan" value="{{ $rekamMedik->tindakan }}">
               <label for="tindakan">Tindakan</label>
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
