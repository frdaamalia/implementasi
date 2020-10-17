<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Barcode;

// use DB;

class barcodeController extends Controller
{
    public function barcode() {
        $barang = Barcode::get(); 
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();
        return view('barcode/barcode')->with(compact('barang'));

    }   
    
    /*public function printBarcode(){ 
        $barang = Barcode::limit(12)->get(); 
        $pdf =  PDF::loadView ('/barcode/barcode_pdf',['barang'=>$barang]); 
        $pdf->setPaper('a4', 'potrait'); 
        return $pdf->stream('barcode/barcode_pdf'); 
    }*/

    public function scannerBarcode(){
        return view('barcode/barcode_scanner');
    }

    public function printBarcode(){ 
        $barang = Barcode::limit(12)->get(); 
        // $pdf =  PDF::loadView ('/barcode/barcodepdf',['barang'=>$barang]); 
        // $pdf->setPaper('a4', 'potrait');         
        $no = 1; 
        $paper_width = 448.82; // 38 mm
        $paper_height = 212.6; // 18 mm
        $paper_size = array(0, 0, $paper_width, $paper_height);
        $pdf =  PDF::loadView  ('/barcode/barcode_pdf',  compact('barang', 'no')); 
        $pdf->setPaper($paper_size); 
        return $pdf->stream('barcode/barcode_pdf');
    }

}
