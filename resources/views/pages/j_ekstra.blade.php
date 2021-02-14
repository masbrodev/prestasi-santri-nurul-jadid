@extends('layouts.app')

@section('content_header')
<h1>Data Rejam Jejak Ekstrakurikuler Santri</h1>
@stop

@section('content')
@section('plugins.Datatables', true)
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="table-responsive">
                <table class="table table-bordered" id="table-eks">
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
                            <td>{{ $r->sub_bidang }}</td>
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
        $("#table-eks").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endsection