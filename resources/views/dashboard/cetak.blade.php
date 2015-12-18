@extends ('master')
@section ('content')
<div class="container-fluid" style="margin-top:1%;">
	<div class="row">
		<div class="boxx">
      		<h1 style="text-align:center;">Cetak Rekam Medik</h1>
    	</div>
    	<div class="row" style="width:70%; margin:0 auto; margin-top:3%;margin-bottom:3%;">
			<form class="form-horizontal" role="form" method="GET">
			<div class="boxcetak">
				<div class="boxcetakdate">
					<div class="input-field">
						<input id="tgl_awal" type="date" class="datepicker" name="tgl_awal" value="{{ old('tgl_awal') }}" required>
						<label for="tgl_awal">Tanggal Awal</label>
					</div>
				</div>
				<div class="boxcetakdate">
					<div class="input-field">
						<input id="tgl_akhir" type="date" class="datepicker" name="tgl_akhir" value="{{ old('tgl_akhir') }}" required>
						<label for="tgl_akhir">Tanggal Akhir</label>
					</div>
				</div>
				<div class="boxcetaksub">
				<button type="submit" class="btn btn-primary" name="cari" id="cari">
					CARI
				</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	@if(isset($rekamMedik))
		@if(count($rekamMedik)<1)

			<div class="alert alert-warning">
				<strong>Maaf</strong>, hasil tidak ditemukan.
			</div>
		@else
		<div class="well well-lg">
				<h5>Data Record Rekam Medik Tanggal {{$tgl_awal.' hingga '.$tgl_akhir }}</h5>
				<form class="form-horizontal" role="form" method="POST" name="cetak">
						<input type="hidden" name="tgl_awal" value={{$tgl_awal}}>
						<input type="hidden" name="tgl_akhir" value={{$tgl_akhir}}>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="submit" class="btn btn-primary" name="cetak" value="cetak">
				</form>
				<table class="table table-striped table-bordered">
					<thead>

						<tr>
							<td>Record</td>
							<td>Pasien</td>
							<td>Dokter</td>
							<td>Kode visit</td>
							<td>Usia berobat</td>
							<td>Tanggal</td>
							<td>Tinggi badan</td>
							<td>Berat badan</td>
							<td>Tekanan darah</td>
							<td>Resep</td>
							<td>Anamnesis</td>
							<td>Diagnosis</td>
							<td>Tindakan</td>
						</tr>
					</thead>
				@foreach($rekamMedik as $rm)
				<tr>
					<td>{{$rm->id.'-'.$rm->id_dokter.'-'.$rm->kode_visit}}</td>
					<td>{{$rm->id}}</td>
					<td>{{$rm->id_dokter}}</td>
					<td>{{$rm->kode_visit}}</td>
					<td>{{$rm->usia_berobat}}</td>
					<td>{{$rm->tgl_visit}}</td>
					<td>{{$rm->tinggi_badan}}</td>
					<td>{{$rm->berat_badan}}</td>
					<td>{{$rm->tekanan_darah}}</td>
					<td>{{$rm->resep}}</td>
					<td>{{$rm->anamnesis}}</td>
					<td>{{$rm->diagnosis}}</td>
					<td>{{$rm->tindakan}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		</div>
		@endif
	@endif
</div>

@endsection
