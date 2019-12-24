@extends('master')

@section('content')
<h3>BERANDA</h3>

<!-- WIDGET -->
<div class="col_1">
	
	<!-- Kalender -->
	<div class="col-md-4 span_7">	
		<div class="cal1 cal_2"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">July 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day adjacent-month last-month calendar-day-2015-06-28"><div class="day-contents">28</div></td><td class="day adjacent-month last-month calendar-day-2015-06-29"><div class="day-contents">29</div></td><td class="day adjacent-month last-month calendar-day-2015-06-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-01"><div class="day-contents">1</div></td><td class="day calendar-day-2015-07-02"><div class="day-contents">2</div></td><td class="day calendar-day-2015-07-03"><div class="day-contents">3</div></td><td class="day calendar-day-2015-07-04"><div class="day-contents">4</div></td></tr><tr><td class="day calendar-day-2015-07-05"><div class="day-contents">5</div></td><td class="day calendar-day-2015-07-06"><div class="day-contents">6</div></td><td class="day calendar-day-2015-07-07"><div class="day-contents">7</div></td><td class="day calendar-day-2015-07-08"><div class="day-contents">8</div></td><td class="day calendar-day-2015-07-09"><div class="day-contents">9</div></td><td class="day calendar-day-2015-07-10"><div class="day-contents">10</div></td><td class="day calendar-day-2015-07-11"><div class="day-contents">11</div></td></tr><tr><td class="day calendar-day-2015-07-12"><div class="day-contents">12</div></td><td class="day calendar-day-2015-07-13"><div class="day-contents">13</div></td><td class="day calendar-day-2015-07-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-07-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-07-16"><div class="day-contents">16</div></td><td class="day calendar-day-2015-07-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-07-18"><div class="day-contents">18</div></td></tr><tr><td class="day calendar-day-2015-07-19"><div class="day-contents">19</div></td><td class="day calendar-day-2015-07-20"><div class="day-contents">20</div></td><td class="day calendar-day-2015-07-21"><div class="day-contents">21</div></td><td class="day calendar-day-2015-07-22"><div class="day-contents">22</div></td><td class="day calendar-day-2015-07-23"><div class="day-contents">23</div></td><td class="day calendar-day-2015-07-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-07-25"><div class="day-contents">25</div></td></tr><tr><td class="day calendar-day-2015-07-26"><div class="day-contents">26</div></td><td class="day calendar-day-2015-07-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-07-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-07-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-07-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2015-08-01"><div class="day-contents">1</div></td></tr></tbody></table></div></div>
	</div>
	
	<!-- Expire Hari Ini -->
	<div class="col-md-4 span_8">
		<div class="activity_box">
			
			<!-- Judul -->
			<div class="panel-heading" id="panel-heading-red">
				<h4 class="panel-title">EXPIRE HARI INI</h4>
			</div>

			<div id="divExpireHariIni">
			</div>		
		</div>
	</div>
	
	<!-- Expire Segera -->
	<div class="col-md-4 span_8">
		<div class="activity_box">
		
			<!-- Judul -->
			<div class="panel-heading" id="panel-heading-blue">
				<h4 class="panel-title">EXPIRE BULAN INI</h4>
			</div>
		
			<div id="divExpireBulanIni">
			</div>
			
		</div>
	</div>
	
	<div class="clearfix"></div>
	
</div>

<!-- TABEL BARANG -->
<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
	
	<!-- Judul -->
	<div class="panel-heading">
		<h2>Daftar Barang Bulan {{date('F Y')}}</h2>
		<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
	</div>
	
	<!-- Isi -->
	<div class="panel-body no-padding">
		<table class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-show-toggle="true" data-show-columns="true">
			<thead>
				<tr class="warning">
					<th data-sortable="true">ID</th>
					<th data-sortable="true">Kode</th>
					<th data-sortable="true">Nama Barang</th>
					<th data-sortable="true">Kategori</th>
					
					@foreach($dokters as $dokter)
						<th data-sortable="true">{{$dokter->nama}}</th>
					@endforeach
					
					<th data-sortable="true">Stok Saat Ini</th>
				</tr>
			</thead>
			
			<tbody>
				@foreach($barangs as $barang)
					<tr>
						<td>{{$barang->id}}</td>
						<td><a href="/barang/show/{{$barang->id}}">{{$barang->kode}}</a></td>
						<td><a href="/barang/show/{{$barang->id}}">{{$barang->nama}}</a></td>
						<td>{{$barang->category->nama}}</td>
						
						@foreach($dokters as $dokter)
							<?php
							$pemakaians = $barang->pemakaians->where('dokter_id', '=', $dokter->id);
							$jumlah = 0;
							foreach ($pemakaians as $pemakaian)
							{
								$jumlah += $pemakaian->jumlah;
							}
							?>
							
							@if($jumlah > 0)
								<td>{{$jumlah}}</td>
							@else
								<td>-</td>
							@endif
						@endforeach
						
						<td>{{$barang->stok}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
</div>

<!-- CEK EXPIRE -->
<div class="panel panel-red" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
	
	<!-- Judul -->
	<div class="panel-heading">
		<h2>CEK EXPIRE</h2>
		<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
	</div>
	
	<!-- Isi -->
	<div class="panel-body no-padding" style="display: block;">
		<form method="get" id="formHariExpire">
			<h4 id="hariExpire">Expire dalam berapa hari?</h4>
			<input type="number" name="hari" id="inputHari" min="0" value="0"><br><br>
			<button type="submit" class="btn btn-primary">Kirim</button>
		</form>
		
		<div id="barangByExpireDiv">
			
		</div>
	</div>

</div>

<!-- PRINT LAPORAN -->
<div class="panel panel-blue" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
	
	<!-- Judul -->
	<div class="panel-heading">
		<h2>PRINT LAPORAN BULANAN</h2>
		<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
	</div>
	
	<!-- Isi -->
	<div class="panel-body no-padding" style="display: block;">
		<form method="get" action="/pdf/stok">
			<input type="month" name="bulan" value="<?=date('Y-m')?>"><br><br>
			<button type="submit" class="btn btn-primary">Kirim</button>
		</form>
	</div>

</div>

<!-- STYLESHEET / SCRIPT -->
<link rel="stylesheet" type="text/css" href="css/clndr.css">
<script type="text/javascript" src="js/underscore-min.js"></script>
<script type="text/javascript" src= "js/moment-2.2.1.js"></script>
<script type="text/javascript" src="js/clndr.js"></script>
<script type="text/javascript" src="js/site.js"></script>
<script type="text/javascript">
	$('#formHariExpire').submit(function(e){
		e.preventDefault();
		$.ajax({
			type: "GET",
			url: "/ajax/barangByExpiryDate",
			data: { 
			tanggal: $('#inputHari').val()
			}, 
			success: function( msg ) {
			$('#barangByExpireDiv').html(msg);
			}
		});
	});
	$(document).ready(function(){
		$.ajax({
			type: "GET",
			url: "/ajax/expire/hariini",
			success: function( msg ) {
				$('#divExpireHariIni').html(msg);
			}
		});
		$.ajax({
			type: "GET",
			url: "/ajax/expire/bulanini",
			success: function( msg ) {
				$('#divExpireBulanIni').html(msg);
			}
		});
	});
</script>
@endsection