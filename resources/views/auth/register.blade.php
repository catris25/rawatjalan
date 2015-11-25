@extends('master')

@section('content')
<div class="container-fluid" style="margin-top:1%;">
	<div class="row">
		<div class="col-md-6 col-md-offset-3" style="padding-top:3%;padding-bottom:3%;">
			<div class="panel panel-default" style="background-color:#FBFBFB;margin: 0 auto;">
				<div class="panel-heading" style="background-color:#FBFBFB; font-size:30px;text-align:center;">Register Admin</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<div class="col-md-8 col-md-offset-2">
					<div class="col-md-12">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="row">
							<div class="input-field col s12">
								<input id="nama_admin" type="text" class="validate" name="nama_admin" value="{{ old('nama_admin') }}">
								<label for="nama_admin">Nama</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<input id="NIK" type="text" class="validate" name="NIK" value="{{ old('NIK') }}">
								<label for="NIK">NIK</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<input id="alamat" type="text" class="validate" name="alamat" value="{{ old('alamat') }}">
								<label for="alamat">Alamat</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<input id="telepon" type="tel" class="validate" name="telepon" value="{{ old('telepon') }}">
								<label for="telepon">Nomor Telepon</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<input id="tanggal_lahir" type="date" class="datepicker" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
								<label for="tanggal_lahir">Tanggal Lahir</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<input id="email" type="email" class="validate" name="email" value="{{ old('email') }}">
								<label for="email">E-Mail</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<input id="password" type="password" class="validate" name="password">
								<label for="password">Password</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<input id="password_confirmation" type="password" class="validate" name="password_confirmation">
								<label for="password_confirmation">Confirm Password</label>
							</div>
						</div>

						<div class="form-group">
							<div style="display:table;margin: 0 auto;">
								<button class="btn waves-effect waves-light" type="submit" name="action">Register
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
