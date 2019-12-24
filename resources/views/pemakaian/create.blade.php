@extends('master')

@section('content')
<h3>TAMBAH PEMAKAIAN BARU</h3>

<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
		<form class="form-horizontal" method="post">
			{{csrf_field()}}
			
			<div class="form-group">
				<label for="focusedinput" class="col-sm-2 control-label">Tanggal</label>
				
				<div class="col-sm-8">
					<input type="date" class="form-control1" id="focusedinput" placeholder="" name="tanggal">
				</div>
			</div>
			
			<div class="form-group">
				<label for="selector1" class="col-sm-2 control-label">Nama Dokter</label>
				
				<div class="col-sm-8">
					<select name="id_dokter" id="selector1" class="form-control1">
						<option selected disabled>...</option>
						@foreach($dokters as $dokter)
							<option value="{{$dokter->id}}">{{$dokter->nama}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="focusedinput" class="col-sm-2 control-label">Kode Barang</label>
				
				<div class="col-sm-8">
					<input type="text" id="jumlah" class="form-control1" placeholder="" name="kode_barang">
				</div>
			</div>
			
			<div class="form-group">
				<label for="selector1" class="col-sm-2 control-label">Nama Barang</label>
				
				<div class="col-sm-5">
					<select name="id_barang" id="cBoxBarang" class="form-control1">
						<option selected disabled>...</option>
						@foreach($barangs as $barang)
							<option value="{{$barang->id}}">{{$barang->nama}}</option>
						@endforeach
					</select>
				</div>
				
				<label class="col-sm-1 control-label" id="labelStok">Stok</label>
				
				<div class="col-sm-2">
					<select disabled class="form-control1" id=cBoxStok>
						<option selected disabled>...</option>
						@foreach($barangs as $barang)
							<option value="{{$barang->id}}">{{$barang->stok}}</option>
						@endforeach
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="focusedinput" class="col-sm-2 control-label">Jumlah Pemakaian</label>
				
				<div class="col-sm-8">
					<input type="number" id="jumlah" class="form-control1" placeholder="" name="jumlah_barang" min="1">
				</div>
			</div>
			
			<div class="panel-footer">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<button type="submit" class="btn-primary btn">Kirim</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- SCRIPT -->
<script type="text/javascript">
	$('#cBoxBarang').change(function(){
		$('#cBoxStok').val($('#cBoxBarang').val());
		var cBox = document.getElementById('cBoxStok');
		var stok = parseInt(cBox.options[cBox.selectedIndex].text); 
		if (stok < 1)
		{
			alert("Stok habis.");
			$('#buttonSubmit').attr("disabled", true);
		}
		else
			$('#buttonSubmit').removeAttr("disabled");
	});

	$('#jumlah').change(function(){
		var cBox = document.getElementById('cBoxStok');
		var stok = parseInt(cBox.options[cBox.selectedIndex].text); 
		var jumlah = $(this).val();
		if (jumlah > stok)
			$(this).val(stok);
	});
</script>
@endsection