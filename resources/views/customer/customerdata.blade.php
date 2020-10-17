@extends('admin/index')
@section('konten')

<div class="content-wrapper">
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Customer Data</h4>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>ID Customer</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($customer as $cs)
                          <tr>
                            <td>{{$cs->ID_CUSTOMER}}</td>
                            <td>{{$cs->NAMA}}</td>
                            <td>{{$cs->ALAMAT}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection