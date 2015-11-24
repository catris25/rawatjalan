@extends('master')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-10 col-md-offset-1">
           <div class="panel panel-default">
               <div class="panel-heading">Dashboard</div>

               <div class="panel-body">
                   <p>You are logged in!
                   @if (Auth::check())
                   Logged in as
                   <strong>{{Auth::user()->email}}</strong></p>
                   @endif
                   @role('admin')
                   <p>Selamat bekerja, <strong> Admin!</strong></p>
                   @endrole

                   @role('dokter')
                   <p>Selamat bekerja, <strong> Dokter!</strong></p>
                   @endrole

                   @role('super.user')
                   <p>Selamat bekerja, <strong> Super User!</strong></p>
                   <div class="well well-lg">
                     <h5>Pendaftaran pasien ke poli</h5>
                     <form class="form-horizontal" role="form" method="GET">
                       <div class="well well-md">
                         <h6>Cari pasien</h6>
                         <input id="id_pasien" type="text" placeholder="Masukkan id pasien" name="id_pasien">
                       </div>
                       <div class="well well-md">
                         <h6>Cek BPJS</h6>
                         <input id="id_bpjs" type="text" placeholder="Masukkan id BPJS" name="id_bpjs">
                       </div>
                       <button type="submit" class="btn btn-primary">
                         Cek pasien
                       </button>
                     </form>
                   </div>
                   @endrole

               </div>
           </div>
       </div>
   </div>
</div>
@endsection
