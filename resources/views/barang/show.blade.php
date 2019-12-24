@extends('master')

@section('content')
<h3>{{$barang->nama}} (XXXXXXXX, {{$barang->category->nama}}, Rak A)</h3>

@foreach($expires as $expire)
	{{$expire->id}}
	{{$expire->tanggal}}
	{{$expire->jumlah}}
	{{$expire->penyimpanan->nama}}
@endforeach

<form id="formPemakaian">
	<select id="tipe">
		<option value="1">Bulan</option>
		<option value="2">Tahun</option>
	</select>

	<select id="tahun">
		<option value="2017">2017</option>
	</select>

	<select id="bulan">
		<option value="1">Januari</option>
		<option value="2">Februari</option>
		<option value="3">Maret</option>
		<option value="4">April</option>
		<option value="5">Mei</option>
		<option value="6">Juni</option>
		<option value="7">Juli</option>
		<option value="8">Agustus</option>
		<option value="9">September</option>
		<option value="10">Oktober</option>
		<option value="11">November</option>
		<option value="12">Desember</option>
	</select>
	<input type="submit" name="" value="Submit" class="btn btn-primary">
</form>

<div id="divPemakaian">

</div>

<!-- SCRIPT -->
<script type="text/javascript">
	$('#tipe').change(function(){
		var tipe = $('#tipe').val();
		if (tipe == 1)
		{
			$('#bulan').removeAttr("hidden");
		}
		else
		{
			$('#bulan').attr("hidden", true);
			$('#tahun').removeAttr("hidden");
		}
	});

	$('#formPemakaian').submit(function(e){
		var url = "";
		var tipe = $('#tipe').val();
		if (tipe == 1)
			url = '/ajax/barang/showMonthly';
		else
			url = '/ajax/barang/showYearly';
		e.preventDefault();
	    $.ajax({
	        type: "GET",
	        url: url,
	        data: { 
	        	tahun: $('#tahun').val(),
	        	bulan: $('#bulan').val(),
	        	id_barang: {{$barang->id}}
	        }, 
	        success: function( data ) {
	        	$('#divPemakaian').html(data);
	        }
	    });
    });
</script>
@endsection