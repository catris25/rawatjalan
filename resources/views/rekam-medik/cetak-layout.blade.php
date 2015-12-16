
<html>
	<head>
		<link href='https://fonts.googleapis.com/css?family=Lato:700' rel='stylesheet' type='text/css'>
		<link href="/rawatjalan/public/css/roboto.min.css" rel="stylesheet">
	    <link href="/rawatjalan/public/css/bootstrap.css" rel="stylesheet">
	    <!--<link href="/rawatjalan/public/css/material.min.css" rel="stylesheet">-->
	    <link href="/rawatjalan/public/css/ripples.min.css" rel="stylesheet">
	    <link href="/rawatjalan/public/css/materialize.min.css" rel="stylesheet">
		<style>
			p {
				font-family: 'Lato';
				font-size:11px;
				display:table-cell;
    			vertical-align:middle;
			}

			.boxx {
				width:100%;
				height:40%;
				border: 1px solid;
			}

			.boxxleft {
				width:30%;
				height:100%;
				float:left;
				display: inline-block;
				border-right:1px solid;
			}
			.boxxright {
				width:70%;
				height:100%;
				float:left;
			}
			.boxleftstripes {
				width:100%;
				height:16%;
				float: left;
				display: table;
			}
			.spans {
				width:40%;
			}
		</style>
		<script type="text/javascript">

	        function cetaks() {
	            print();
	        }
	    </script>

	</head>
	<body onload="window.print()" onfocus="window.close()">
		<div class="boxx">
			<div class="boxxleft">
				<div class="boxleftstripes" style="border-bottom:1px solid;">
					<p id="demo"></p>
          <table class="table table-striped table-bordered">
            <thead>
                </div>
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
      </div>
		<script>
			var d = new Date();
			document.getElementById("demo").innerHTML = d.toString();
		</script>
	</body>
</html>
