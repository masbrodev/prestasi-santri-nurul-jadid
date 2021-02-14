@extends('layouts.app')

@section('content_header')
<h1>Data Prestasi Santri Santri</h1>
@stop

@section('content')
@section('plugins.Datatables', true)
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="table-responsive">
                <table class="table table-bordered" id="table-pres">
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
                                    <a class="btn btn-outline-secondary" href="{{URL::to('formulir/'.$r->niup)}}">Formulir</a>
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
</div>
<!-- /.card -->

@endsection

@section('adminlte_js')
<script>
    $(function() {
        $("#table-pres").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endsection