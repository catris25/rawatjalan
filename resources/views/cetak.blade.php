
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
				</div>
				<div class="boxleftstripes" style="border-bottom:1px solid;">
					<p><span class="spans"> Nama Pasien </span> : {{ $pasienname }}</p>
					<p><span class="spans"> Nomor Rekam Medik </span> : {{ $pasienid }}</p>
				</div>
				<div class="boxleftstripes" style="border-bottom:1px solid;">
					<p><span class="spans"> Status Pasien </span> : {{ $status }}</p>
				</div>
				<div class="boxleftstripes" style="border-bottom:1px solid;">
				<p><span class="spans"> Nama Poli </span> : {{ $poli }}</p>
				</div>
				<div class="boxleftstripes" style="border-bottom:1px solid;">
					<p><span class="spans"> Nama Dokter </span> : {{ $dokter }}</p>
				</div>
				<div class="boxleftstripes" style="height:20%;">
					<p>
						Antrian di Poli : 
					</p>
				</div>
			</div>	
			<div class="boxxright">
				<p>Catatan : </p>
			</div>
		</div>
		<script>
			var d = new Date();
			document.getElementById("demo").innerHTML = d.toString();
		</script>
	</body>
</html>