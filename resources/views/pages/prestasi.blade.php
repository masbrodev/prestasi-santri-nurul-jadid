@extends('layouts.app')

@section('content_header')
<h1>Prestasi Santri</h1>
@stop

@section('content')
@section('plugins.Datatables', true)
@section('plugins.Toastr', true)
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Prestasi Santri</h3>
            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                    <a href="{{ URL::to('tambah-prestasi')}}" type="button" class="btn btn-outline-primary">Tambah</a>
                </ul>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table class="table table-hover" id="table-peminatan">
                <thead>
                    <tr>
                        <th style="width: 20px">#</th>
                        <th>NIS</th>
                        <th style="width: 200px">Jumlah Prestasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prestasi->groupBy('nis') as $nis => $r)
                    <tr data-toggle="modal" data-target="#lihat-kat{{ $loop->iteration }}">
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $nis }}</td>
                        <td>{{ $r->count() }}</td>
                        @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<!-- /.card -->

@foreach($prestasi->groupBy('nis') as $nis => $p)
<div class="modal fade" id="lihat-kat{{ $loop->iteration }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Prestasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('tambah-prestasi')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" class="form-control" value="{{ $nis }}" name="nis" readonly>
                        <br>
                        <label>Prestasi</label>
                        @foreach($p as $rr)
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{$loop->iteration}}. {{ $rr->nama_prestasi }} " readonly>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opsi</button>
                                <div class="dropdown-menu">
                                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#edit-pres{{ $rr->id }}">Edit</button>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ URL::to('hapus-prestasi/'.$rr->id)}}">Hapus</a>
                                </div>
                            </div>
                        </div>
                        <br>
                        @endforeach
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endforeach

@foreach($prestasi as $p)
<div class="modal fade" id="edit-pres{{ $p->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Prestasi Santri</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('edit-prestasi/'.$p->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nama Prestasi</label>
                        <input type="text" class="form-control" value="{{ $p->nama_prestasi }}" name="prestasi">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endforeach

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