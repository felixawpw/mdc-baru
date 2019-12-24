@extends('master')

@section('content')
<h3>PEMBELIAN DARI: {{$supplier->nama}}</h3>

<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
	<div class="panel-body no-padding">
		<table class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-show-toggle="true" data-show-columns="true">
			<thead>
				<tr class="warning">
					<th data-sortable="true">ID</th>
					<th data-sortable="true">Tanggal</th>
					<th>Tampilkan Semua Barang</th>
				</tr>
			</thead>
			
			<tbody>
				@foreach($pembelians as $pembelian)
					<tr>
						<td>{{$pembelian->id}}</td>
						<td>{{date('d F Y', strtotime($pembelian->tanggal))}}</td>
						<td><a href="/pembelian/show/{{$pembelian->id}}" class="btn btn-primary">Tampilkan</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection