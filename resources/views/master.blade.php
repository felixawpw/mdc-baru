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
		<link rel="stylesheet" type="text/css" href="/css/bootstrap-table.css">
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		<link rel="stylesheet" type="text/css" href="/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="/css/custom.css">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900">
		
		<!-- Script -->
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }</script>
		<script type="text/javascript" src="http://www.datejs.com/build/date.js"></script>
		<script type="text/javascript" src="/js/jquery.min.js"></script>
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/js/bootstrap-table.js"></script>
		<script type="text/javascript" src="/js/metisMenu.min.js"></script>
		<script type="text/javascript" src="/js/custom.js"></script>
		
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
		<div id="wrapper">
			
			<!-- NAVIGATION -->
			<nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			
				<!-- Header -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
					<a class="navbar-brand" href="{{route("home")}}">Logistik MDC</a>
				</div>
				
				<!-- Sidebar -->
				<div class="navbar-default sidebar" role="navigation">
					<div class="sidebar-nav navbar-collapse">
						<ul class="nav" id="side-menu">
							
							<!-- Beranda -->
							<li>
								<a href="{{route("home")}}"><i class="fa fa-dashboard nav_icon"></i>BERANDA</a>
							</li>
							
							<!-- Barang -->
							<li>
								<a href="{{route("barang_all")}}"><i class="fa fa-table nav_icon"></i>BARANG<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{route("barang_all")}}">Daftar Barang</a>
									</li>
									<li>
										<a href="{{route("barang_create")}}">Tambah Barang Baru</a>
									</li>
								</ul>
							</li>
							
							<!-- Dokter -->
							<li>
								<a href="{{route("dokter_all")}}"><i class="fa fa-flask nav_icon"></i>DOKTER<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{route("dokter_all")}}">Daftar Dokter</a>
									</li>
									<li>
										<a href="{{route("dokter_create")}}">Tambah Dokter Baru</a>
									</li>
								</ul>
							</li>
							
							<!-- Supplier -->
							<li>
								<a href="{{route("supplier_all")}}"><i class="fa fa-sitemap fa-fw nav_icon"></i>SUPPLIER<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{route("supplier_all")}}">Daftar Supplier</a>
									</li>
									<li>
										<a href="{{route("supplier_create")}}">Tambah Supplier Baru</a>
									</li>
								</ul>
							</li>
							
							<!-- Pembelian -->
							<li>
								<a href="{{route("pembelian_all")}}"><i class="fa fa-laptop nav_icon"></i>PEMBELIAN<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{route("pembelian_all")}}">Daftar Pembelian</a>
									</li>
									<li>
										<a href="{{route("pembelian_create")}}">Tambah Pembelian Baru</a>
									</li>
								</ul>
							</li>
							
							<!-- Pemakaian -->
							<li>
								<a href="{{route("pemakaian_all")}}"><i class="fa fa-check-square-o nav_icon"></i>PEMAKAIAN<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{route("pemakaian_all")}}">Daftar Pemakaian</a>
									</li>
									<li>
										<a href="{{route("pemakaian_create")}}">Tambah Pemakaian Baru</a>
									</li>
								</ul>
							</li>
							
						</ul>
					</div>
				</div>
			</nav>
			
			<!-- PAGE WRAPPER -->
			<div id="page-wrapper">
				<div class="col-md-12 graphs">
					<div class="xs">
						@yield("content")
					</div>
					
					<div class="copy_layout">
						<p>Copyright © 2015 Modern. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
					</div>
				</div>
			</div>
			
		</div>
	</body>
</html>