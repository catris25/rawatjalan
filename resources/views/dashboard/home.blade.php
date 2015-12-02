@extends('master')

@section('content')
<div class="container-fluid" style="margin-top:3%;">
   <div class="row">
       <div class="col-md-6 col-md-offset-3">
           <div class="panel panel-default" style="background-color:#FBFBFB;padding-top:3%;padding-bottom:3%;">
               <div class="panel-heading" style="background-color:#FBFBFB; font-size:20px;text-align:center;">Dashboard</div>


               <div class="panel-body" tyle="background-color:#FBFBFB;margin: 0 auto;">
                   You are logged in!

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
                   @if(isset($pasien))
                   <div class="well well-lg">
                     <h5>Pasien</h5>
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

                    @endif
                    @if(isset($bpjs))
                    <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <td>ID</td>
                        <td>Nama</td>
                        <td>Jenis kelamin</td>
                        <td>Tanggal lahir</td>
                        <td>NIK</td>
                        <td>Kelas rawat</td>
                        <td>Status Premi</td>
                      </tr>
                    </thead>
                    @foreach($bpjs as $b)
                    <tr>
                    <td>{{$b->id}}</a></td>
                    <td>{{$b->nama}}</td>
                    
                    <td>{{$b->jenis_kelamin}}</td>
                    <td>{{$b->tgl_lahir}}</td>
                    <td>{{$b->nik}}</td>
                    <td>{{$b->kelas_rawat}}</td>
                    <td>@if ($b->status_premi===1)
                        aktif
                        @else
                        tidak aktif
                        @endif</td>
                    </tr>
                    @endforeach
                    </tbody>
                   </div>
                   @endif

                   @if (isset($bpjs) and isset($pasien))
                    {{$info}}
                   @endif

                   @endrole

               </div>
           </div>
       </div>
   </div>
</div>
@endsection
