@extends('master')
@section('content')

<form>
<select id="pilih_poli">
	<option>jjj</option>
	<option>qqq</option>
</select>
<select id="pilih_dokter">
	<option>aaa</option>
</select>
</form>

<script>
$(document).ready(function() {
    $(document).on('change','#pilih_poli',function() {
    	window.alert('hey');
        $("#pilih_dokter").append($("<option></option>").val(3).html("Three"));
    });
});
</script>
@endsection
