@extends('master')

@section('content')
<h3>DAFTAR SUPPLIER</h3>

<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
	<div class="panel-body no-padding">
		<table class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-show-toggle="true" data-show-columns="true">
			<thead>
				<tr class="warning">
					<th data-sortable="true">ID</th>
					<th data-sortable="true">Nama Supplier</th>
					<th>Tampilkan Semua Pembelian</th>
					<th>Aksi</th>
				</tr>
			</thead>
			
			<tbody>
				@foreach($suppliers as $supplier)
					<tr>
						<td>{{$supplier->id}}</td>
						<td>{{$supplier->nama}}</a></td>
						<td><a href="/supplier/show/{{$supplier->id}}" class="btn btn-primary">Tampilkan</a></td>
						<td>
							<a href="/supplier/edit/{{$supplier->id}}" class="btn btn-primary">Edit</a>
							<a href="/supplier/delete/{{$supplier->id}}" class="btn btn-delete" onclick="return confirm('Apakah anda yakin?');">Hapus</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection