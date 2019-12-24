<!-- Isi -->
<div class="scrollbar" id="style-2">
	@if(count($barangs) > 0)
		@foreach($barangs as $barang)
			@foreach ($barang as $b)
			<div class="activity-row">
				<div class="col-xs-12 activity-desc">
				<h5><a href="/barang/show/{{$b->id}}">{{$b->nama}}</a></h5>
					<p>Stok Expire: {{$b->pivot->sisa}}</p>
				</div>
				<div class="clearfix"></div>
			</div>
			@endforeach
		@endforeach
	@else
		Tidak ada barang expire hari ini.
	@endif
</div>