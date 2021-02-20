@extends('layouts.app')

@section('content_header')
<h1>{{ $judul }}</h1>
@stop

@section('content')
@section('plugins.Datatables', true)
@section('plugins.Toastr', true)
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cari Santri</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive" style="overflow-x:auto;">
            <table class="table table-hover" id="table-peminatan">
                <thead>
                    <tr>
                        <th style="width: 20px">#</th>
                        <th>Nis</th>
                        <th style="width: 900px">Nama</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($santri as $r)
                    <tr data-toggle="modal" data-target="#{{ Request::path()}}{{ $loop->iteration }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $r->nis }}</td>
                        <td>{{ $r->nama_lengkap }}</td>
                        @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<!-- /.card -->

@foreach($santri as $r)
<div class="modal fade" id="tambah-jejak-ekstrakurikuler{{ $loop->iteration }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $judul }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to(Request::path())}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{ $r->nama_lengkap }}" readonly>
                        <input type="hidden" class="form-control" value="{{ $r->nis }}" name="nis">
                        <br>
                        <label>Asrama</label>
                        <input type="text" class="form-control" placeholder="Masukkan Asrama" name="asrama">
                        <br>
                        <label>Bidang</label>
                        <select name="bidang" class="form-control">
                            <option value="Keilmuan">Keilmuan</option>
                            <option value="Kesenian">Kesenian</option>
                            <option value="Olahraga">Olahraga</option>
                            <option value="Kepanduan">Kepanduan</option>
                            <option value="Keterampilan">Keterampilan</option>
                        </select>
                        <br>
                        <label>Sub Bidang</label>
                        <input type="text" class="form-control" placeholder="Masukkan Sub Bidang">
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

@foreach($santri as $r)
<div class="modal fade" id="tambah-prestasi{{ $loop->iteration }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $judul }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('tambah-prestasi')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{ $r->nama_lengkap }}" readonly>
                        <input type="hidden" class="form-control" value="{{ $r->nis }}" name="nis">
                        <br>
                        <label>Kamar</label>
                        <input type="text" class="form-control" value="{{ $r->domisili_santri_kamar }}" readonly>
                        <br>

                        <label>Pendidikan</label>
                        <input type="text" class="form-control" value="{{ $r->pendidikan_lembaga }} / {{ $r->pendidikan_jurusan }} / {{ $r->pendidikan_kelas }}" readonly>
                        <br>

                        <label>Prestasi</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Prestasi" name="nama_prestasi">
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