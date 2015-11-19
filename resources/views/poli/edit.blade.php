@extends ('master')
@section ('content')
<div class="container">
  <div class="well well-lg">

    <h2>Form Data Poli {{$poli->id}}</h2>
     <ul>
      @foreach($errors->all()as $error)
      <li class="alert alert-danger">{{$error}} </li>
      @endforeach
    </ul>

    @if(Session::has('edit_message'))
    <div class="alert alert-success">
      {{Session::get('edit_message')}}
    </div>
    @endif

    <div class="col-md-6">
      <form class="form-horizontal" role="form" method="POST">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">

           <div class="form-group">
             <label class="col-md-4 control-label">Nama poli</label>
             <div class="col-md-6">
               <input type="text" class="form-control" name="nama_poli" value="{{ $poli->nama_poli }}">
             </div>
           </div>

           <div class="form-group">
             <label class="col-md-4 control-label">Deskripsi</label>
             <div class="col-md-6">
               <input type="text" class="form-control" name="deskripsi" value="{{ $poli->deskripsi }}">
             </div>
           </div>

           <div class="form-group">
           <div class="col-md-6 col-md-offset-4">
             <button type="submit" class="btn btn-primary">
               Submit
             </button>
           </div>
         </div>
         </form>
    </div>

  </div>
</div>
@endsection
