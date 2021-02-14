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
                                <b>Prestasi</b> <a class="float-right">{{ count($prestasi) }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Keilmuan</b> <a class="float-right">{{ count($ilmu) }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Skill</b> <a class="float-right">{{ count($skill) }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Organisasi</b> <a class="float-right">{{ count($organ) }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Ekstrakurikuler</b> <a class="float-right">{{ count($eks) }}</a>
                            </li>
                        </ul>

                        <a href="#" id="link-pedatren" class="btn btn-primary btn-block" target="_blank"><b>PEDATREN</b></a>
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
                            <li class="nav-item"><a class="nav-link" href="#skill" data-toggle="tab">Skill</a></li>
                            <li class="nav-item"><a class="nav-link" href="#organ" data-toggle="tab">Organisasi</a></li>
                            <li class="nav-item"><a class="nav-link" href="#eks" data-toggle="tab">Ekstrakurikuler</a></li>
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
                                        <button type="button" class="btn btn-outline-primary" data-toggle="collapse" data-target="#tambah-ilmu" aria-expanded="false" aria-controls="tambah-ilmu">Tambah Peminatan Keilmuan</button>
                                    </ul>
                                </div>
                                <div class="collapse" id="tambah-ilmu">
                                    <div class="card card-body">
                                        <form class="form-horizontal" action="{{ URL::to('tambah-keilmuan')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="uuid" name="niup" value="">
                                                <label>Peminatan Keilmuan</label>
                                                <select class="form-control" name="peminatan_id" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                                    @foreach($peminatan->where('nama', 'Keilmuan') as $k)
                                                    <option value="{{ $k->id }}">{{ $k->jurusan }} / {{ $k->sub }}</option>
                                                    @endforeach
                                                </select>
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
                                                <th>Jurusan</th>
                                                <th>Sub</th>
                                                <th style="width: 200px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ilmu as $r)
                                            @if(!empty($r->ilmu))
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $r->ilmu->jurusan }}</td>
                                                <td>{{ $r->ilmu->sub }} / {{ $r->id}}</td>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#edit-ilmu{{ $loop->iteration }}">Edit</button>
                                                            <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{URL::to('hapus-keilmuan/'.$r->id)}}">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="skill">
                                <div class="card-tools">
                                    <ul class="pagination pagination-sm float-left">
                                        <button type="button" class="btn btn-outline-primary" data-toggle="collapse" data-target="#tambah-skill" aria-expanded="false" aria-controls="tambah-skill">Tambah Peminatan Skill</button>
                                    </ul>
                                </div>
                                <div class="collapse" id="tambah-skill">
                                    <div class="card card-body">
                                        <form class="form-horizontal" action="{{ URL::to('tambah-skill')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="uuid" name="niup" value="">
                                                <label>Peminatan Skill</label>
                                                <select class="form-control" name="peminatan_id" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                                    @foreach($peminatan->where('nama', 'Skill') as $k)
                                                    <option value="{{ $k->id }}">{{ $k->jurusan }} / {{ $k->sub }}</option>
                                                    @endforeach
                                                </select>
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
                                                <th>Jurusan</th>
                                                <th>Sub</th>
                                                <th style="width: 200px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($skill as $r)
                                            @if(!empty($r->skill))
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $r->skill->jurusan }}</td>
                                                <td>{{ $r->skill->sub }} / {{ $r->id}}</td>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#edit-skill{{ $loop->iteration }}">Edit</button>
                                                            <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{URL::to('hapus-skill/'.$r->id)}}">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="organ">
                                <div class="card-tools">
                                    <ul class="pagination pagination-sm float-left">
                                        <button type="button" class="btn btn-outline-primary" data-toggle="collapse" data-target="#tambah-organisasi" aria-expanded="false" aria-controls="tambah-organisasi">Tambah Jejak Organisasi</button>
                                    </ul>
                                </div>
                                <div class="collapse" id="tambah-organisasi">
                                    <div class="card card-body">
                                        <form class="form-horizontal" action="{{ URL::to('tambah-jorganisasi')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="uuid" name="niup" value="">
                                                <label>Kategori</label>
                                                <select class="form-control" name="kategori" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                                    <option value="Asrama">Asrama</option>
                                                    <option value="Lembaga">Lembaga</option>
                                                    <option value="Pesantren">Pesantren</option>
                                                    <option value="Kedaerahan">Kedaerahan</option>
                                                    <option value="Ekstra">Ekstra</option>
                                                    <option value="Independen">Independen</option>
                                                    <option value="Lain-lain">Lain-lain</option>
                                                </select>
                                                <br>
                                                <label>Nama Organisasi</label>
                                                <input type="text" class="form-control" placeholder="Masukkan Nama Organisasi" name="nama_organisasi" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                                <br>
                                                <label>Masa Jabatan</label>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <select class="form-control" name="jb1" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                                            {{ $last= date('Y')-10 }}
                                                            {{ $now = date('Y') }}

                                                            @for ($i = $now; $i >= $last; $i--)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <i class="fa fa-window-minimize" aria-hidden="true"></i>
                                                    <div class="col-4">
                                                        <select class="form-control" name="jb2" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                                            {{ $last= date('Y')-10 }}
                                                            {{ $now = date('Y') }}

                                                            @for ($i = $now; $i >= $last; $i--)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <label>Masa Keanggotaan</label>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <select class="form-control" name="gk1" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                                            {{ $last= date('Y')-10 }}
                                                            {{ $now = date('Y') }}

                                                            @for ($i = $now; $i >= $last; $i--)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <i class="fa fa-window-minimize" aria-hidden="true"></i>
                                                    <div class="col-4">
                                                        <select class="form-control" name="gk2" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                                            {{ $last= date('Y')-10 }}
                                                            {{ $now = date('Y') }}

                                                            @for ($i = $now; $i >= $last; $i--)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
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
                                                <th>Kategori</th>
                                                <th>Organisasi</th>
                                                <th style="width: 200px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($organ as $r)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $r->kategori }}</td>
                                                <td>{{ $r->nama_organisasi }} / {{ $r->id}}</td>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#edit-jorgan{{ $loop->iteration }}">Edit</button>
                                                            <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{URL::to('hapus-jorganisasi/'.$r->id)}}">Hapus</a>
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

                            <div class="tab-pane" id="eks">
                                <div class="card-tools">
                                    <ul class="pagination pagination-sm float-left">
                                        <button type="button" class="btn btn-outline-primary" data-toggle="collapse" data-target="#tambah-skill" aria-expanded="false" aria-controls="tambah-skill">Tambah Jejak Ekstrakurikuler</button>
                                    </ul>
                                </div>
                                <div class="collapse" id="tambah-skill">
                                    <div class="card card-body">
                                        <form class="form-horizontal" action="{{ URL::to('tambah-eks')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="uuid" name="niup" value="">
                                                <label>Asrama</label>
                                                <input type="text" class="form-control" placeholder="Masukkan Asrama" name="asrama" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                                <br>
                                                <label>Kategori</label>
                                                <select class="form-control" name="bidang" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                                    <option value="Keilmuan">Keilmuan</option>
                                                    <option value="Kesenian">Kesenian</option>
                                                    <option value="Olahraga">Olahraga</option>
                                                    <option value="Kepanduan">Kepanduan</option>
                                                    <option value="Keterampilan">Keterampilan</option>
                                                </select>
                                                <br>
                                                <label>Sub Bidang</label>
                                                <input type="text" class="form-control" placeholder="Masukkan Nama Organisasi" name="sub_bidang" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                                <br>
                                                <label>Masa Keanggotaan</label>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <select class="form-control" name="gk1" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                                            {{ $last= date('Y')-10 }}
                                                            {{ $now = date('Y') }}

                                                            @for ($i = $now; $i >= $last; $i--)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <i class="fa fa-window-minimize" aria-hidden="true"></i>
                                                    <div class="col-4">
                                                        <select class="form-control" name="gk2" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                                            {{ $last= date('Y')-10 }}
                                                            {{ $now = date('Y') }}

                                                            @for ($i = $now; $i >= $last; $i--)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
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
                                                <th>Jurusan</th>
                                                <th>Bidang</th>
                                                <th>Sub</th>
                                                <th style="width: 200px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($eks as $r)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $r->asrama }}</td>
                                                <td>{{ $r->bidang }}</td>
                                                <td>{{ $r->sub_bidang }} / {{ $r->id}}</td>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#edit-eks{{ $loop->iteration }}">Edit</button>
                                                            <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{URL::to('hapus-eks/'.$r->id)}}">Hapus</a>
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

@foreach($ilmu as $r)
@if(!empty($r->ilmu))
<!-- Edit Ilmu -->
<div class="modal fade" id="edit-ilmu{{ $loop->iteration }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Peminatan Keilmuan Santri</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('edit-keilmuan/'.$r->id)}}" method="post">
                    @csrf
                    <label>Peminatan Keilmuan</label>
                    <select class="form-control" name="peminatan_id" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                        @foreach($peminatan->where('nama', 'Keilmuan') as $k)
                        <option {{ $r->ilmu->sub == $k->sub ? 'selected':'' }} value="{{ $k->id }}">{{ $k->jurusan }} / {{ $k->sub }}</option>
                        @endforeach
                    </select>
                    <br>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal -->
@endif
@endforeach

@foreach($skill as $r)
@if(!empty($r->skill))
<!-- Edit Skill -->
<div class="modal fade" id="edit-skill{{ $loop->iteration }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Peminatan Skill Santri</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('edit-skill/'.$r->id)}}" method="post">
                    @csrf
                    <label>Peminatan Skill</label>
                    <select class="form-control" name="peminatan_id" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                        @foreach($peminatan->where('nama', 'Skill') as $k)
                        <option {{ $r->skill->sub == $k->sub ? 'selected':'' }} value="{{ $k->id }}">{{ $k->jurusan }} / {{ $k->sub }}</option>
                        @endforeach
                    </select>
                    <br>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal -->
@endif
@endforeach

@foreach($organ as $r)
<!-- Edit Jorgan -->
<div class="modal fade" id="edit-jorgan{{ $loop->iteration }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Jejak Organisasi Santri</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('edit-jorganisasi/'.$r->id)}}" method="post">
                    @csrf
                    <label>Kategori</label>
                    <select class="form-control" name="kategori" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                        <option value="Asrama" {{$r->kategori == 'Asrama' ? 'selected' : ''}}>Asrama</option>
                        <option value="Lembaga" {{$r->kategori == 'Lembaga' ? 'selected' : ''}}>Lembaga</option>
                        <option value="Pesantren" {{$r->kategori == 'Pesantren' ? 'selected' : ''}}>Pesantren</option>
                        <option value="Kedaerahan" {{$r->kategori == 'Kedaerahan' ? 'selected' : ''}}>Kedaerahan</option>
                        <option value="Ekstra" {{$r->kategori == 'Ekstra' ? 'selected' : ''}}>Ekstra</option>
                        <option value="Independen" {{$r->kategori == 'Independen' ? 'selected' : ''}}>Independen</option>
                        <option value="Lain-lain" {{$r->kategori == 'Lain-lain' ? 'selected' : ''}}>Independen</option>
                    </select>
                    <br>
                    <label>Nama Organisasi</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama Organisasi" value="{{$r->nama_organisasi}}" name="nama_organisasi" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                    <br>
                    <label>Masa Keanggotaan</label>
                    <div class="row">
                        <div class="col-4">
                            <select class="form-control" name="gk1" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                {{ $last= date('Y')-10 }}
                                {{ $now = date('Y') }}

                                @for ($i = $now; $i >= $last; $i--)
                                <option value="{{ $i }}" {{ $r->gk1() == $i ? 'selected':'' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <i class="fa fa-window-minimize" aria-hidden="true"></i>
                        <div class="col-4">
                            <select class="form-control" name="gk2" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                {{ $last= date('Y')-10 }}
                                {{ $now = date('Y') }}

                                @for ($i = $now; $i >= $last; $i--)
                                <option value="{{ $i }}" {{ $r->gk2() == $i ? 'selected':'' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.modal-content -->
</div>
@endforeach

@foreach($eks as $r)
<div class="modal fade" id="edit-eks{{ $loop->iteration }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Jejak Organisasi Santri</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('edit-eks/'.$r->id)}}" method="post">
                    @csrf
                    <label>Asrama</label>
                    <input type="text" class="form-control" placeholder="Masukkan Asrama" value="{{$r->asrama}}" name="asrama" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                    <br>
                    <label>Bidang</label>
                    <select class="form-control" name="bidang" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                        <option value="Keilmuan" {{$r->bidang == 'Keilmuan' ? 'selected' : ''}}>Keilmuan</option>
                        <option value="Kesenian" {{$r->bidang == 'Kesenian' ? 'selected' : ''}}>Kesenian</option>
                        <option value="Olahraga" {{$r->bidang == 'Olahraga' ? 'selected' : ''}}>Olahraga</option>
                        <option value="Kepanduan" {{$r->bidang == 'Kepanduan' ? 'selected' : ''}}>Kepanduan</option>
                        <option value="Keterampilan" {{$r->bidang == 'Keterampilan' ? 'selected' : ''}}>Keterampilan</option>
                    </select>
                    <br>
                    <label>Sub Bidang</label>
                    <input type="text" class="form-control" placeholder="Masukkan Sub Bidang" value="{{$r->sub_bidang}}" name="sub_bidang" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                    <br>
                    <label>Masa Keanggotaan</label>
                    <div class="row">
                        <div class="col-4">
                            <select class="form-control" name="gk1" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                {{ $last= date('Y')-10 }}
                                {{ $now = date('Y') }}

                                @for ($i = $now; $i >= $last; $i--)
                                <option value="{{ $i }}" {{ $r->gk1() == $i ? 'selected':'' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <i class="fa fa-window-minimize" aria-hidden="true"></i>
                        <div class="col-4">
                            <select class="form-control" name="gk2" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                {{ $last= date('Y')-10 }}
                                {{ $now = date('Y') }}

                                @for ($i = $now; $i >= $last; $i--)
                                <option value="{{ $i }}" {{ $r->gk2() == $i ? 'selected':'' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Simpan</button>
                    </div>
                </form>
            </div>
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
                $("#link-pedatren").attr('href', 'https://nuruljadid.app/formulir/' + d.uuid);
                $("input[id='uuid']").each(function(i, node) {
                    $(node).attr("value", d.uuid)
                })
                console.log($("input[type='hidden']"));
                console.log(d.domisili_santri.slice(-1)[0].kamar);
            }
        });
    });
</script>
@endsection