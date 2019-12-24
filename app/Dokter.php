<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    //
    protected $fillable = [
    	'nama'
    ];

    public function pemakaians()
    {
    	return $this->hasMany('App\Pemakaian');
    }
}
