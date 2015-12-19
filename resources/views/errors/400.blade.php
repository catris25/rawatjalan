@extends('master')
@section('title','Home')

@section('content')
    <div class="boxerror">
        <div class="beup">
        	>_<
        </div>
        <div class="bedown">
        	<h1>Error 400 - Bad Request</h1>
        	<h2>Maaf, sepertinya anda tidak memiliki autentifikasi yang jelas</h2>
        	<h2>Silahkan kembali ke <a href="{{URL::to('/')}}">sini</a> </h2>
        </div>
    </div>

@endsection
