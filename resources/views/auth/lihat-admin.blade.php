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
        <h1 style="text-align:center;">Daftar Admin</h1>
      </div>

         <div class="row" style="width:70%; margin:0 auto; margin-top:3%;margin-bottom:3%;">
           <h5>Cari Dokter</h5>
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
                    <option value="id">ID Admin</option>
                    <option value="nama_admin">Nama</option>
                    <option value="nik">NIK</option>
                  </select>
                </div>
               </div>
               <div class="boxfindright">
                <button type="submit" class="btn btn-primary">
                  Cari admin
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
                 <td style="text-align:center;vertical-align:middle;">E-mail</td>
               </tr>
             </thead>
           <tbody>
           @foreach($admin as $d)
           <tr>
             <td><a href="{{URL::to('admin/'.$d->id)}}"> {{$d->id}}</a></td>
             <td>{{$d->nama_admin}}</td>
             <td>{{$d->nik}}</td>
             <td>{{$d->jenis_kelamin}}</td>
             <td>{{$d->tanggal_lahir}}</td>
             <td>{{$d->alamat}}</td>
             <td>{{$d->telepon}}</td>
             <td>{{$d->email}}</td>
           </tr>
           @endforeach
           </tbody>
         </table>
      </div>
    </div>
</div>
@endsection
