@extends('master')

@section('content')
<div class="container-fluid" style="margin-top:1%;">
   <div class="row">

    <div class="boxx">
      <h1 style="text-align:center;">Dashboard</h1>
    </div>

       @if (Auth::check())
       <p style="text-align: center; font-size:20px;margin-top:1%;">Logged in as
       <strong>{{Auth::user()->email}}</strong></p>
       @endif

       <div class="container">

       <!-- == SUPERUSER ROLE == -->
       @role('super.user')
       <p style="text-align:center; font-size:14px;">Selamat bekerja, <strong> Super User!</strong></p>
       @endrole

       <!-- == ADMIN ROLE == -->
       @role('admin')
       <p style="text-align:center; font-size:14px;">Selamat bekerja, <strong> Admin!</strong></p>
       @endrole

       <!-- == SUPERUSER ROLE == -->
       @role('dokter')
       <p style="text-align:center; font-size:14px;">Selamat bekerja, <strong> Dokter!</strong></p>
       @endrole

       <!-- NOTIFICATION FOR ADMIN AND DOKTER ROLE -->
       @role('admin|dokter')
       @if(isset($temp))
        <div class="alert alert-warning">
          <strong>Peringatan!</strong> Anda memiliki notifikasi baru!
        </div>
        @else
        <div class="alert alert-info">
          <strong>Info!</strong> Anda tidak memiliki notifikasi baru!
        </div>
       @endif
       @endrole

       <!-- == DOKTER ROLE == -->
        @role('dokter')
        @if(isset($temp))
            <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <td style="text-align:center;">Harap segera melakukan validasi terhadap pengubahan data Rekam Medik berikut.</td>
              </tr>
            </thead>
            <tbody>
            @foreach($temp as $t)
              <tr>
                <td><a href="{{URL::to('dashboard/validasi/'.$t->id.'-'.$t->id_dokter.'-'.$t->kode_visit)}}">
                Data Pasien {{$t->id.'-'.$t->id_dokter.'-'.$t->kode_visit}} </a></td>
              </tr>
           @endforeach
           </tbody>
           </table>
        @endif

        @endrole


        <!-- == ADMIN ROLE == -->
        @role('admin')
        @if(isset($temp))
            <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <td style="text-align:center;">Permintaan pengubahan record rekam medik berikut ditolak</td>
              </tr>
            </thead>
            <tbody>
            @foreach($temp as $t)
              <tr>
                <td><a href="{{URL::to('rekam-medik/'.$t->id.'-'.$t->id_dokter.'-'.$t->kode_visit)}}">
                Data Rekam Medik {{$t->id.'-'.$t->id_dokter.'-'.$t->kode_visit}} </a></td>
              </tr>
           @endforeach
           </tbody>
           </table>
        @endif
        @endrole


       <!-- == SUPERUSER OR ADMIN ROLE == -->
       @role('super.user|admin')
       <div class="container-fluid" style="width:100%;margin:auto; margin-top:3%;margin-bottom:3%;">


         <h5 style="text-align:center;">Pendaftaran pasien ke poli (Cek BPJS)</h5>

         <form class="form-horizontal" role="form" method="GET" >
             <div class="splitt" style="margin-left:2%;">
                <div class="splitpt input-field">

                  <input id="id_pasien" type="text" class="validate" name="id_pasien" @if(isset($pasien)) value="{{$pasienid}}" @endif required>
                  <label for="id_pasien">Masukkan Id Pasien</label>
                </div>
                <div class="splitpt input-field" style="margin-left:6%;">
                  <input id="id_bpjs" class="validate" type="text" name="id_bpjs" @if(isset($bpjs)) value="{{$bpjsid}}" @endif>
                  <label for="id_bpjs">Masukkan Id BPJS</label>
                </div>
             </div>
           <div class="form-group">
            <div class="col-md-6 col-md-offset-5" style="margin-top:1%;">
              <button type="submit" class="btn btn-primary" name="action">
                Cek pasien
              </button>
            </div>
           </div>
           </form>
       </div>
       @if (isset($bpjs) and isset($pasien)or empty($bpjs) and isset($pasien))
       <div class="boxcek" style="border-bottom:1px solid;">
        <h3>Hasil</h3>
       </div>
       @endif
       <div class="boxcek" style="margin-bottom:3%;">
        @if (isset($bpjs) and isset($pasien) or empty($bpjs) and isset($pasien))
          {{$info}}
          @if($tambah)
          <a href="{{URL::to('dashboard/tambah-ke-poli')}}">
            Tambahkan ke poli
          </a>
          @endif
        @endif
       </div>

       @endrole
       </div>
   </div>
</div>
@endsection
