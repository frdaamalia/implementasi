<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }

    public function customerdata()
    {
        $customer=DB::table('customer')->get();
        return view('customer/customerdata',['customer'=>$customer]);
    }

    public function addcust1(){
        $provinsi = DB::table('provinsi')->pluck("NAMA_PROVINSI","ID_PROVINSI");
        return view('customer/addcust1',compact('provinsi'));
    }

    public function getStates($id) 
    {
        $kota = DB::table('kota')->where("ID_PROVINSI",$id)->pluck("NAMA_KOTA","ID_KOTA");
        return json_encode($kota);
    }

    public function kecamatan($id) 
    {
        $kecamatan = DB::table('kecamatan')->where("ID_KOTA",$id)->pluck("NAMA_KECAMATAN","ID_KECAMATAN");
        return json_encode($kecamatan);
    }
    public function kelurahan($id) 
    {
        $kelurahan = DB::table('kelurahan')->where("ID_KECAMATAN",$id)->pluck("KODEPOS","NAMA_KELURAHAN","ID_KELURAHAN");
        return json_encode($kelurahan);
    }

        public function addcust()
    {
        return view('customer/addcust');
    }

    public function store(Request $request)
    {
        DB::table('customer')->insert([
            'ID_KELURAHAN'  => $request->kelurahan,
            'NAMA'          => $request->nama,
            'ALAMAT'        => $request->alamat
        ]);
        return redirect('customer/customerdata');
        //
    }

}