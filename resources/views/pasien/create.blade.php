@extends('master')

@section('content')
<div class="container">
   <div class="well well-lg">

     <h1>Tambah Pasien</h1>
      <ul>
       @foreach($errors->all()as $error)
       <li class="alert alert-danger">{{$error}} </li>
       @endforeach
     </ul>

     <div class="col-md-6">
       <div class="col-md-6">
       {!!Form::open(array(
         'url'=> '/pasien/tambah',
         'method' => 'POST',
         ))!!}



         {!!Form::label('nama_pasien', 'Nama lengkap :')!!}
         {!!Form::text('nama_pasien', null, ['class'=>'form-control'])!!}

         {!!Form::label('tgl_lahir', 'Tanggal lahir :')!!}
         {!!Form::text('tgl_lahir', null, ['class'=>'form-control'])!!}

         {!!Form::label('alamat', 'Alamat :')!!}
         {!!Form::text('alamat', null, ['class'=>'form-control'])!!}

         {!!Form::label('telepon', 'Nomor Telepon :')!!}
         {!!Form::text('telepon', null, ['class'=>'form-control'])!!}

         {!!Form::label('gol_darah', 'Golongan darah :')!!}
         {!!Form::text('gol_darah', null, ['class'=>'form-control'])!!}

         {!!Form::label('alergi', 'Alergi :')!!}
         {!!Form::text('alergi', null, ['class'=>'form-control'])!!}

         {!!Form::label('riwayat_penyakit', 'Riwayat penyakit :')!!}
         {!!Form::text('riwayat_penyakit', null, ['class'=>'form-control'])!!}


       </div>

         {!!Form::submit()!!}
         {!!Form::close()!!}

     </div>

   </div>
</div>

@endsection
