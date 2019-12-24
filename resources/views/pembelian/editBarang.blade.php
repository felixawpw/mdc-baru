@extends('master')

@section('content')
<h3>EDIT BARANG (ID: {{$barang->id}})</h3>

<div class="tab-content">
    <div class="tab-pane active" id="horizontal-form">
        <form class="form-horizontal" method="post" action="#">
            {{csrf_field()}}
            <input type="hidden" name="id_pembelian" value="{{$pembelian->id}}">
            <input type="hidden" name="id_barang" value="{{$barang->id}}">
            <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Kode Barang</label>
                
                <div class="col-sm-8">
                    <input type="text" class="form-control1" id="focusedinput" placeholder="" name="kode_barang" value="{{$barang->kode}}" disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Nama Barang</label>
                
                <div class="col-sm-8">
                    <input type="text" class="form-control1" id="focusedinput" placeholder="" name="nama_barang"
                    value="{{$barang->nama}}" disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Jumlah</label>
                
                <div class="col-sm-8">
                    <input type="number" class="form-control1" id="focusedinput" placeholder="" name="jumlah"
                    value="{{$barang->pivot->jumlah}}">
                </div>
            </div>

            <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Expire</label>
                
                <div class="col-sm-8">
                    <input type="date" class="form-control1" id="focusedinput" placeholder="" name="expire"
                    value="{{explode(' ', $barang->pivot->expire)[0]}}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <input type="submit" class="btn btn-primary col-sm-12" value="Submit">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection