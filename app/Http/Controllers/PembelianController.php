<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembelian, App\Supplier, App\Barang, App\Category;
class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pembelians = Pembelian::all();
        return view('pembelian.index', compact('pembelians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $categories = Category::all();
        return view('pembelian.create', compact('suppliers', 'categories'));
    }

    public function store(Request $request)
    {
        $pembelian = new Pembelian;
        $pembelian->tanggal = $request->tanggal;
        $pembelian->supplier_id = $request->supplier_id;
        $pembelian->save();

        $counter = 1;
        $total = 0;
        while (isset($request["id_$counter"]))
        {
            $idBarang = $request["id_$counter"];
            $jumlah = $request["jumlah_$counter"];
            $expire = $request["expire_$counter"];

            $pembelian->barangs()->attach($idBarang, 
                ['jumlah' => $jumlah, 'expire' => $expire, 'sisa' => $jumlah]);

            $barang = Barang::find($idBarang);
            $barang->stok += $jumlah;
            $barang->save();
            $counter++;
        }
        return redirect()->action('PembelianController@index');
    }
    public function storePembelian(Request $request)
    {
        $data = $request->all();
        
        $pembelian = new Pembelian;
        $pembelian->tanggal = $data['tanggal'];
        $pembelian->supplier_id = $request['id_supplier'];
        $pembelian->save();

        $response = [ 'pembelian_id' => $pembelian->id, 'nama_supplier' => $pembelian->supplier->nama, 'tanggal_pembelian' => $pembelian->tanggal];
        return $response;
    }

    public function storeBarang(Request $request)
    {
        $data = $request->all();
        $barang = new Barang;
        $barang->nama = $data['nama_barang'];
        $barang->stok = $data['stok'];
        $expire = $data['tanggal_expire'];        
        return view('pembelian.templatetable', compact('barang', 'expire'));
        /*

        $barang = Barang::find($request->id_barang);        
        $barang->stok += $request->jumlah_barang;
        $barang->save();

        $expire = Expire::where('barang_id', '=', $barang->id)
                ->where('tanggal', '=', $request->tanggal_expire)->first();
        if ($expire == null)
        {
            $expire = new Expire;
            $expire->tanggal = $request->tanggal_expire;
            $expire->jumlah = $request->jumlah_barang;
            $expire->penyimpanan_id = $request->id_penyimpanan;
            $expire->barang_id = $barang->id;
        }
        else
        {
            $expire->jumlah += $request->jumlah_barang;
        }
        $expire->save();
        
        return redirect()->action('PembelianController@index');*/
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
        $pembelian = Pembelian::find($id);
        $barangs = $pembelian->barangs;
        return view('pembelian.show', compact('barangs', 'id'));
    }

    public function editBarang($idPembelian, $idBarang)
    {
        $pembelian = Pembelian::find($idPembelian);
        $barang = $pembelian->barangs()->find($idBarang);
        return view('pembelian.editBarang', compact('pembelian', 'barang'));
    }

    public function storeEditBarang(Request $request)
    {
        $jumlahBaru = $request->jumlah;
        $barang = Pembelian::find($request->id_pembelian)->barangs()->find($request->id_barang);
        $jumlahLama = $barang->pivot->jumlah;
        $barang->pivot->jumlah = $jumlahBaru;
        if ($barang->pivot->jumlah < 0)
            $barang->pivot->jumlah = 0;
        $barang->pivot->expire = $request->expire;
        $barang->pivot->sisa -= $jumlahLama - $jumlahBaru;
        if ($barang->pivot->sisa < 0)
            $barang->pivot->sisa = 0;

        $barang->pivot->save();
        $barang->stok -= $jumlahLama - $jumlahBaru;
        if ($barang->stok < 0)
            $barang->stok = 0;
        
        $barang->save();
        return redirect()->action('PembelianController@show', ['id' => $request->id_pembelian]);
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
        $pembelian = Pembelian::find($id);
        $pembelian->delete();
        return redirect()->action('PembelianController@index');
    }
}
