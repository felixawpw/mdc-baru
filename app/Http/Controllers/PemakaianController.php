<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, Illuminate\Support\Facades\Input;
use Carbon\Carbon;

use App\Pemakaian, App\Dokter, App\Barang, App\Expire;

class PemakaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pemakaians = Pemakaian::all();
        return view('pemakaian.index', compact('pemakaians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $dokters = Dokter::all();
        $barangs = Barang::all();
        return view('pemakaian.create', compact('dokters', 'barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $pemakaian = new Pemakaian;
        $pemakaian->tanggal = $request->tanggal;
        $pemakaian->dokter_id = $request->id_dokter;
        $pemakaian->barang_id = $request->id_barang;
        $pemakaian->jumlah = $request->jumlah_barang;
        $pemakaian->save();

        $barang = Barang::find($request->id_barang);
        $barang->stok -= $request->jumlah_barang;
        $barang->save();

        $expire = Expire::where('barang_id', '=', $barang->id)
                ->where('jumlah', '>', 0)
                ->orderBy('tanggal', 'asc')->first();
        $expire->jumlah -= $pemakaian->jumlah;
        $expire->save();
        
        return redirect()->action('PemakaianController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pemakaian = Pemakaian::find($id);
        $dokters = Dokter::all();
        $barangs = Barang::all();
        return view('pemakaian.edit', compact('pemakaian', 'dokters', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pemakaian = Pemakaian::find($id);
        $pemakaian->tanggal = $request->tanggal;
        $pemakaian->dokter_id = $request->id_dokter;
        $pemakaian->barang_id = $request->id_barang;
        $pemakaian->jumlah = $request->jumlah_barang;
        $pemakaian->save();
        return redirect()->route('pemakaian_all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pemakaian = Pemakaian::find($id);
        $pemakaian->delete();
        return redirect()->action('PemakaianController@index');
    }

    public function showMonthly()
    {
        $tahun = Input::get('tahun', date('Y'));
        $bulan = Input::get('bulan', date('m'));
        $idBarang = Input::get('id_barang', 0);

        $pemakaians = Pemakaian::select('*')
            ->whereYear('tanggal', '=', $tahun)
            ->whereMonth('tanggal', '=', $bulan)
            ->get()
            ->groupBy(function($val) {
                return Carbon::parse($val->tanggal)->format('d');
            });
    }

    public function showYearly()
    {
        $tahun = Input::get('tahun', date('Y'));
        $bulan = Input::get('bulan', date('m'));
        $idBarang = Input::get('id_barang', 0);

/*
        $pemakaians = Pemakaian::selectRaw('tanggal, sum(jumlah) as sum')->whereYear('tanggal', '=', $tahun)
            ->get()
            ->groupBy(function($val) {
                return Carbon::parse($val->tanggal)->format('m');
            });
*/
        $pemakaians = Pemakaian::selectRaw('sum(jumlah) as totalPemakaian, MONTH(tanggal) as bulan')
                ->whereYear('tanggal', '=', $tahun)
                ->groupBy('bulan')->get();
        return view('template.pemakaianbarang', compact('pemakaians'));
    }
}
