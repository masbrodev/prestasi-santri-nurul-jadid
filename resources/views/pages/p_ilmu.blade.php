@extends('layouts.app')

@section('content_header')
<h1>Data Peminatan Keilmuan Santri</h1>
@stop

@section('content')
@section('plugins.Datatables', true)
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="table-responsive">
                <table class="table table-bordered" id="table-ilmu">
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
                            <td>{{ $r->ilmu->sub }}</td>
                            <td>
                                <div class="input-group">
                                    <a class="btn btn-outline-secondary" href="{{URL::to('formulir/'.$r->niup)}}">Formulir</a>
                                </div>
                            </td>
                        </tr>
                        @endif
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
        $("#table-ilmu").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endsection