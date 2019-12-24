<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth'])->group(function(){
	Route::get('/', 'HomeController@index')->name('home');

	Route::get('/supplier', 'SupplierController@index')->name('supplier_all');
	Route::get('/supplier/show/{id}', 'SupplierController@show');
	Route::get('/supplier/add', 'SupplierController@create')->name('supplier_create');
	Route::post('/supplier/add', 'SupplierController@store');
	Route::get('/supplier/edit/{id}', 'SupplierController@edit');
	Route::post('/supplier/edit/{id}', 'SupplierController@update');
	Route::get('/supplier/delete/{id}', 'SupplierController@destroy');

	Route::get('/barang', 'BarangController@index')->name("barang_all");
	Route::get('/barang/show/{id}', 'BarangController@show');
	Route::get('/barang/add', 'BarangController@create')->name('barang_create');
	Route::post('/barang/add', 'BarangController@store');
	Route::get('/barang/edit/{id}', 'BarangController@edit');
	Route::post('/barang/edit/{id}', 'BarangController@update');
	Route::get('/barang/delete/{id}', 'BarangController@destroy');

	Route::get('/dokter', 'DokterController@index')->name("dokter_all");
	Route::get('/dokter/show/{id}', 'DokterController@show');
	Route::get('/dokter/add', 'DokterController@create')->name('dokter_create');
	Route::post('/dokter/add', 'DokterController@store');
	Route::get('/dokter/edit/{id}', 'DokterController@edit');
	Route::post('/dokter/edit/{id}', 'DokterController@update');
	Route::get('/dokter/delete/{id}', 'DokterController@destroy');

	Route::get('/pemakaian', 'PemakaianController@index')->name('pemakaian_all');
	Route::get('/pemakaian/show/{id}', 'PemakaianController@show');
	Route::get('/pemakaian/add', 'PemakaianController@create')->name('pemakaian_create');
	Route::post('/pemakaian/add', 'PemakaianController@store');
	Route::get('/pemakaian/edit/{id}', 'PemakaianController@edit');
	Route::post('/pemakaian/edit/{id}', 'PemakaianController@update');
	Route::get('/pemakaian/delete/{id}', 'PemakaianController@destroy');

	Route::get('/pembelian/show/{id}', 'PembelianController@show');
	Route::get('/pembelian/edit/{id}', 'PembelianController@edit');
	Route::post('/pembelian/edit/{id}', 'PembelianController@update');
	Route::get('/pembelian', 'PembelianController@index')->name('pembelian_all');
	Route::get('/pembelian/add', 'PembelianController@create')->name('pembelian_create');
	Route::post('/pembelian/add', 'PembelianController@store');
	Route::get('/pembelian/barang/edit/{idPembelian}/{idBarang}', 'PembelianController@editBarang');
	Route::post('/pembelian/barang/edit/{idPembelian}/{idBarang}', 'PembelianController@storeEditBarang');
	Route::post('/pembelian/add/step1', 'PembelianController@storePembelian');
	Route::post('/pembelian/add/step2', 'PembelianController@storeBarang');

	Route::get('/category/add', 'CategoryController@create');
	Route::post('/category/add', 'CategoryController@store');

	Route::get('/pdf/stok', 'HomeController@cetakLaporanStok');

	Route::get('/test', 'PemakaianController@showYearly');

	Route::get('/barang/json', 'BarangController@json');

	//Ajax
	Route::get('/ajax/barangByExpiryDate', 'AjaxController@barangByExpiryDate')->name('ajax_expire');
	Route::get('/ajax/barang/showMonthly', 'PemakaianController@showMonthly');
	Route::get('/ajax/barang/showYearly', 'PemakaianController@showYearly');
	Route::get('/ajax/expire/hariini', 'AjaxController@expireHariIni');
	Route::get('/ajax/expire/bulanini', 'AjaxController@expireBulanIni');
	});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
