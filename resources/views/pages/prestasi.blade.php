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
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table class="table table-bordered" id="table-peminatan">
                <thead>
                    <tr>
                        <th style="width: 10px">NO</th>
                        <th>NIS</th>
                        <th>Jumlah Prestasi</th>
                        <th style="width: 200px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prestasi->groupBy('nis') as $nis => $r)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $nis }}</td>
                        <td>{{ $r->count() }}</td>
                        <td>
                            <div class="input-group">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#lihat-kat{{ $loop->iteration }}">Lihat</button>
                            </div>
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
                        <input type="text" class="form-control" value="{{ $rr->nama_prestasi }}" readonly>
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

@endsection

@section('adminlte_js')
<script type="text/javascript">
    $(function() {
        $("#table-peminatan").DataTable({

        });
    });
</script>
@endsection