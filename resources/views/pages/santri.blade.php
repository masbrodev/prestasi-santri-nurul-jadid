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
            <table class="table table-hover" id="table-peminatan">
                <thead>
                    <tr>
                        <th style="width: 20px">#</th>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Wilayah</th>
                        <th>Pendidikan Lembaga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($santri as $r)
                    <tr data-toggle="modal" data-target="#lihat-kat{{ $loop->iteration }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $r->nis }}</td>
                        <td>{{ $r->nama_lengkap }}</td>
                        <td>{{ $r->domisili_santri_wilayah }}</td>
                        <td>{{ $r->pendidikan_lembaga }}</td>
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
                <h4 class="modal-title">Data Detail Santri</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('kategori/edit/'.$r->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{ $r->nama_lengkap }}" readonly>
                        <input type="hidden" class="form-control" value="{{ $r->nis }}" name="nis">
                        <br>
                        <label>Wilayah</label>
                        <input type="text" class="form-control" value="{{ $r->domisili_santri_wilayah }}" readonly>
                        <br>
                        <label>Blok</label>
                        <input type="text" class="form-control" value="{{ $r->	domisili_santri_blok }}" readonly>
                        <br>
                        <label>Kamar</label>
                        <input type="text" class="form-control" value="{{ $r->domisili_santri_kamar }}" readonly>
                        <br>
                        <label>Pendidikan Jurusan</label>
                        <input type="text" class="form-control" value="{{ $r->pendidikan_jurusan }}" readonly>
                        <br>
                        <label>Pendidikan Formal</label>
                        <input type="text" class="form-control" value="{{ $r->pendidikan_lembaga }} / {{ $r->pendidikan_jurusan }} / {{ $r->pendidikan_kelas }}" readonly>
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