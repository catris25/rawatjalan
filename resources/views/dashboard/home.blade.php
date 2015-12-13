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

       @role('dokter')
       <p style="text-align:center; font-size:14px;">Selamat bekerja, <strong> Dokter!</strong></p>
       <div class="container">
       @if(Session::has('message'))
       <div class="alert alert-info">
         {{Session::get('message')}}

       </div>
       @endif
       @if(isset($temp))
         <div class="well well-lg">
           <table class="table table-striped table-bordered">
             <thead>
                 </div>
               <tr>
                 <td>Pasien</td>
                 <td>Kode visit</td>
                 <td>Usia berobat</td>
                 <td>Tanggal</td>
                 <td>Tinggi badan</td>
                 <td>Berat badan</td>
                 <td>Tekanan darah</td>
                 <td>Dokter</td>
                 <td>Resep</td>
                 <td>Anamnesis</td>
                 <td>Diagnosis</td>
                 <td>Tindakan</td>
               </tr>
             </thead>
           @foreach($temp as $t)
           <tr>
             <td>{{$t->id}}</td>
             <td>{{$t->kode_visit}}</td>
             <td>{{$t->usia_berobat}}</td>
             <td>{{$t->tgl_visit}}</td>
             <td>{{$t->tinggi_badan}}</td>
             <td>{{$t->berat_badan}}</td>
             <td>{{$t->tekanan_darah}}</td>
             <td>{{$t->id_dokter}}</td>
             <td>{{$t->resep}}</td>
             <td>{{$t->anamnesis}}</td>
             <td>{{$t->diagnosis}}</td>
             <td>{{$t->tindakan}}</td>
           </tr>
           @endforeach
         </tbody>
       </table>
        </div>
       @endif

      </div>
       @endrole


       @role('super.user')
       <p style="text-align:center; font-size:14px;">Selamat bekerja, <strong> Super User!</strong></p>
       @endrole

       @role('admin')
       <p style="text-align:center; font-size:14px;">Selamat bekerja, <strong> Admin!</strong></p>
       @endrole

       @role('super.user|admin')
       <div class="container-fluid" style="width:80%;margin:auto; margin-top:3%;margin-bottom:3%;">

         <h5 style="text-align:center;">Pendaftaran pasien ke poli (Cek BPJS)</h5>

         <form class="form-horizontal" role="form" method="GET" >
             <div class="splitt" style="margin-left:2%;">
                <div class="splitpt input-field">

                  <input id="id_pasien" type="text" class="validate" name="id_pasien" @if(isset($pasien)) value="{{$pasienid}}" @endif>
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
@endsection
