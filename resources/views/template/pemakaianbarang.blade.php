<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
	<div class="panel-body no-padding">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Bulan</th>
					<th>Jumlah</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pemakaians as $pemakaian)
				<tr>
					<td>{{date("F", strtotime($pemakaian->bulan))}}</td>
					<td>{{$pemakaian->totalPemakaian}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>