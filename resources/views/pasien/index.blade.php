@extends('master')

@section('content')
<div class="container">
   <div class="well well-lg">

     @if(Session::has('message'))
     <div class="alert alert-success">
       {{Session::get('message')}}
     </div>
     @endif

       <h2>Daftar Pasien</h2>
       <div class="well well-lg">

         <div class="well well-lg">
           <h5>Cari Pasien</h5>
           <form class="form-horizontal" role="form" method="GET">
             <div class="form-group">

               <select name="kategori" id="kategori">
                 <option value="id">ID Pasien</option>
                 <option value="nama_pasien">Nama</option>
                 <option value="nik">NIK</option>
                 <option value="alamat">Alamat</option>
                 <option value="alergi">Alergi</option>
               </select>

               <input id="keyword" type="text" placeholder="Masukkan kata kunci" name="keyword" value="{{ old('keyword') }}">
               <button type="submit" class="btn btn-primary">
                 Cari pasien
               </button>

             </div>

           </form>

         </div>
       <table class="table table-striped table-bordered">
         <thead>
           <tr>
             <td>ID</td>
             <td>Nama</td>
             <td>NIK</td>
             <td>Jenis kelamin</td>
             <td>Tanggal lahir</td>
             <td>Alamat</td>
             <td>No Telepon</td>
             <td>Gol darah</td>
             <td>Alergi</td>
             <td>Riwayat penyakit</td>
           </tr>
         </thead>
       @foreach($pasien as $p)
       <tr>
         <td><a href="{{URL::to('pasien/'.$p->id)}}"> {{$p->id}}</a></td>
         <td>{{$p->nama_pasien}}</td>
         <td>{{$p->nik}}</td>
         <td>{{$p->jenis_kelamin}}</td>
         <td>{{$p->tgl_lahir}}</td>
         <td>{{$p->alamat}}</td>
         <td>{{$p->telepon}}</td>
         <td>{{$p->gol_darah}}</td>
         <td>{{$p->alergi}}</td>
         <td>{{$p->riwayat_penyakit}}</td>
       </tr>
       @endforeach
     </tbody>
   </table>
   </div>
 </div>

 @endsection
