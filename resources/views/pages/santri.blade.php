@extends('layouts.app')

@section('content_header')
<h1>Santri</h1>
@stop

@section('content')
@section('plugins.Datatables', true)
@section('plugins.Toastr', true)
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Santri</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table class="table table-bordered" id="table-peminatan">
                <thead>
                    <tr>
                        <th style="width: 10px">NO</th>
                        <th>nis</th>
                        <th>nama</th>
                        <th style="width: 200px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($santri as $r)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $r->nis }}</td>
                        <td>{{ $r->nama_lengkap }}</td>
                        <td>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#lihat-kat{{ $loop->iteration }}">Lihat detail</button>
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

@foreach($santri as $r)
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
@endforeach


@endsection

@section('adminlte_js')
<script type="text/javascript">
    $(function() {
        $("#table-peminatan").DataTable({

        });
    });
</script>
@endsection