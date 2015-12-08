@extends('master')
@section('content')
<div class="container">
   <div class="well well-lg">

     @if(Session::has('message'))
     <div class="alert alert-success">
       {{Session::get('message')}}
     </div>
     @endif

       <h2>Daftar Admin</h2>
       <div class="well well-lg">
         <div class="well well-lg">
           <h5>Cari Admin</h5>
           <form class="form-horizontal" role="form" method="GET">
             <div class="form-group">

               <select name="kategori" id="kategori">
                 <option value="id">ID Admin</option>
                 <option value="nama_admin">Nama</option>
                 <option value="nik">NIK</option>
               </select>
               <input id="keyword" type="text" placeholder="Masukkan kata kunci" name="keyword" value="{{ old('keyword') }}">
               <button type="submit" class="btn btn-primary">
                 Cari admin
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
               <td>E-mail</td>
             </tr>
           </thead>
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
      </table>
      </div>
    </div>

    </tbody>
@endsection
