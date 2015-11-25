<ul id="dokter" class="dropdown-content">
  <li><a href="/rawatjalan/public/dokter">Lihat Dokter</a></li>
  <li class="divider"></li>
  <li><a href="/rawatjalan/public/dokter/tambah">Tambah Dokter</a></li>
</ul>

<ul id="mdokter" class="dropdown-content" style="width:100%;margin-left:-7%;">
  <li><a href="/rawatjalan/public/dokter">Lihat Dokter</a></li>
  <li class="divider"></li>
  <li><a href="/rawatjalan/public/dokter/tambah">Tambah Dokter</a></li>
</ul>

<ul id="admin" class="dropdown-content">
  <li><a href="/rawatjalan/public/admin">Lihat Admin</a></li>
  <li class="divider"></li>
  <li><a href="/rawatjalan/public/admin/tambah">Tambah Admin</a></li>
</ul>

<ul id="madmin" class="dropdown-content" style="width:100%;margin-left:-7%;">
  <li><a href="/rawatjalan/public/admin">Lihat Admin</a></li>
  <li class="divider"></li>
  <li><a href="/rawatjalan/public/admin/tambah">Tambah Admin</a></li>
</ul>

<ul id="pasien" class="dropdown-content">
  <li><a href="/rawatjalan/public/pasien">Lihat Pasien</a></li>
  <li class="divider"></li>
  <li><a href="/rawatjalan/public/pasien/tambah">Tambah Pasien</a></li>
</ul>

<ul id="mpasien" class="dropdown-content" style="width:100%;margin-left:-7%;">
  <li><a href="/rawatjalan/public/pasien">Lihat Pasien</a></li>
  <li class="divider"></li>
  <li><a href="/rawatjalan/public/pasien/tambah">Tambah Pasien</a></li>
</ul>

<ul id="rekammedik" class="dropdown-content">
  <li><a href="/rawatjalan/public/rekammedik">Lihat Rekam Medik</a></li>
  <li class="divider"></li>
  <li><a href="/rawatjalan/public/rekammedik/tambah">Tambah Rekam Medik</a></li>
</ul>

<ul id="mrekammedik" class="dropdown-content" style="width:100%;margin-left:-7%;">
  <li><a href="/rawatjalan/public/rekammedik">Lihat Rekam Medik</a></li>
  <li class="divider"></li>
  <li><a href="/rawatjalan/public/rekammedik/tambah">Tambah Rekam Medik</a></li>
</ul>

<ul id="poli" class="dropdown-content">
  <li><a href="/rawatjalan/public/poli">Lihat Poli</a></li>
  <li class="divider"></li>
  <li><a href="/rawatjalan/public/poli/tambah">Tambah Poli</a></li>
</ul>

<ul id="mpoli" class="dropdown-content" style="width:100%;margin-left:-7%;">
  <li><a href="/rawatjalan/public/poli">Lihat Poli</a></li>
  <li class="divider"></li>
  <li><a href="/rawatjalan/public/poli/tambah">Tambah Poli</a></li>
</ul>

<nav style="background-color:#009688;">
  <div class="nav-wrapper">
      <a href="/rawatjalan/public/dashboard" class="brand-logo" style="margin-left:1%;">Sistem Rawat Jalan</a>
      @if (Auth::guest())
      	<ul class="right hide-on-med-and-down" style="padding-right:1%;">
      		<li>Hi, Guest!</li>
      	</ul>
      @else
	      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">=</i></a>
	      <ul class="side-nav" id="mobile-demo">
	        <li><a class="dropdown-button" href="#!" data-activates="mdokter">Dokter</a></li>
	        <li><a class="dropdown-button" href="#!" data-activates="madmin">Admin</a></li>
	        <li><a class="dropdown-button" href="#!" data-activates="mpasien">Pasien</a></li>
	        <li><a class="dropdown-button" href="#!" data-activates="mrekammedik">Rekam Medik</a></li>
	        <li><a class="dropdown-button" href="#!" data-activates="mpoli">Poli</a></li>
	        <li><a href="{{ url('/logout') }}">Logout</a></li>
	      </ul>
	      <ul class="right hide-on-med-and-down">
	        <li><a class="dropdown-button" href="#!" data-activates="dokter">Dokter</a></li>
	        <li><a class="dropdown-button" href="#!" data-activates="admin">Admin</a></li>
	        <li><a class="dropdown-button" href="#!" data-activates="pasien">Pasien</a></li>
	        <li><a class="dropdown-button" href="#!" data-activates="rekammedik">Rekam Medik</a></li>
	        <li><a class="dropdown-button" href="#!" data-activates="poli">Poli</a></li>
	        <li><a href="{{ url('/logout') }}">Logout</a></li>
	      </ul>
      @endif
    </div>
</nav>
