<!DOCTYPE html> 
<html> 
<head> 
    <title>Cetak Barcode</title> 
</head> 
<body> 
    <table  width="100%"> 
    <tr> 
 
       @foreach($barang as $br) 
       <td align="center"  style="border: lpx solid #ccc"> 
        {{$br->Nama}}<br><br>
       <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
       $br->id_barang, 'C128')}}" height="60" width="180">
      <br>{{$br->ID_Barang }}
      </td>
      @if ($no++ %3 ==0)
           </tr><tr>
      @endif
     @endforeach
    </tr>
   </tsble>
  </body>
</html>