@extends('admin/index')
@section('konten')


<div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <h4 class="card-title">Customer Data</h4>
            <p class="card-description"> Personal Info </p>
          </div>
        </div>
        <div class="row tm-edit-product-row">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <form action="" method="post" class="tm-edit-product-form">
              <div class="form-group mb-3">
                <label for="name">Product Name</label>
                  <input id="name" name="name" type="text" value="Lorem Ipsum Product" class="form-control validate">
              </div>
              <div class="form-group mb-3">
                <label for="description">Description</label>
                  <textarea class="form-control validate tm-small" rows="5" required="">Lorem ipsum dolor amet gentrify glossier locavore messenger bag chillwave hashtag irony migas wolf kale chips small batch kogi direct trade shaman.</textarea>
              </div>
              <div class="form-group mb-3">
                <label for="category">Category</label>
                  <select class="custom-select tm-select-accounts" id="category">
                    <option>Select category</option>
                    <option value="1" selected="">New Arrival</option>
                    <option value="2">Most Popular</option>
                    <option value="3">Trending</option>
                  </select>
              </div>
              <div class="row">
              <div class="form-group mb-3 col-xs-12 col-sm-6">
                <label for="expire_date">Expire Date</label>
                  <input id="expire_date" name="expire_date" type="text" value="22 Oct, 2020" class="form-control validate hasDatepicker" data-large-mode="true">
              </div>
              <div class="form-group mb-3 col-xs-12 col-sm-6">
                <label for="stock">Units In Stock</label>
                  <input id="stock" name="stock" type="text" value="19,765" class="form-control validate">
              </div>
            </div>
                          <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Update Now</button>
              </div>    
            </form>
          </div>

              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="largeModalLabel">Ambil Foto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <video autoplay="" id="video-webcam" class="border w-100">
                                    Browsermu tidak mendukung bro, upgrade donk!</video>
                                </div>
                                <div class="col-sm-6" text-right>
                                    <canvas id="myCanvas" width="640" height="480" style="border:1px solid #000000;"></canvas>
                                    <button type="button" class="btn btn-primary" onclick="takeSnapshot()">Ambil Foto</button>
                                </div>
                            </div>
                                
                        </div>
                        <script type="text/javascript">
                            // seleksi elemen video
                            var video = document.querySelector("#video-webcam");

                            // minta izin user
                            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

                            // jika user memberikan izin
                            if (navigator.getUserMedia) {
                                // jalankan fungsi handleVideo, dan videoError jika izin ditolak
                                navigator.getUserMedia({ video: true }, handleVideo, videoError);
                            }

                            // fungsi ini akan dieksekusi jika  izin telah diberikan
                            function handleVideo(stream) {
                                video.srcObject = stream;
                            }

                            // fungsi ini akan dieksekusi kalau user menolak izin
                            function videoError(e) {
                                // do something
                                alert("Izinkan menggunakan webcam untuk demo!")
                            }

                            function takeSnapshot() {
                                

                                // ambil ukuran video
                                var width = video.offsetWidth
                                        , height = video.offsetHeight;

                                // buat elemen canvas
                                canvas = document.getElementById("myCanvas");
                                canvas.width = width;
                                canvas.height = height;

                                // ambil gambar dari video dan masukan 
                                // ke dalam canvas
                                context = canvas.getContext('2d');
                                context.drawImage(video, 0, 0, width, height);
                            }

                            function saveSnapshot() {
                                var img = document.createElement('img');

                                // ambil ukuran video
                                var width = video.offsetWidth
                                        , height = video.offsetHeight;

                                // buat elemen canvas
                                canvas1 = document.getElementById("myCanvas2");
                                canvas1.width = width;
                                canvas1.height = height;
                                foto = document.getElementById("myCanvas");

                                context = canvas1.getContext('2d');
                                context.drawImage(foto, 0, 0, width, height);

                                img.src = canvas1.toDataURL('image/png');
                                document.getElementById("foto").value=img;
                            }
                        </script>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary"  data-dismiss="modal" onclick="saveSnapshot()">Simpan Foto</button>
                        </div>
                <div class="custom-file mt-3 mb-3">
                  <input id="fileInput" type="file" style="display:none;">
                  <input type="button" class="btn btn-primary btn-block mx-auto" value="CHANGE IMAGE NOW" onclick="document.getElementById('fileInput').click();">
                </div>
              </div>


            </div>
          </div>
        </div>
            
        </div>            
      </div>
    </div>
  </div>
</div>

@endsection




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
                                            Cetak Pdf
                                        </button>
                                        </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    
@endsection