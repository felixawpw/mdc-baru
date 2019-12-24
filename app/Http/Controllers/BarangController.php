<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang, App\Dokter, App\Pembelian, App\Category, App\Supplier;

class BarangController extends Controller
{
    public function json()
    {
        $barangs = Barang::all();
        foreach ($barangs as $barang)
        {
            $barang->namakategori = $barang->category->nama;
        }
        return $barangs;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $dokters = Dokter::all();
        $suppliers = Supplier::all();
        return view('barang.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $kategori = Category::find($request->id_kategori);
        if ($kategori == null)
        {
            $kategori = new Categori;
            $kategori->nama = $request->id_kategori;
            $kategori->save();
        }
        */
        $barang = new Barang;
        $barang->kode = $request->kode_barang;
        $barang->nama = $request->nama_barang;
        $barang->lokasi = $request->lokasi_barang;
        $barang->stok = $request->stok_barang;
        $barang->category_id = $request->id_kategori;
        $barang->save();
/*
        $pembelian = new Pembelian;
        $pembelian->supplier_id = $request->id_supplier;
        $pembelian->save();

        $barang->pembelians()->save($pembelian, ['jumlah' => $request->jumlah]);
*/
        return redirect()->route('barang_all');
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
        $barang = Barang::find($id);
        $expires = $barang->expires;

        return view('barang.show', compact('barang' , 'expires'));
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
        $barang = Barang::find($id);
        $categories = Category::all();
        return view('barang.edit', compact('barang', 'categories'));
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
        $barang = Barang::find($id);
        $barang->kode = $request->kode_barang;
        $barang->nama = $request->nama_barang;
        $barang->lokasi = $request->lokasi_barang;
        $barang->stok = $request->stok_barang;
        $barang->category_id = $request->id_kategori;

        $barang->save();
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
        $barang = Barang::find($id);
        $barang->delete();
        return redirect()->action('BarangController@index');
    }
}
