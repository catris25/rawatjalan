@extends('master')

@section('content')
<div class="container-fluid" style="margin-top:3%;">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default" style="background-color:#FBFBFB;padding-top:3%;padding-bottom:3%;">
				<div class="panel-heading" style="background-color:#FBFBFB; font-size:20px;text-align:center;">Login</div>
				<div class="panel-body" style="background-color:#FBFBFB;margin: 0 auto;">
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
					<h5>Form Login</h5>
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="row">
							<div class="input-field col s12">
								<input id="email" type="email" class="validate" name="email" value="{{ old('email') }}">
								<label for="email">E-Mail Address</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<input id="password" type="password" class="validate" name="password">
								<label for="password">Password</label>
							</div>
						</div>

						<div class="row" style="margin-top:-5%;margin-bottom:10%;">
							<div class="input-field col s12">
								<input id="remember" type="checkbox" name="remember" />
								<label for="remember">Remember Me</label>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Login</button>

								<!-- <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a> -->
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
