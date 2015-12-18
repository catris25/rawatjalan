@extends('master')

@section('content')
<div class="container-fluid" style="margin-top:1%;">
   <div class="row">

     @if(Session::has('message'))
     <div class="alert alert-success">
       {{Session::get('message')}}
     </div>
     @endif

       <div class="boxx" style="margin-bottom:3%;">
        <h1 style="text-align:center;">Daftar Rekam Medik</h1>
      </div>

        <div class="row" style="width:70%; margin:0 auto; margin-top:3%;margin-bottom:3%;">
           <h5>Cari Rekam Medik</h5>
           <form class="form-horizontal" role="form" method="GET">
           <div class="boxesrm">

              <div class="boxrm">
                <div class="input-field">
 								<input id="id" type="text" placeholder="Id pasien" class="validate" name="id" value="{{ old('id') }}">
 							  </div>
              </div>

            <div class="boxrm">
              <div class="input-field">
               <input id="id_dokter" placeholder="Id dokter" type="text" class="validate" name="id_dokter" value="{{ old('id_dokter') }}">
              </div>
            </div>

           <div class="boxrm">
             <div class="input-field">
              <input id="kode_visit" type="text" placeholder="Kode visit" class="validate" name="kode_visit" value="{{ old('kode_visit') }}">
            </div>
          </div>
          
          <div class="boxrm">
               <button type="submit" class="btn btn-primary" style="margin-left:10%;" name="cari" value="cari">
                  Cari pasien
                </button>
          </div>
          </div>
           </form>
          
        </div>

       <table class="table table-striped table-bordered">
         <thead>

           <tr>
             <td style="text-align:center;vertical-align:middle;">Record</td>
             <td style="text-align:center;vertical-align:middle;">Pasien</td>
             <td style="text-align:center;vertical-align:middle;">Dokter</td>
             <td style="text-align:center;vertical-align:middle;">Kode visit</td>
             <td style="text-align:center;vertical-align:middle;">Usia berobat</td>
             <td style="text-align:center;vertical-align:middle;">Tanggal</td>
             <td style="text-align:center;vertical-align:middle;">Tinggi badan</td>
             <td style="text-align:center;vertical-align:middle;">Berat badan</td>
             <td style="text-align:center;vertical-align:middle;">Tekanan darah</td>
             <td style="text-align:center;vertical-align:middle;">Resep</td>
             <td style="text-align:center;vertical-align:middle;">Anamnesis</td>
             <td style="text-align:center;vertical-align:middle;">Diagnosis</td>
             <td style="text-align:center;vertical-align:middle;">Tindakan</td>
           </tr>
         </thead>
        <tbody>
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

 @endsection
