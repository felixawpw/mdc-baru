<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Expire, App\Barang, Carbon\Carbon, App\Pembelian;

class AjaxController extends Controller
{
    //

    public function barangByExpiryDate()
    {	
    	$tanggal = Input::get('tanggal', 0);

    	$date = (int)date("d");
    	$month = (int)date('m');
    	$year = (int)date("Y");    	

        $format = date_create("$year-$month-$date");
    	date_add($format, date_interval_create_from_date_string("$tanggal days"));

        $uppBound = date_format($format, 'Y-m-d');
        
        $temps = Pembelian::all();/*Barang::whereHas('pembelians', function($query) use ($date, $month, $year, $uppBound) {
            $query->where('expire', '>=', "$year-$month-$date 00:00:00")
                ->where('expire', '<=', "$uppBound 00:00:00");
        })->get();*/
        $barangs = array();
        foreach ($temps as $pembelian)
        {
            $barangs[] = $pembelian->barangs()->wherePivot('expire', '>=', "$year-$month-$date 00:00:00")
                ->wherePivot('expire', '<=', "$uppBound 00:00:00")->get();
        }

    	//$expires = Expire::where('tanggal', '>=', "$year-$month-$date 00:00:00")
    	//		->where('tanggal', '<=', "$year-$month-$uppBound 00:00:00")
    	//		->get();
        return view('template.barangByExpire', compact('barangs'));
    }

    public function expireHariIni()
    {
        $temps = Pembelian::all();
        $barangs = array();
        foreach ($temps as $pembelian)
        {
            $barangs[] = $pembelian->barangs()->wherePivot('expire', '=', date("Y-m-d 00:00:00"))->get();
        }
        return view('template.expireHariIni', compact('barangs'));
    }

    public function expireBulanIni()
    {
        $expires = Expire::whereMonth('tanggal', '=', date('m'))->get();

        $temps = Pembelian::all();
        $barangs = array();
        foreach ($temps as $pembelian)
        {
            $barangs[] = $pembelian->barangs()->wherePivot('expire', 'like', '%-'.date('m').'-%')->get();
        }

        return view('template.expireBulanIni', compact('barangs'));
    }

    public function barangYangExpire($barangs)
    {
        $results;
    }
}
