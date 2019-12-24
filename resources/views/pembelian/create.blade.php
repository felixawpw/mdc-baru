@extends('master')

@section('content')
<h3>TAMBAH PEMBELIAN BARU</h3>

<div class="tab-content" id="divpembelian">
	<div class="tab-pane active" id="horizontal-form">
		<form class="form-horizontal" method="post" action="#">
			{{csrf_field()}}
			
			<div class="form-group">
				<label for="focusedinput" class="col-sm-2 control-label">Supplier</label>
				
				<div class="col-sm-6">
					<select name="supplier_id" class="form-control" id="supplier_id">
						@foreach($suppliers as $supplier)
							<option value="{{$supplier->id}}">
								{{$supplier->nama}}
							</option>
						@endforeach
					</select>
				</div>
				<div class="col-sm-2">
					<a href="/supplier/add" class="btn btn-primary" id="tambahsupplier" style="width:100%;">
						TAMBAH SUPPLIER
					</a>
				</div>
			</div>
			
			<div class="form-group">
				<label for="focusedinput" class="col-sm-2 control-label">Tanggal</label>

				<div class="col-sm-8">
					<input required type="date" class="form-control1" id="focusedinput" placeholder="Tanggal" name="tanggal">
				</div>
			</div>

			<div class="form-group">
				<label for="focusedinput" class="col-sm-2 control-label">Barang</label>
					
				<div class="col-sm-3">
					<a href="#" class="btn btn-primary" id="caribarang" style="width:100%;">Cari Barang</a>
				</div>
				<div class="col-sm-3">
					<a href="#" class="btn btn-primary" id="tutupbarang" style="width:100%;">Tutup Pencarian Barang</a>
				</div>
			</div>

			<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
				<div class="panel-body no-padding">
					<table class="table table-striped">
						<thead>
							<tr class="warning">
								<th>Kode</th>
								<th>Nama</th>
								<th>Jumlah</th>
								<th>Expire</th>
								<th>Hapus</th>
							</tr>
						</thead>
						<tbody id="tBarangs">
							
						</tbody>
					</table>
				</div>
			</div>

			<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="" id="tablebarang" hidden>
				<div class="panel-body no-padding">
					<table class="table table-striped" id="tablebarang" data-toggle="table" data-url="/barang/json" data-pagination="true" data-search="true" data-show-toggle="true" data-show-columns="true">
						<thead>
							<tr class="warning">
								<th data-sortable="true" data-field="kode">Kode</th>
								<th data-sortable="true" data-field="nama">Nama</th>
								<th data-sortable="true" data-field="stok">Stok</th>
								<th data-sortable="true" data-field="namakategori">Category</th>
								<th data-field="id" data-formatter="LinkFormatter">Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>

			<div class="panel-footer">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<button type="submit" class="btn-primary btn" style="width:100%;">Kirim</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<div id="divsupplier">
	
</div>
<script type="text/javascript">
	/*
	$('#tambahsupplier').click(function(){
		$.ajax({
	        type: "GET",
	        url: '/ajax/add/supplier',
	        success: function( data ) {
	        	$('#divsupplier').html(data);
	        	$('#divpembelian').attr('hidden', true);
	        }
	    });
	});*/
	$('#caribarang').click(function(){
		$('#tablebarang').removeAttr('hidden');
	});
	$('#tutupbarang').click(function(){
		$('#tablebarang').attr('hidden', true);
	});
	var barangs = new Array();
	
	function LinkFormatter(value, row, index) {
		return "<a class='btn btn-primary' " +
		"onclick='addBarang("+ row['id'] + ',"' + row['kode'] + '","' + row['nama']+ '"' + ")'>Tambah Barang</a>";
	}

	function addBarang(...args)
	{
		if (barangIsAdded(args[0]))
			alert('Barang tersebut sudah ditambahkan');
		else
		{
			barangs.push(args[0]);
			$tr = 
			"<tr>" +
				"<td>" + args[1] + "</td>" + 
				"<td>" + args[2] + "</td>" +
				"<input type='hidden' name='id_" + barangs.length + "' value='" + args[0] + "'>" +
				"<td><input type='number' class='form-control' placeholder='Jumlah Barang' required name='jumlah_" + barangs.length + "'></td>" +
				"<td><input type='date' class='form-control' placeholder='Expire' required name='expire_" + barangs.length + "'</td>" +
				"<td><a onclick='deleteBarang(" + args[0] + ")' class='btn btn-primary'>Delete</a></td>" + 
			"</tr>";
			$('#tBarangs').append($tr);
		}
	}

	function barangIsAdded(id)
	{
		for (var i = 0; i < barangs.length; i++)
		{
			if (barangs[i] === id)
				return true;
		}
		return false;
	}

	function deleteBarang(id)
	{
		alert('Delete id = ' + id);
	}
	$(document).ready(function(){

	});
</script>
@endsection