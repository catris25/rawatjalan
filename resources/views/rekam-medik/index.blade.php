@extends('master')

@section('content')
<div class="container">
   <div class="well well-lg">

     @if(Session::has('message'))
     <div class="alert alert-success">
       {{Session::get('message')}}
     </div>
     @endif

       <h2>Daftar Rekam Medik</h2>
       <div class="well well-lg">

         <div class="well well-lg">
           <h5>Cari Rekam Medik</h5>
           <p>Input ID Record Rekam Medik</p>
           <form class="form-horizontal" role="form" method="GET">

             <div class="form-group">
               <div class="input-field col s12">
 								<input id="id" type="text" class="validate" name="id" value="{{ old('id') }}">
 								<label for="id">ID Pasien</label>
 							</div>
            </div>

            <div class="form-group">
              <div class="input-field col s12">
               <input id="id_dokter" type="text" class="validate" name="id_dokter" value="{{ old('id_dokter') }}">
               <label for="id_dokter">ID Dokter</label>
             </div>
           </div>

           <div class="form-group">
             <div class="input-field col s12">
              <input id="kode_visit" type="text" class="validate" name="kode_visit" value="{{ old('kode_visit') }}">
              <label for="kode_visit">Kode Visit</label>
            </div>
          </div>
          
          <div class="form-group">
               <input type="submit" class="btn btn-primary" name="cari" value="cari">
          </div>

           </form>

         </div>

       <table class="table table-striped table-bordered">
         <thead>

           <tr>
             <td>Record</td>
             <td>Pasien</td>
             <td>Dokter</td>
             <td>Kode visit</td>
             <td>Usia berobat</td>
             <td>Tanggal</td>
             <td>Tinggi badan</td>
             <td>Berat badan</td>
             <td>Tekanan darah</td>
             <td>Resep</td>
             <td>Anamnesis</td>
             <td>Diagnosis</td>
             <td>Tindakan</td>
           </tr>
         </thead>
       @foreach($rekamMedik as $rm)
       <tr>
         <td><a href="{{URL::to('rekam-medik/'.$rm->id.'-'.$rm->id_dokter.'-'.$rm->kode_visit)}}">{{$rm->id.'-'.$rm->id_dokter.'-'.$rm->kode_visit}}</a>
         <td><a href="{{URL::to('pasien/'.$rm->id)}}">{{$rm->id}}</a></td>
         <td><a href="{{URL::to('dokter/'.$rm->id_dokter)}}">{{$rm->id_dokter}}</a></td>
         <td>{{$rm->kode_visit}}</td>
         <td>{{$rm->usia_berobat}}</td>
         <td>{{$rm->tgl_visit}}</td>
         <td>{{$rm->tinggi_badan}}</td>
         <td>{{$rm->berat_badan}}</td>
         <td>{{$rm->tekanan_darah}}</td>
         <td>{{$rm->resep}}</td>
         <td>{{$rm->anamnesis}}</td>
         <td>{{$rm->diagnosis}}</td>
         <td>{{$rm->tindakan}}</td>
       </tr>
       @endforeach
     </tbody>
   </table>
   </div>
 </div>
 </div>

 @endsection
