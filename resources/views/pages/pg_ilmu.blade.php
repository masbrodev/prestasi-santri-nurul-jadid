@extends('layouts.app')

@section('content_header')
<h1>Peminatan Keilmuan</h1>
@stop

@section('content')
@section('plugins.Datatables', true)
@section('plugins.Toastr', true)
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Peminatan Keilmuan</h3>

            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tambah-peminatan">Tambah</button>
                </ul>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table class="table table-bordered" id="table-peminatan">
                <thead>
                    <tr>
                        <th style="width: 10px">NO</th>
                        <th>jurusan Peminatan</th>
                        <th>Sub Peminatan</th>
                        <th style="width: 200px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminatan as $r)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $r->jurusan }}</td>
                        <td>{{ $r->sub }}</td>
                        <td>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#lihat-kat{{ $loop->iteration }}">Lihat detail</button>
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" data-toggle="modal" data-target="#edit-kat{{ $loop->iteration }}">Edit</button>
                                        <button class="dropdown-item" data-toggle="modal" data-target="#hapus-kat{{ $loop->iteration }}">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<!-- /.card -->

@foreach($peminatan as $r)
<!-- Lihat Peminatan -->
<div class="modal fade" id="lihat-kat{{ $loop->iteration }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Peminatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('kategori/edit/'.$r->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>jurusan Peminatan</label>
                        <input type="text" class="form-control" value="{{ $r->jurusan }}" name="nama" readonly>
                        <br>
                        <label>Sub Peminatan</label>
                        <input type="text" class="form-control" placeholder="-" name="deskripsi" value="{{ $r->sub }}" readonly>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach

@foreach($peminatan as $r)
<!-- Edit Peminatan -->
<div class="modal fade" id="edit-kat{{ $loop->iteration }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Peminatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('edit-peminatan/'.$r->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Jurusan Peminatan</label>
                        <select name="jurusan" class="form-control">
                            <option value="Keagamaan" {{ $r->jurusan == 'Keagamaan' ? 'selected':'' }}>Keagamaan</option>
                            <option value="MIPA" {{ $r->jurusan == 'MIPA' ? 'selected':'' }}>MIPA</option>
                            <option value="Teknologi" {{ $r->jurusan == 'Teknologi' ? 'selected':'' }}>Teknologi</option>
                            <option value="Sosial-Humaniora" {{ $r->jurusan == 'Sosial-Humaniora' ? 'selected':'' }}>Sosial-Humaniora</option>
                            <option value="Bahasa" {{ $r->jurusan == 'Bahasa' ? 'selected':'' }}>Bahasa</option>
                        </select>
                        <br>
                        <label>Sub Peminatan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Sub Peminatan" value="{{ $r->sub }}" name="sub">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning" id="e">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach

@foreach($peminatan as $r)
<!-- Hapus Peminatan -->
<div class="modal fade" id="hapus-kat{{ $loop->iteration }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Peminatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Jurusan Peminatan</label>
                    <input type="text" class="form-control" placeholder="Masukkan Sub Peminatan" name="deskripsi" value="{{ $r->jurusan }}" readonly>
                    <br>
                    <label>Sub Peminatan</label>
                    <input type="text" class="form-control" placeholder="Masukkan Jurusan Peminatan" value="{{ $r->sub }}" name="nama" readonly>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a class="btn btn-danger" href="{{ URL::to('hapus-peminatan/'.$r->id) }}">Hapus</a>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach

<!-- Tambah Peminatan -->
<div class="modal fade" id="tambah-peminatan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Peminatan Keilmuan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('tambah-peminatan')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" value="Keilmuan" name="nama">
                        <label>Jurusan Peminatan</label>
                        <select name="jurusan" class="form-control">
                            <option value="Keagamaan">Keagamaan</option>
                            <option value="MIPA">MIPA</option>
                            <option value="Teknologi">Teknologi</option>
                            <option value="Sosial-Humaniora">Sosial-Humaniora</option>
                            <option value="Bahasa">Bahasa</option>
                        </select>
                        <br>
                        <label>Sub Peminatan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Sub Jurusan" name="sub">

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="s">Simpan</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection

@section('adminlte_js')
{!! Toastr::message() !!}

<script type="text/javascript">
    $(function() {
        $("#table-peminatan").DataTable({
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ baris",
                "zeroRecords": "Data Tidak Ditemukan",
                "info": "Total data _MAX_",
                "infoEmpty": "Data Kosong",
                "infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
    });
</script>
@endsection