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
        <h1 style="text-align:center;">Daftar Pasien</h1>
      </div>

         <div class="row" style="width:70%; margin:0 auto; margin-top:3%;margin-bottom:3%;">
            <h5>Cari Pasien</h5>
           <form class="form-horizontal" role="form" method="GET">
              <div class="boxcari">
              <div class="boxfindleft">
                <div class="input-field">
                  <input id="keyword" type="text" placeholder="Masukkan kata kunci" name="keyword" value="{{ old('keyword') }}">
                </div>
              </div>

              <div class="boxfindmiddle">
                <div class="input-field">
                  <select name="kategori" id="kategori" class="browser-default">
                    <option value="id">ID Pasien</option>
                    <option value="nama_pasien">Nama</option>
                    <option value="nik">NIK</option>
                    <option value="alamat">Alamat</option>
                    <option value="alergi">Alergi</option>
                  </select>
                </div>
               </div>
               <div class="boxfindright">
                <button type="submit" class="btn btn-primary">
                  Cari pasien
                </button>
               </div>
              </div>
           </form>
         </div>

       <div class="row" style="width:72%; margin:0 auto;">   
       <table class="table table-striped table-bordered">
         <thead>
           <tr>
             <td style="text-align:center;vertical-align:middle;">ID</td>
             <td style="text-align:center;vertical-align:middle;">Nama</td>
             <td style="text-align:center;vertical-align:middle;">NIK</td>
             <td style="text-align:center;vertical-align:middle;">Jenis kelamin</td>
             <td style="text-align:center;vertical-align:middle;">Tanggal lahir</td>
             <td style="text-align:center;vertical-align:middle;">Alamat</td>
             <td style="text-align:center;vertical-align:middle;">No Telepon</td>
             <td style="text-align:center;vertical-align:middle;">Gol darah</td>
             <td style="text-align:center;vertical-align:middle;">Alergi</td>
             <td style="text-align:center;vertical-align:middle;">Riwayat penyakit</td>
           </tr>
         </thead>
         <tbody>
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
 </div>

 @endsection
