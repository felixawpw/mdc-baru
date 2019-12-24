@extends('master')

@section('content')
<h3>PEMBELIAN DARI: Fondaco (1, 14 Desember 2017)</h3>
<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
	<div class="panel-body no-padding">
		<table class="table table-striped">
			<thead>
				<tr class="warning">
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Jumlah Pembelian</th>
					<th>Sisa Dari Pembelian Ini</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody>
				@foreach($barangs as $barang)
				<tr>
					<td>{{$barang->kode}}</td>
					<td>{{$barang->nama}}</td>
					<td>{{$barang->pivot->jumlah}}</td>
					<td>{{$barang->pivot->sisa}}</td>
					<td><a class="btn btn-primary" href="/pembelian/barang/edit/{{$id}}/{{$barang->id}}">Edit</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection