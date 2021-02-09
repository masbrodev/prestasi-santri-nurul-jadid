@extends('layouts.app')

@section('content_header')
<h1>Formulir</h1>
@stop

@section('content')
@section('plugins.LoadingOverlay', true)
@section('plugins.Toastr', true)
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" alt="fotosantri" id="fotosantri" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk9/72HwAD8gJJcSrszQAAAABJRU5ErkJggg==">
                        </div>

                        <h3 class="profile-username text-center" id="nama_lengkap"></h3>

                        <p class="text-muted text-center" id="niup"></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="float-right">13,287</a>
                            </li>
                        </ul>

                        <a href="#" id="link-pedatren" class="btn btn-primary btn-block"><b>PEDATREN</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Biodata</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Tempat & Tangal Lahir</strong>
                        <p class="text-muted" id="ttl"></p>
                        <hr>

                        <strong><i class="fas fa-book mr-1"></i> Pendidikan</strong>

                        <p class="text-muted">
                            <span class="text-muted" id="lembaga"></span>
                            <br>
                            <span class="text-muted" id="jurusan"></span>
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                        <p class="text-muted" id="alamat"></p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Domisili</strong>

                        <p class="text-muted">
                            <span class="tag tag-danger" id="wilayah"></span>
                            <br>
                            <span class="tag tag-success" id="blok"></span>
                            <br>
                            <span class="tag tag-info" id="kamar"></span>
                        </p>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#prestasi" data-toggle="tab">Prestasi</a></li>
                            <li class="nav-item"><a class="nav-link" href="#keilmuan" data-toggle="tab">Keilmuan</a></li>
                            <li class="nav-item"><a class="nav-link" href="#prestasi" data-toggle="tab">Prestasi</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="prestasi">

                                <div class="card-tools">
                                    <ul class="pagination pagination-sm float-left">
                                        <button type="button" class="btn btn-outline-primary" data-toggle="collapse" data-target="#tambah-prestasi" aria-expanded="false" aria-controls="tambah-prestasi">Tambah Prestasi</button>
                                    </ul>
                                </div>
                                <div class="collapse" id="tambah-prestasi">
                                    <div class="card card-body">
                                        <form class="form-horizontal" action="{{ URL::to('tambah-prestasi')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label>Prestasi</label>
                                                <input type="text" class="form-control" placeholder="Masukkan Nama Prestasi" name="nama_prestasi" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                                <input type="hidden" class="form-control" id="uuid" name="niup" value="">
                                                <br>
                                                <label>Tahun</label>
                                                <input type="text" class="form-control" placeholder="Masukkan Tahun" name="tahun" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary float-sm-left">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="table-kategori">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Nama Prestasi</th>
                                                <th>Tahun</th>
                                                <th style="width: 200px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($prestasi as $r)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $r->nama_prestasi }}</td>
                                                <td>{{ $r->tahun}}</td>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#edit-kat{{ $loop->iteration }}">Edit</button>
                                                            <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{URL::to('hapus-prestasi/'.$r->id)}}">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="keilmuan">
                                <div class="card-tools">
                                    <ul class="pagination pagination-sm float-left">
                                        <button type="button" class="btn btn-outline-primary" data-toggle="collapse" data-target="#tambah-prestasi" aria-expanded="false" aria-controls="tambah-prestasi">Tambah Prestasi 2</button>
                                    </ul>
                                </div>
                                <div class="collapse" id="tambah-prestasi">
                                    <div class="card card-body">
                                        <form class="form-horizontal" action="{{ URL::to('tambah-prestasi')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label>Prestasi</label>
                                                <input type="text" class="form-control" placeholder="Masukkan Nama Prestasi" name="nama_prestasi" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                                <input type="hidden" class="form-control" id="uuid" name="niup" value="">
                                                <br>
                                                <label>Tahun</label>
                                                <input type="text" class="form-control" placeholder="Masukkan Tahun" name="tahun" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary float-sm-left">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="table-kategori">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Nama Prestasi</th>
                                                <th>Tahun</th>
                                                <th style="width: 200px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($prestasi as $r)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $r->nama_prestasi }}</td>
                                                <td>{{ $r->tahun}}</td>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#edit-kat{{ $loop->iteration }}">Edit</button>
                                                            <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{URL::to('hapus-prestasi/'.$r->id)}}">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="prestasi">
                                <form class="form-horizontal" action="{{ URL::to('tambah-prestasi')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Prestasi</label>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama Prestasi" name="nama_prestasi">
                                        <input type="hidden" class="form-control" id="uuid" name="niup" value="">
                                        <br>
                                        <label>Tahun</label>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama tahun" name="tahun">
                                        <br>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


@foreach($prestasi as $r)
<!-- Edit Prestasi -->
<div class="modal fade" id="edit-kat{{ $loop->iteration }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Prestasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('edit-prestasi/'.$r->id)}}" method="post">
                    @csrf
                    <label>Sub Peminatan</label>
                    <input type="text" class="form-control" value="{{ $r->nama_prestasi }}" name="nama_prestasi">
                    <br>
                    <label>Tahun</label>
                    <input type="text" class="form-control" value="{{ $r->tahun }}" name="tahun">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning">Simpan</button>
            </div>
            </form>
        </div>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal -->
@endforeach

@endsection

@section('adminlte_js')
{!! Toastr::message() !!}
<script>
    $(document).ready(function() {
        $.LoadingOverlay("show", {
            image: "",
            fontawesome: "fa fa-cog fa-spin"
        });
        $.ajax({ //create an ajax request to display.php
            type: "GET",
            url: "{{URL::to('api/'.Request::path())}}",
            success: function(data) {
                $.LoadingOverlay("hide");
                var d = data.santri
                var lh = new Date(d.tanggal_lahir)
                var foto = "{{URL::to('api/foto/')}}" + d.fotodiri.small

                if (foto !== "http://localhost:8000/api/foto/img/default/default_no_face_s.jpg") {
                    $('#fotosantri').attr('src', foto);
                }
                $("#nama_lengkap").html(d.nama_lengkap);
                $("#niup").html(d.warga_pesantren.niup);
                $("#niup").html(d.warga_pesantren.niup);
                $("#lembaga").html(d.pendidikan.slice(-1)[0].lembaga);
                $("#jurusan").html(d.pendidikan.slice(-1)[0].jurusan);
                $("#alamat").html(d.kecamatan + ', ' + d.kabupaten + ', ' + d.provinsi);
                $("#ttl").html(d.tempat_lahir + ', </br>' + lh.getDate() + "-" + (lh.getMonth() + 1) + "-" + lh.getFullYear());
                $("#wilayah").html(d.domisili_santri.slice(-1)[0].wilayah);
                $("#blok").html("Blok: " + d.domisili_santri.slice(-1)[0].blok);
                $("#kamar").html("Kamar: " + d.domisili_santri.slice(-1)[0].kamar);
                $("#link-pedatren").attr('href', 'https://www.nuruljadid.app/formulir/' + d.uuid);
                $("#uuid").attr('value', d.uuid);
                console.log(d.domisili_santri.slice(-1)[0].kamar);
            }
        });
    });
</script>
@endsection