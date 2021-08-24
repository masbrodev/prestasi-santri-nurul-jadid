@extends('layouts.app')

@section('content_header')
<h1>Santri</h1>
@stop

@section('content')
@section('plugins.Datatables', true)
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Santri</h3>

        </div>
        <form action="{{URL::to('santri/')}}" method="get" id="search-box">
            <div class="input-group input-group-sm">
                <input type="text" class="form-control" name="cari" size="31" value="{{ request()->get('cari') }}" />
                <span class="input-group-append">
                    <a type="button" class="btn btn-info btn-flat" href="{{URL::to('santri/')}}">Clear!</a>
                </span>
            </div>
        </form>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table class="table table-hover display nowrap" id="table">
                <thead>
                    <tr>
                        <th style="width: 20px">#</th>
                        <th>NIUP</th>
                        <th>Nama</th>
                        <th>Kamar</th>
                        <th>Sekolah</th>
                        <th>Kota Asal</th>
                        <th>Angkatan</th>
                        <th>Rombel</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<!-- /.card -->

@endsection

@section('adminlte_js')
<script>
    // var limit = "{{ request()->get('limit') }}";
    var cari = "{{ request()->get('cari') }}";
    $(function() {
        var t = $("#table").DataTable({
            language: {
                search: 'Cari:',
                lengthMenu: 'Tampilkan _MENU_ baris',
                zeroRecords: 'Data Tidak Ditemukan',
                info: 'Total data _MAX_',
                infoEmpty: 'Data Kosong',
                infoFiltered: '(filtered from _MAX_ total records)'
            },
            lengthChange: false,
            searching: false,
            ordering: true,
            info: true,
            bFilter: false,
            processing: true,
            serverSide: true,
            ajax: function(data, callback) {
                // make a regular ajax request using data.start and data.length
                $.get("{{URL::to('api/santri')}}", {
                        limit: 25,
                        page: (data.length + data.start) / data.length,
                        cari: cari
                    },
                    function(res) {
                        callback({
                            data: res.santri,
                        });
                    });
            },
            columns: [{
                },
                {
                    data: "warga_pesantren.niup",
                },
                {
                    data: "nama_lengkap",
                },
                {
                    data: "domisili_santri.kamar",
                },
                {
                    data: "pendidikan.lembaga",
                },
                {
                    data: "kabupaten",
                },
                {
                    data: "nama_lengkap",
                },
                {
                    data: "pendidikan.rombel",
                },
            ],
            columnDefs: [{
                    targets: 1,
                    searchable: false,
                    orderable: false,
                    defaultContent: "-",
                    targets: "_all"
                },
                {
                    targets: 2,
                    render: function(data, type, row, meta) {
                        return "<a href=" + "{{URL::to('formulir')}}/" + row.uuid + ">" + data + "</a>"; //render link in cell
                    }
                },
            ],
            order: [
                [1, 'asc']
            ],
        });

        t.on('draw.dt', function() {
            var PageInfo = $('#table').DataTable().page.info();
            t.column(0, {
                page: 'current'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            });
        });


    });
</script>
@endsection