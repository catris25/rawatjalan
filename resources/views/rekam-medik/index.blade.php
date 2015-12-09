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
           <form class="form-horizontal" role="form" method="GET">
             <div class="form-group">

               <select name="kategori" id="kategori">
                 <option value="id">ID Rekam Medik</option>
                 <option value="id_pasien">ID Pasien</option>
                 <option value="anamnesis">Anamnesis</option>
                 <option value="diagnosis">Diagnosis</option>
                 <option value="resep">Resep</option>
               </select>

               <input id="keyword" type="text" placeholder="Masukkan kata kunci" name="keyword" value="{{ old('keyword') }}">
               <button type="submit" class="btn btn-primary">
                 Cari rekam medik
               </button>
           </form>

         </div>
       <table class="table table-striped table-bordered">
         <thead>
             </div>
           <tr>
             <td>ID</td>
             <td>Pasien</td>
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
         <td><a href="{{URL::to('rekam-medik/'.$rm->id)}}"> {{$p->id}}</a></td>
         <td>{{$rm->id_pasien}}</td>
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
