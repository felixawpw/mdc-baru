@extends('master')

@section('content')
<h3>EDIT BARANG (ID: {{$barang->id}})</h3>

<div class="tab-content">
    <div class="tab-pane active" id="horizontal-form">
        <form class="form-horizontal" method="post" action="#">
            {{csrf_field()}}
            
            <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Kode Barang</label>
                
                <div class="col-sm-8">
                    <input type="text" class="form-control1" id="focusedinput" placeholder="" name="kode_barang" value="{{$barang->kode}}">
                </div>
            </div>

            <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Nama Barang</label>
                
                <div class="col-sm-8">
                    <input type="text" class="form-control1" id="focusedinput" placeholder="" name="nama_barang"
                    value="{{$barang->nama}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="selector1" class="col-sm-2 control-label">Kategori Barang</label>
                
                <div class="col-sm-8">
                    <select name="id_kategori" id="selector1" class="form-control1">
                        <option selected disabled>...</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($category->id == $barang->category_id) selected @endif>{{$category->nama}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-sm-2">
				    <a class="btn btn-primary" href="/category/add">+</a>
				</div>
			</div>

            <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Lokasi Barang</label>
                
                <div class="col-sm-8">
                    <input type="text" class="form-control1" id="focusedinput" placeholder="" name="lokasi_barang" value="{{$barang->lokasi}}">
                </div>
            </div>

            <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Stok Barang</label>
                
                <div class="col-sm-8">
                    <input type="number" class="form-control1" id="focusedinput" placeholder="" name="stok_barang" value="{{$barang->stok}}">
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