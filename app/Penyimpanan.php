<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Penyimpanan extends Model
{
    //
    protected $fillable = [
        'nama'
    ];

    public function expires()
    {
        return $this->hasMany('App\Expire');
    }

    public function getBarangs()
    {
        $id = $this->id;
        $penyimpanan = 
            DB::table('barang_expire')
            ->join('barangs', 'barangs.id', '=', 'barang_expire.barang_id')
            ->join('expires', 'expires.id', '=', 'barang_expire.expire_id')
            ->join('penyimpanans', 'penyimpanans.id', '=', 'barang_expire.penyimpanan_id')
            ->where('penyimpanan_id', '=', $id)
            ->select('barangs.*', 'expires.id as id_expire', 'expires.tanggal', 
                    'penyimpanans.id as id_penyimpanan', 'penyimpanans.nama as nama_penyimpanan')
            ->get();
        return $penyimpanan;
    }
}
