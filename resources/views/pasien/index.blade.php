@extends('master')

@section('content')
<div class="container">
   <div class="well well-lg">
     <h1>Daftar Pasien</h1>

     @if(Session::has('message'))
     <div class="alert alert-success">
       {{Session::get('message')}}
     </div>
     @endif

     <div class="well well-lg">
       @foreach($pasien as $p)
       ID : {{$p->id}}
       Nama : {{$p->nama_pasien}}
       Tanggal lahir : {{$p->tgl_lahir}}
       Alamat : {{$p->alamat}}
       Golongan Darah : {{$p->gol_darah}}
       @endforeach
   </div>
 </div>

 @endsection
