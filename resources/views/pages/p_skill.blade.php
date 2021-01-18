@extends('layouts.app')

@section('content_header')
<h1>Peminatan Skill</h1>
@stop

@section('content')
@section('plugins.Datatables', true)
@section('plugins.Toastr', true)
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Peminatan Skill</h3>

            <!-- /.card-body -->
        </div>
    </div>
</div>
<!-- /.card -->

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