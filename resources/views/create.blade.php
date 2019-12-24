@extends('master')

@section('content')
<h3>TAMBAH PEMBELIAN BARU</h3>

<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">

		<div id="divFormPembelian">
			<form class="form-horizontal" method="post" id="formPembelian" ectype="multipart/form-data">
				{{csrf_field()}}
				
				<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Tanggal</label>
					
					<div class="col-sm-8">
						<input type="date" class="form-control1" id="focusedinput" placeholder="" name="tanggal" required>
					</div>
				</div>


				<div class="form-group">
					<label for="selector1" class="col-sm-2 control-label">Nama Supplier</label>
					
					<div class="col-sm-8">
						<select name="id_supplier" id="selector1" class="form-control1">
							<option selected disabled>...</option>
							@foreach($suppliers as $supplier)
								<option value="{{$supplier->id}}">{{$supplier->nama}}</option>
							@endforeach
						</select>
					</div>
					
					<div class="col-sm-2">
					    <a class="btn btn-primary" href="/supplier/add">+</a>
					</div>
				</div>

				<div class="panel-footer">
					<div class="row">
						<div class="col-sm-8 col-sm-offset-2">
							<input type="submit" class="btn-primary btn" value="Lengkapi Data Pembelian">
						</div>
					</div>
				</div>
			</form>
		</div>

		<div hidden id="divFormBarang">
			<form class="form-horizontal" method="post" id="formTambahBarang" ectype="multipart/form-data">
				{{csrf_field()}}

				<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Kode Barang</label>
					
					<div class="col-sm-8">
						<input type="text" class="form-control1" id="kode" placeholder="" name="kode_barang" required>
					</div>
				</div>

				<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Nama Barang</label>
					
					<div class="col-sm-8">
						<input type="text" class="form-control1" id="nama" placeholder="" name="nama_barang" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Jumlah Pembelian</label>
					
					<div class="col-sm-8">
						<input type="number" class="form-control1" id="jumlah" placeholder="" name="stok" required>
					</div>
				</div>

				<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Tanggal Expire</label>
					
					<div class="col-sm-8">
						<input type="date" class="form-control1" id="expire" placeholder="" name="tanggal_expire" required>
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

			<!-- Form Handler Ajax -->
			<script type="text/javascript">
				var counter = 1;
				$("#formPembelian").submit(function(e){
					e.preventDefault();
					$.ajax({
						type: "POST",
						url: "/pembelian/add/step1",
						data: $(this).serialize(),
						success: function( msg ) {
							//Response = Array dengan key pembelian_id dan nama_supplier
							var dout = Date.parse(msg["tanggal_pembelian"]);

							$("#labelSupplier").html("Nama Supplier: " + msg["nama_supplier"]);
							$("#labelTanggal").html("Tanggal Pembelian: " + dout.toString("d MMMM yyyy"));

							$("#divFormBarang").removeAttr("hidden");
							$("#divFormPembelian").attr("hidden", true);
						},
						error: function(data){
							alert("Input gagal.");
						}
					});
					$("#formPembelian :input").attr("disabled", true);
				});

				$("#formTambahBarang").submit(function(e){
					e.preventDefault();
					$.ajax({
						type: "POST",
						url: "/pembelian/add/step2",
						data: $(this).serialize(),
						success: function( msg ) {
							$("#bodyTableBarang").html($("#bodyTableBarang").html() + msg);
							var kode = $('#kode').val();
							var nama = $('#nama').val();
							var expire = $('#expire').val();
							var jumlah = $('#jumlah').val();
							var appendedText = '<input type="hidden" name="kode_' + counter + '" value="' + kode + '">' +
							'<input type="hidden" name="nama_' + counter + '" value="' + nama + '">' +
							'<input type="hidden" name="expire_' + counter + '" value="' + expire + '">' +
							'<input type="hidden" name="jumlah_' + counter + '" value="' + jumlah + '">';
							$('#bodyTableBarang').html($("#bodyTableBarang").html() + appendedText);
							counter++;
							$("#formTambahBarang")[0].reset();
						},
						error: function(data){
							alert("Input gagal.");
						}
					});
				});
			</script>
			<!-- End Form Ajax -->
			
			<h3>DATA PEMBELIAN</h3>
			<label id="labelSupplier"></label><br>
			<label id="labelTanggal"></label>

			<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
				<div class="panel-body no-padding">
					<table class="table table-striped">
						<thead>
							<tr class="warning">
								<th>Kode Barang</th>
								<th>Nama Barang</th>
								<th>Jumlah Pembelian</th>
								<th>Tanggal Expire</th>
								<th>Hapus</th>
							</tr>
						</thead>
						<tbody id="bodyTableBarang">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection