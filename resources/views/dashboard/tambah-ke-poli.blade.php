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
            <option value="{{$po->id}}">{{$po->id}}</option>
            @endforeach
         </select>
         <label for="pilih_poli">Poli</label>
          </div>
        </div>

        <div class="row">
           <div class="input-field col-md-6 col-md-offset-3">
         <select name="pilih_dokter" id="pilih_dokter">
           
            <option value=""></option>
            
         </select>
         <label for="pilih_dokter">Dokter</label>
          </div>
        </div>  

          <p id="hei">hEII</p>


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

$(document).ready(function() {

    $('#pilih_poli').on('change',function(e){
        console.log(e);

        window.alert('text');
        var select = $('#pilih_dokter');
        $("#pilih_dokter").append('<option>KHU</option>');
        // var x = '<option>aaa</option>';
        // $('select#pilih_dokter').append($x);
        //$('#pilih_dokter').empty();
       //$("pilih_dokter").append($("<option></option>").val(3).html("Three"));
       //window.alert($(#pilih_dokter).val('zzz'));
        //window.alert($("#pilih_dokter").val());
        
        // $.getJSON("/rawatjalan/public/dashboard/dropdown/" + $("#pilih_poli").val(),function(data){
        //     //window.alert($("#pilih_poli").val());
        //     //var dokter = $("#pilih_dokter");
        //     //dokter.empty();

        //     // var o = new Option(text,value);
        //     // $('#pilih_dokter').append($(o));

        //     //
        //     var x = '';

        //     $.each(data, function(index,element){
        //         //window.alert(element);
        //         $('#pilih_dokter').append($('<option>').text(element).attr('value', index));
        
        //         //x += '<option>aaa</option>';
        //         //$dokter.append('<option value="aa">aaa</option>');
        //         //$dokter.append('<option value="' + index +'">' + element + '</option>');
        //     });
        //     //$("#pilih_dokter").append(x);
        //     //$("#pilih_dokter").trigger("change");
        // });
    });

    });
</script>


@endsection
