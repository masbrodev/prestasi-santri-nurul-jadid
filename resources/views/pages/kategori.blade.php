@extends('layouts.app')

@section('content_header')
<h1>Kategori</h1>
@stop

@section('content')
@section('plugins.Datatables', true)
@section('plugins.Toastr', true)
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Kategori</h3>

            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                    <button type="button" class="btn btn-block bg-gradient-primary" data-toggle="modal" data-target="#tambah-kategori">Tambah</button>
                </ul>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table class="table table-bordered" id="table-kategori">
                <thead>
                    <tr>
                        <th style="width: 10px">NO</th>
                        <th>Nama Kategori</th>
                        <th>Anak Kategori</th>
                        <th style="width: 200px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategori as $r)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $r->nama }}</td>
                        <td>{{ $r->parent ? $r->parent->nama : '-' }}</td>
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

@foreach($kategori as $r)
<!-- Lihat Kategori -->
<div class="modal fade" id="lihat-kat{{ $loop->iteration }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Lihat Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('kategori/edit/'.$r->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" value="{{ $r->nama }}" name="nama" readonly>
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" placeholder="-" name="deskripsi" value="{{ $r->deskripsi }}" readonly>
                        <label>Anak Dari Kategori</label>
                        <input type="text" class="form-control" placeholder="Tidak ada deskripsi" value="{{ $r->parent ? $r->parent->nama : '-' }}" readonly>
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

@foreach($kategori as $r)
<!-- Edit Kategori -->
<div class="modal fade" id="edit-kat{{ $loop->iteration }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('kategori/edit/'.$r->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Kategori" value="{{ $r->nama }}" name="nama">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" placeholder="Masukkan Deskripsi Kategori" name="deskripsi" value="{{ $r->deskripsi }}">
                        <label>Anak Dari Kategori</label>
                        <select name="parent_id" class="form-control">
                            <option value="">Tidak Ada</option>
                            @foreach ($kategori as $row)
                            <option value="{{ $row->id }}" {{ $r->parent_id == $row->id ? 'selected':'' }}>{{ $row->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="e">Simpan</button>
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

@foreach($kategori as $r)
<!-- Hapus Kategori -->
<div class="modal fade" id="hapus-kat{{ $loop->iteration }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama Kategori" value="{{ $r->nama }}" name="nama">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" placeholder="Masukkan Deskripsi Kategori" name="deskripsi" value="{{ $r->deskripsi }}">
                    <label>Anak Dari Kategori</label>
                    <select name="parent_id" class="form-control">
                        <option value="">Tidak Ada</option>
                        @foreach ($kategori as $row)
                        <option value="{{ $row->id }}" {{ $r->parent_id == $row->id ? 'selected':'' }}>{{ $row->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a class="btn btn-primary" href="{{ URL::to('kategori/hapus/'.$r->id) }}">Hapus</a>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach

<!-- Tambah Kategori -->
<div class="modal fade" id="tambah-kategori">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Plilihan Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('kategori/tambah')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Kategori" name="nama">

                        <label>Deskripsi</label>
                        <input type="text" class="form-control" placeholder="Masukkan Deskripsi Kategori" name="deskripsi">

                        <label>Anak Dari Kategori</label>
                        <select name="parent_id" class="form-control">
                            <option value="">Tidak Ada</option>
                            @foreach ($parent as $row)
                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                            @endforeach
                        </select>
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

@push('scripts')
<script>
    $(function() {
        $("#table-kategori").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endpush