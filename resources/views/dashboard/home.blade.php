@extends('master')

@section('content')
<div class="container-fluid" style="margin-top:3%;">
   <div class="row">
       <div class="col-md-6 col-md-offset-3">
           <div class="panel panel-default" style="background-color:#FBFBFB;padding-top:3%;padding-bottom:3%;">
               <div class="panel-heading" style="background-color:#FBFBFB; font-size:20px;text-align:center;">Dashboard</div>

               <div class="panel-body" tyle="background-color:#FBFBFB;margin: 0 auto;">
                   You are logged in!
                   @if (Auth::check())
                   Logged in as
                   <strong>{{Auth::user()->email}}</strong>
                   @endif
                   @role('admin')
                   Selamat bekerja, <strong> Admin!</strong>
                   @endrole

                   @role('dokter')
                   Selamat bekerja, <strong> Dokter!</strong>
                   @endrole

                   @role('super.user')
                   Selamat bekerja, <strong> Super User!</strong>
                   @endrole

               </div>
           </div>
       </div>
   </div>
</div>
@endsection
