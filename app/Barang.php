<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
 	protected $fillable = [
        'nama', 'stok'
    ];

    public function pemakaians()
    {
    	return $this->hasMany('App\Pemakaian');
    }

    public function pembelians()
    {
    	return $this->belongsToMany('App\Pembelian')->withPivot('jumlah', 'expire', 'sisa');
    }

    public function expires()
    {
    	return $this->hasMany('App\Expire');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
