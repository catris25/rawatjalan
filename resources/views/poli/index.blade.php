@extends('master')

@section('content')
<div class="container">
   <div class="well well-lg">

      <ul>
       @foreach($errors->all()as $error)
       <li class="alert alert-danger">{{$error}} </li>
       @endforeach
     </ul>

     <h2>Daftar Poli</h2>
     <div class="well well-lg">
     <table class="table table-striped table-bordered">
       <thead>
         <tr>
           <td>ID</td>
           <td>Nama</td>
           <td>Deskripsi</td>
         </tr>
       </thead>
     @foreach($poli as $p)
     <tr>
       <td><a href="{{URL::to('poli/'.$p->id)}}"> {{$p->id}}</a></td>
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
