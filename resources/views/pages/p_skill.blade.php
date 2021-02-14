@extends('layouts.app')

@section('content_header')
<h1>Data Peminatan Skill Santri</h1>
@stop

@section('content')
@section('plugins.Datatables', true)
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="table-responsive">
                <table class="table table-bordered" id="table-skill">
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
                            <td>{{ $r->skill->sub }}</td>
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
        $("#table-skill").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endsection