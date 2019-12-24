<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    //
    public function barangs()
    {
    	return $this->belongsToMany('App\Barang')->withPivot('jumlah', 'expire', 'sisa');
    }

    public function supplier()
    {
    	return $this->belongsTo('App\Supplier');
    }
}
