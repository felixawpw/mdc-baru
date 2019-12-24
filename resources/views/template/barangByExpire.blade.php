<table class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-show-toggle="true" data-show-columns="true">
	<thead>
		<tr>
			<th data-sortable="true">Kode Barang</th>
			<th data-sortable="true">Nama Barang</th>
			<th data-sortable="true">Tanggal Expire</th>
			<th data-sortable="true">Stok Expire</th>
			<th data-sortable="true">Lokasi</th>
		</tr>
	</thead>
	<tbody>
		@foreach($barangs as $barang)
			@foreach($barang as $b)
			<td>{{$b->kode}}</td>
			<td>{{$b->nama}}</td>
			<td>{{$b->pivot->expire}}</td>
			<td>{{$b->pivot->sisa}}</td>
			<td>{{$b->lokasi}}</td>
			@endforeach	
		@endforeach
	</tbody>
</table>