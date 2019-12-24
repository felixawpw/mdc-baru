<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE HTML>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="description" content="Makassar Dental Care">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Logistik MDC</title>
		
		<!-- Stylesheet -->
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900">
		<style>
			body,
			html {
				background-color: #fff;
			}

			body {
				padding: 20px;
			}

			h3 {
				text-decoration: underline;
				text-transform: uppercase;
			}
		</style>
		
		<!-- Script -->
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }</script>
		<script type="text/javascript" src="/js/jquery.min.js"></script>
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
		
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="/images/favicon/mdc-favicon.ico" />
		<link rel="apple-touch-icon" sizes="57x57" href="/images/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/images/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/images/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/images/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/images/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/images/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/images/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/images/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/images/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/images/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
		<link rel="manifest" href="/images/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/images/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
	</head>
	
	<body>
		<h3>Daftar Barang Bulan {{date('F Y', strtotime($pemakaiansBulanIni[0]->tanggal))}}</h3>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>Kode</th>
					<th>Nama Barang</th>
					<th>Stok Awal</th>
					<?php $jumlah = array(); ?>
					@foreach($dokters as $dokter)
						<th>{{$dokter->nama}}</th>
						<?php $jumlah[$dokter->id] = 0; ?>
					@endforeach
					<th>Total Pemakaian</th>
					<th>Stok Akhir</th>
				</tr>
			</thead>
			<tbody>
				@foreach($barangs as $barang)
					<tr>
						<td>XXXXXXXX</td>
						<td><a href="/barang/show/{{$barang->id}}">{{$barang->nama}}</a></td>
						<td>{{$barang->stok}}</td>

						<?php $total = 0;?>
						@foreach($pemakaiansBulanIni->where("barang_id", '=', $barang->id) as $pemakaian)
							@foreach($dokters as $dokter)
								@if($dokter->id == $pemakaian->dokter_id)
									<?php $jumlah[$dokter->id] += $pemakaian->jumlah; ?>
								@endif
							@endforeach
						@endforeach

						@foreach($dokters as $dokter)
							<td>
								<?php 
								if($jumlah[$dokter->id] > 0) 
									echo $jumlah[$dokter->id]; 
								else
									echo "-";
								$total += $jumlah[$dokter->id];
								$jumlah[$dokter->id] = 0; 
								?>
							</td>
						@endforeach

						<td>{{$total}}</td>
						<td>{{$barang->stok - $total}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</body>
</html>