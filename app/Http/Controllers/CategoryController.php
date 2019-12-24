<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function create()
    {
    	return view('category.create');
    }

    public function store(Request $request)
    {
    	$category = new \App\Category;
    	$category->nama = $request->nama_kategori;
    	$category->save();
    	return redirect()->action('BarangController@create');
    }
}
