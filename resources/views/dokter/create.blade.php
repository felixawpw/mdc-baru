@extends('master')

@section('content')
<h3>TAMBAH DOKTER BARU</h3>

<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
		<form class="form-horizontal" method="post" action="#">
		    {{csrf_field()}}
		    
			<div class="form-group">
				<label for="focusedinput" class="col-sm-2 control-label">Nama Dokter</label>
				
				<div class="col-sm-8">
					<input type="text" class="form-control1" id="focusedinput" placeholder="" name="nama_dokter">
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
	</div>
</div>
@endsection