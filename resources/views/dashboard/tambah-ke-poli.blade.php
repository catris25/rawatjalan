@extends('master')

@section('content')
<div class="container-fluid" style="margin-top:1%;">
  <div class="row">

    <div class="boxx" style="height:8%;">
        <h4 style="text-align:center;">Tambah Pasien ke Poli</h4>
    </div>

    <form class="form-horizontal" style="margin-top:3%;" role="form" method="POST" action="{{ url('dashboard/cetakpoli') }}">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <div class="col-md-6 col-md-offset-3">
         <div class="row">
           <div class="col-md-6 col-md-offset-3 input-field">
             <input id="id_pasien" type="text" class="validate" name="id_pasien" value="{{ $pasienid }}" readonly>
             <label for="id_pasien">ID Pasien</label>
           </div>
         </div>

         <div class="row">
           <div class="col-md-6 col-md-offset-3">
            <p>
              <input type="radio" id="usebpjs" name="optbpjs" value="1" @if(isset($bpjsid)) checked @endif @if(!isset($bpjsid)) disabled @endif/>
              <label for="usebpjs">Pasien BPJS</label>
            </p>
            <p>
              <input type="radio" id="nobpjs" name="optbpjs" value="0" @if(!isset($bpjsid)) checked @endif @if(isset($bpjsid)) disabled @endif/>
              <label for="nobpjs">Bukan Pasien BPJS</label>
            </p>
          </div>
        </div>


         <div class="row">
           <div class="input-field col-md-6 col-md-offset-3">
         <select name="pilih_poli" id="pilih_poli">
           @foreach($poli as $po)
            <option value="{{$po->id}}">{{$po->nama_poli}}</option>
            @endforeach
         </select>
         <label for="pilih_poli">Poli</label>
          </div>
        </div>

        <div class="row">
           <div class="input-field col-md-6 col-md-offset-3">
         <select name="pilih_dokter" id="pilih_dokter">
           
            <option value="null" disabled>---</option>
            
         </select>
         <label for="pilih_dokter">Dokter</label>
          </div>
        </div>  

        


        <div class="form-group row">
          <div class="col-md-offset-5" style="margin-top:1%;">
              <button type="submit" class="btn btn-primary" name="action" onclick="cetaks()">
                Cetak
              </button>
         </div>
        </div>
        </div>

    </form>

  </div>
</div>




<script>



//   $(document).ready(function() {
//     $(document).on('change','#pilih_poli',function() {
//       var $selectDropdown = 
//         $("#pilih_dokter")
//           .empty()
//           .html(' ');

//       // add new value
//       // var value = "some value";
//       // $selectDropdown.append(
//       //   $("<option></option>")
//       //     .attr("value",value)
//       //     .text(value)
//       // );

//       // trigger event
//       $selectDropdown.trigger('contentChanged');
//     });
    
//     $('select').on('contentChanged', function() {
//     // re-initialize (update)
//     $(this).material_select();
//   });
// });

$(document).ready(function() {
    
    $(document).on('change','#pilih_poli',function(){

        var $dokter = $("#pilih_dokter").empty().html(' ');
        $.getJSON("/rawatjalan/public/dashboard/dropdown/" + $("#pilih_poli").val(),function(data){
            $.each(data, function(index,element){
                 $dokter.append('<option value="'+element.id+'">'+element.nama_dokter+'</option>');
            });
            $dokter.trigger('contentChanged');
        });
        
    });

    $('select').on('contentChanged', function() {
      // re-initialize (update)
      $(this).material_select();
    });

});
</script>


@endsection
