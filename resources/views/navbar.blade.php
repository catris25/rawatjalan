<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Sistem Rawat Jalan</a>
        </div>

        <!-- Navbar Right -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pasien <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="pasien/tambah">Tambah pasien</a></li>
                        <li><a href="pasien">Lihat pasien</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dokter <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="auth/drregister">Tambah dokter</a></li>
                        <li><a href="auth/login">Lihat dokter</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="auth/register">Tambah admin</a></li>
                        <li><a href="auth/login">Lihat admin</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Rekam Medik <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="auth/register">Tambah rekam medik</a></li>
                        <li><a href="auth/login">Lihat rekam medik</a></li>
                    </ul>
                </li>
                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">User <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="auth/register">Register</a></li>
                        <li><a href="auth/login">Login</a></li>
                    </ul>
                </li> -->
                @if (Auth::guest())
      						<li><a href="{{ url('/') }}">Login</a></li>
      					@else
      						<!-- <li class="dropdown">
      							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
      							<ul class="dropdown-menu" role="menu"> -->
      								<li><a href="{{ url('/logout') }}">Logout</a></li>
      							<!-- </ul>
      						</li> -->
      					@endif
            </ul>
        </div>
    </div>
</nav>
