@extends('master')

@section('content')
<div class="container-fluid" style="margin-top:1%;">
   <div class="row">

      <div class="boxx" style="margin-bottom:3%;">
        <h1 style="text-align:center">Daftar Poli</h1>
      </div>

      <ul>
       @foreach($errors->all()as $error)
       <li class="alert alert-danger">{{$error}} </li>
       @endforeach
      </ul>

     
     <div class="row">
       <table class="table table-striped table-bordered" style="width:60%; margin: 0px auto;">
         <thead>
           <tr>
             <td style="text-align:center;vertical-align:middle;">Id</td>
             <td style="text-align:center;vertical-align:middle;">Nama</td>
             <td style="text-align:center;vertical-align:middle;">Deskripsi</td>
           </tr>
         </thead>
         <tbody>
          @foreach($poli as $p)
            <tr>
              <td style="text-align:center;vertical-align:middle;"><a href="{{URL::to('poli/'.$p->id)}}"> {{$p->id}}</a></td>
              <td>{{$p->nama_poli}}</td>
              <td>{{$p->deskripsi}}</td>
            </tr>
          @endforeach
         </tbody>
       </table>
     </div>
   </div>
</div>

@endsection
