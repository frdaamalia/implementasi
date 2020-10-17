@extends('admin/index')
@section('konten')

<div class="content-wrapper">
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Barang</h4>
                    <div class="table-responsive">
                      <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID BARANG</th>
                                        <th>NAMA BARANG</th>
                                        <th class="text-center">Barcode</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barang as $b)
                                    <tr>
                                        <td>{{$b->ID_Barang}}</td>
                                        <td>{{$b->Nama}}</td>
                                        <td class="text-center p-t-b-40">
                                        <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($b->ID_Barang, 'C128')}}" alt="barcode" />
                                            <br/>
                                            {{$b->ID_Barang}}
                                        </td>
                                        <td class="text-center">
                                        
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="barcode_pdf">
                                        <button type="button" class="btn btn-primary mr-2">
                                            CETAK BARCODE
                                        </button>
                                        </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    
@endsection


