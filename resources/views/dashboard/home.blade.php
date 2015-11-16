@extends('app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-10 col-md-offset-1">
           <div class="panel panel-default">
               <div class="panel-heading">Dashboard</div>

               <div class="panel-body">
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
