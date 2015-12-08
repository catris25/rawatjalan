@extends('master')

@section('content')
<div class="container-fluid" style="margin-top:1%;">
   <div class="row">
     @if (Auth::check())
     <p style="text-align: center; font-size:20px;margin-top:1%;">Logged in as
     <strong>{{Auth::user()->email}}</strong></p>
     @endif

     @role('admin')
     <p style="text-align:center; font-size:14px;">Selamat bekerja, <strong> Admin!</strong></p>
     @endrole

     @role('dokter')
     <p style="text-align:center; font-size:14px;">Selamat bekerja, <strong> Dokter!</strong></p>
     @endrole

     @role('super.user')
     <p style="text-align:center; font-size:14px;">Selamat bekerja, <strong> Super User!</strong></p>
   </div>
 </div>
 @endsection
