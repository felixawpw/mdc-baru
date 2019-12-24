@extends('master')

@section('content')
<h3>DAFTAR PEMAKAIAN</h3>

<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
	<div class="panel-body no-padding">
		<table class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-show-toggle="true" data-show-columns="true">
			<thead>
				<tr class="warning">
					<th data-sortable="true">ID</th>
					<th data-sortable="true">Tanggal</th>
					<th data-sortable="true">Nama Dokter</th>
					<th data-sortable="true">Kode Barang</th>
					<th data-sortable="true">Nama Barang</th>
					<th data-sortable="true">Jumlah Pemakaian</th>
					<th>Aksi</th>
				</tr>
			</thead>
			
			<tbody>
				@foreach($pemakaians as $pemakaian)
					<tr>
						<td>{{$pemakaian->id}}</td>
						<td>{{date('j F Y', strtotime($pemakaian->tanggal))}}</td>
						<td><a href="/dokter/show/{{$pemakaian->dokter->id}}">{{$pemakaian->dokter->nama}}</td>
						<td><a href="/barang/show/{{$pemakaian->barang->id}}">{{$pemakaian->barang->kode}}</a></td>
						<td><a href="/barang/show/{{$pemakaian->barang->id}}">{{$pemakaian->barang->nama}}</a></td>
						<td>{{$pemakaian->jumlah}}</td>
						<td>
							<a href="/pemakaian/edit/{{$pemakaian->id}}" class="btn btn-primary">Edit</a>
							<a href="/pemakaian/delete/{{$pemakaian->id}}" class="btn btn-delete" onclick="return confirm('Apakah anda yakin?');">Hapus</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection