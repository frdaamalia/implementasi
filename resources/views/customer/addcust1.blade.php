@extends('admin/index')
@section('konten')

<div class="content-wrapper">
<div class="col-lg-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
                    <h4 class="card-title">Add Customer</h4>
                    <p class="card-description"> Data Customer </p>
                    <form form action="CustomerStore" method="post" class="forms-sample">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Nama</label>
                        <input type="text" name="nama" class="form-control" id="name" placeholder="Nama">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Provinsi</label>
                                    <select name="provinsi" class="form-control">
                                        <option value="">Please select</option>
                                        @foreach ($provinsi as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Kabupaten</label>
                                    <select name="kota" class="form-control">
                                        <option value="0">Please select</option>
                                    </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Kecamatan</label>
                                    <select name="kecamatan" class="form-control">
                                        <option value="0">Please select</option>
                                    </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Kodepos</label>
                                    <select name="kelurahan" class="form-control">
                                        <option value="0">Please select</option>
                                    </select>
                      </div>
                              
                              <script type="text/javascript">
                                jQuery(document).ready(function()
                                {
                                        jQuery('select[name="provinsi"]').on('change',function(){
                                           var countryID = jQuery(this).val();
                                           if(countryID)
                                           {
                                              jQuery.ajax({
                                                 url : '../customer/addcust1/getstates/' +countryID,
                                                 type : "GET",
                                                 dataType : "json",
                                                 success:function(data)
                                                 {
                                                    console.log(data);
                                                    jQuery('select[name="kota"]').empty();
                                                    jQuery.each(data, function(key,value){
                                                       $('select[name="kota"]').append('<option value="'+ key +'">'+ value +'</option>');
                                                    });
                                                 }
                                              });
                                           }
                                           else
                                           {
                                              $('select[name="kota"]').empty();
                                           }
                                        });
                                });
                                jQuery(document).ready(function ()
                                {
                                        jQuery('select[name="kota"]').on('change',function(){
                                           var id_kota = jQuery(this).val();
                                           if(id_kota)
                                           {
                                              jQuery.ajax({
                                                 url : '../customer/addcust1/kecamatan/' +id_kota,
                                                 type : "GET",
                                                 dataType : "json",
                                                 success:function(data)
                                                 {
                                                    console.log(data);
                                                    jQuery('select[name="kecamatan"]').empty();
                                                    jQuery.each(data, function(key,value){
                                                       $('select[name="kecamatan"]').append('<option value="'+ key +'">'+ value +'</option>');
                                                    });
                                                 }
                                              });
                                           }
                                           else
                                           {
                                              $('select[name="kecamatan"]').empty();
                                           }
                                        });
                                });
                                jQuery(document).ready(function ()
                                {
                                        jQuery('select[name="kecamatan"]').on('change',function(){
                                           var id_kec = jQuery(this).val();
                                           if(id_kec)
                                           {
                                              jQuery.ajax({
                                                 url : '../customer/addcust1/kelurahan/' +id_kec,
                                                 type : "GET",
                                                 dataType : "json",
                                                 success:function(data)
                                                 {
                                                    console.log(data);
                                                    jQuery('select[name="kelurahan"]').empty();
                                                    jQuery.each(data, function(key,value){
                                                       $('select[name="kelurahan"]').append('<option value="'+ key +'">'+ value +' - ' + key +'</option>');
                                                    });
                                                 }
                                              });
                                           }
                                           else
                                           {
                                              $('select[name="kelurahan"]').empty();
                                           }
                                        });
                                });
                            </script>                      
                              <div class="form-actions form-group">
                            <label for="exampleTextarea1">Foto</label>                            
                                <div class="row">
                                    <div class="col-sm-6">
                                        <canvas id="myCanvas2" width="640" height="480" style="border:1px solid #000000;">
                                            <input type="hidden" id="foto" name="foto">
                                    </div>
                                    <div class="col-sm-6" text-right>
                                            <button type="button" class="btn mdi mdi-camera" data-toggle="modal" data-target="#largeModal"></button>
                                    </div>
                                </div>
                            </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>

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
                                    Browser anda tidak mendukung.</video>
                                </div>
                                <div class="col-sm-6" text-right>
                                    <canvas id="myCanvas" width="640" height="480" style="border:1px solid #000000;"></canvas>
                                    <button type="button" class="btn btn-primary" onclick="takeSnapshot()">Ambil Foto</button>
                                </div>
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
                    </div>
                </div>
</div>
</div></div>

@endsection
