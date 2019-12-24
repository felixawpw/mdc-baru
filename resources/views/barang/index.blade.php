@extends('master')

@section('content')
<h3>DAFTAR BARANG</h3>

<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
	<div class="panel-body no-padding">
		<table class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-show-toggle="true" data-show-columns="true">
			<thead>
				<tr class="warning">
					<th data-sortable="true">ID</th>
					<th data-sortable="true">Kode</th>
					<th data-sortable="true">Nama Barang</th>
					<th data-sortable="true">Kategori</th>
					<th data-sortable="true">Lokasi</th>
					<th data-sortable="true">Stok Saat Ini</th>
					<th>Aksi</th>
				</tr>
			</thead>
			
			<tbody>
				@foreach($barangs as $barang)
					<tr>
						<td>{{$barang->id}}</td>
						<td><a href="/barang/show/{{$barang->id}}">{{$barang->kode}}</a></td>
						<td><a href="/barang/show/{{$barang->id}}">{{$barang->nama}}</a></td>
						<td>{{$barang->category->nama}}</td>
						<td>{{$barang->lokasi}}</td>
						<td>{{$barang->stok}}</td>
						<td>
							<a href="/barang/edit/{{$barang->id}}" class="btn btn-primary">Edit</a>
							<a href="/barang/delete/{{$barang->id}}" class="btn btn-delete" onclick="return confirm('Apakah anda yakin?');">Hapus</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection