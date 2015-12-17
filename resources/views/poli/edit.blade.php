@extends ('master')
@section ('content')
<div class="container-fluid" style="margin-top:1%;">
  <div class="row">

  <div class="col-md-6 col-md-offset-3" style="padding-top:3%;padding-bottom:3%;">
  <div class="panel panel-default" style="background-color:#FBFBFB;margin: 0 auto;">
  <div class="panel-heading" style="background-color:#FBFBFB; font-size:30px;text-align:center;">Form Data Poli {{$poli->id}}</div>
    <div class="panel-body">
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

    <div class="col-md-8 col-md-offset-2">
    <div class="col-md-12">
      <form class="form-horizontal" role="form" method="POST">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">

           <div class="row">
             <div class="input-field col s12">
               <input id="nama_poli" type="text" class="form-control" name="nama_poli" value="{{ $poli->nama_poli }}">
               <label for="nama_poli">Nama poli*</label>
             </div>
           </div>

           <div class="row">
             <div class="input-field col s12">
               <textarea id="deskripsi" class="validate materialize-textarea" name="deskripsi" value="{{ $poli->deskripsi }}">{{ $poli->deskripsi }}</textarea>
               <label for="deskripsi">Deskripsi*</label>
             </div>
           </div>

           <div class="form-group">
           <div class="col-md-6 col-md-offset-4">
             <button type="submit" class="btn waves-effect waves-light" name="action">
               Submit
             </button>
           </div>
         </div>
         </form>
    </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
@endsection
