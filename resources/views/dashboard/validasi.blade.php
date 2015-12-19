@extends('master')

@section('content')
<div class="container-fluid" style="margin-top:2%;">
   <div class="row">
     <div class="validasi">
       <p>Record Rekam Medik Pasien {{$temp->id.'-'.$temp->id_dokter.'-'.$temp->kode_visit}} </p>
     </div> 
     <p style="text-align:center;margin-top:1%;">Permintaan pengubahan record rekam medik oleh {{$temp->id_admin}}</p>
     <div class="validtab">
     <table class="table table-striped table-bordered">
        <thead>
            </div>
          <tr>
            <td style="text-align:center;">Nama kolom</td>
            <td style="text-align:center;">Data Lama</td>
            <td style="text-align:center;">Data Baru</td>
          </tr>
          </thead>
          <tr><td>ID</td> <td>{{$rm->id}}</td> <td>{{$temp->id}}</td></tr>
          <tr><td>Kode visit</td> <td>{{$rm->kode_visit}}</td> <td>{{$temp->kode_visit}}</td></tr>
          <tr><td>Dokter</td> <td>{{$rm->id_dokter}}</td> <td>{{$temp->id_dokter}}</td></tr>
          <tr><td>Usia berobat</td> <td>{{$rm->usia_berobat}}</td> <td>{{$temp->usia_berobat}}</td></tr>
          <tr><td>Tanggal visit</td> <td>{{$rm->tgl_visit}}</td> <td>{{$temp->tgl_visit}}</td></tr>
          <tr><td>Tinggi badan</td><td>{{$rm->tinggi_badan}}</td><td>{{$temp->tinggi_badan}}</td></tr>
          <tr><td>Berat badan</td><td>{{$rm->berat_badan}}</td><td>{{$temp->berat_badan}}</td></tr>
          <tr><td>Tekanan darah</td><td>{{$rm->tekanan_darah}}</td><td>{{$temp->tekanan_darah}}</td></tr>
          <tr><td>Resep</td><td>{{$rm->resep}}</td><td>{{$temp->resep}}</td></tr>
          <tr><td>Anamnesis</td><td>{{$rm->anamnesis}}</td><td>{{$temp->anamnesis}}</td></tr>
          <tr><td>Diagnosis</td><td>{{$rm->diagnosis}}</td><td>{{$temp->diagnosis}}</td></tr>
          <tr><td>Tindakan</td><td>{{$rm->tindakan}}</td><td>{{$temp->tindakan}}</td></tr>
      </table>
      </div>
      <div class="validtab">
        <p>Apakah Anda menerima pengubahan ini?</p>
        <form class="form-horizontal" role="form" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="submit" class="btn btn-info" name="terima" value="Terima">
          <input type="submit" class="btn btn-warning" name="tolak" value="Tolak">
        </form>
      </div>
   </div>
</div>

@endsection
