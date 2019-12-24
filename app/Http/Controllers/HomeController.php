<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB, Carbon\Carbon;
use App\Barang, App\Dokter, App\Pemakaian, App\Penyimpanan, App\Expire;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
        $dokters = Dokter::all();
        return view('home', compact('barangs', 'dokters'));
    }

    
    public function cetakLaporanStok()
    { 
        $input = explode('-',Input::get('bulan'));
        $tahun = $input[0];
        $bulan = (int)$input[1];

        $dokters = Dokter::all();
        $tambahStok = Pemakaian::where('tanggal', '>=', "$tahun-".$bulan."-1 00:00:00")->get();
        $pemakaiansBulanIni = Pemakaian::whereYear('tanggal', '=', $tahun)->whereMonth('tanggal', '=', $bulan)->get();
        $allBarang = Barang::all();

        $barangs = array();
        foreach($allBarang as $barang)
        {
            $barangs[$barang->id] = $barang;            
        }

        foreach($tambahStok as $pemakaian)
        {
            $barang = $pemakaian->barang;
            $barangs[$barang->id]->stok += $pemakaian->jumlah;
        }
        return view('report.pemakaian', compact('barangs', 'dokters', 'pemakaiansBulanIni'));
    }

    public function test()
    {
        $pemakaians = Pemakaian::select('jumlah', 'tanggal')
            ->get()
            ->groupBy(function($val) {
                return Carbon::parse($val->tanggal)->format('m');
            });
        echo $pemakaians;
    }
}
