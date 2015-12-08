@extends('master')

@section('content')
<div class="container">
  <div class="well well-md">
    <h5>Tambah Pasien ke Poli</h5>
    <form class="form-horizontal" role="form" method="GET">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <div class="row">
           <div class="input-field col s12">
             <input id="id_pasien" type="text" class="validate" name="id_pasien" value="{{ $pasienid }}" readonly>
             <label for="id_pasien">ID Pasien</label>
           </div>
         </div>

         <div class="row">
           <div class="input-field col s12">
         <select name="pilih_bpjs" id="pilih_bpjs">
           <option value="Ya">Ya</option>
           <option value="Tidak">Tidak</option>
         </select>
         <label for="pilih_bpjs">Gunakan BPJS?</label>
          </div>
        </div>

         <div class="row">
           <div class="input-field col s12">
             <input id="id_bpjs" type="text" class="validate" name="id_bpjs" value="{{ $bpjsid }}" readonly>
             <label for="id_bpjs">ID BPJS</label>
           </div>
         </div>

         <div class="row">
           <div class="input-field col s12">
         <select class="form-control" name="pilih_poli" id="pilih_poli">
           @foreach($poli as $po)
            <option value="{{$po->nama_poli}}">{{$po->nama_poli}}</option>
            @endforeach
         </select>

          </div>
          <label for="pilih_poli">Poli</label>
        </div>


    </form>

  </div>
</div>
@endsection
