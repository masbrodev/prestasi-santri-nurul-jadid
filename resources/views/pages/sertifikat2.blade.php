@extends('layouts.app')

@section('content_header')
<h1>Sertifikat</h1>
@stop

@section('content')
@section('plugins.LoadingOverlay', true)
<div class="container">
    <h3 class="text-center">Prestasi</h3>
    <div class="row">
        <div class="table-responsive col-md-6">
            <table class="table table-bordered table-sm" id="table-kategori">
                <thead>
                    <tr>
                        <th>Nama Prestasi</th>
                        <th>Tahun</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prestasi2 as $r)
                    <tr>
                        <td>{{ $r->nama_prestasi }}</td>
                        <td>{{ $r->tahun}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-responsive col-md-6">
            <table class="table table-bordered table-sm" id="table-kategori">
                <thead>
                    <tr>
                        <th>Nama Prestasi</th>
                        <th>Tahun</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prestasi1 as $r)
                    <tr>
                        <td>{{ $r->nama_prestasi }}</td>
                        <td>{{ $r->tahun}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <hr>
    <h3 class="text-center">Peminatan Keilmuan</h3>
    <div class="row">
        <div class="table-responsive col-md-6">
            <table class="table table-bordered table-sm" id="table-kategori">
                <thead>
                    <tr>
                        <th>Jurusan</th>
                        <th>Sub</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ilmu2 as $r)
                    <tr>
                        <td>{{ $r['jurusan'] }}</td>
                        <td>{{ $r['sub'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-responsive col-md-6">
            <table class="table table-bordered table-sm" id="table-kategori">
                <thead>
                    <tr>
                        <th>Jurusan</th>
                        <th>Sub</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ilmu1 as $r)
                    <tr>
                        <td>{{ $r['jurusan'] }}</td>
                        <td>{{ $r['sub'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <hr>

    <h3 class="text-center">Peminatan Skill</h3>
    <div class="row">
        <div class="table-responsive col-md-6">
            <table class="table table-bordered table-sm" id="table-kategori">
                <thead>
                    <tr>
                        <th>Jurusan</th>
                        <th>Sub</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skill2 as $r)
                    <tr>
                        <td>{{ $r['jurusan'] }}</td>
                        <td>{{ $r['sub'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-responsive col-md-6">
            <table class="table table-bordered table-sm" id="table-kategori">
                <thead>
                    <tr>
                        <th>Jurusan</th>
                        <th>Sub</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skill1 as $r)
                    <tr>
                        <td>{{ $r['jurusan'] }}</td>
                        <td>{{ $r['sub'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <hr>

    <h3 class="text-center">Rekam Jejak Organisasi</h3>
    <div class="row">
        <div class="table-responsive col-md-6">
            <table class="table table-bordered table-sm" id="table-kategori">
                <thead>
                    <tr>
                        <th>Kategori</th>
                        <th>Organisasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($organ2 as $r)
                    <tr>
                        <td>{{ $r->kategori }}</td>
                        <td>{{ $r->nama_organisasi }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-responsive col-md-6">
            <table class="table table-bordered table-sm" id="table-kategori">
                <thead>
                    <tr>
                        <th>Kategori</th>
                        <th>Organisasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($organ1 as $r)
                    <tr>
                        <td>{{ $r->kategori }}</td>
                        <td>{{ $r->nama_organisasi }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <hr>

    <h3 class="text-center">Rekam Jejak Ekstrakurikuler</h3>
    <div class="row">
        <div class="table-responsive col-md-6">
            <table class="table table-bordered table-sm" id="table-kategori">
                <thead>
                    <tr>
                        <th style="width: 10px">No.</th>
                        <th>Jurusan</th>
                        <th>Bidang</th>
                        <th>Sub</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eks2 as $r)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $r->asrama }}</td>
                        <td>{{ $r->bidang }}</td>
                        <td>{{ $r->sub_bidang }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-responsive col-md-6">
            <table class="table table-bordered table-sm" id="table-kategori">
                <thead>
                    <tr>
                        <th style="width: 10px">No.</th>
                        <th>Jurusan</th>
                        <th>Bidang</th>
                        <th>Sub</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eks2 as $r)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $r->asrama }}</td>
                        <td>{{ $r->bidang }}</td>
                        <td>{{ $r->sub_bidang }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@section('adminlte_js')
<script>
    $(document).ready(function() {
        $.LoadingOverlay("show", {
            image: "",
            fontawesome: "fa fa-cog fa-spin"
        });
        $.ajax({ //create an ajax request to display.php
            type: "GET",
            url: "{{URL::to('api/formulir'.str_replace('cetak2', '', Request::path()))}}",
            success: function(data) {
                $.LoadingOverlay("hide");
                var d = data.santri
                var lh = new Date(d.tanggal_lahir)
                var awal = new Date(d.santri.slice(-1)[0].tanggal_mulai)

                $("#nama_lengkap").html(d.nama_lengkap);
                $("#niup").html("Niup. " + d.warga_pesantren.niup);
                $("#awal").html(awal.getFullYear());
                $("#lembaga").html(d.pendidikan.slice(-1)[0].lembaga);
                $("#jurusan").html(d.pendidikan.slice(-1)[0].jurusan);
                $("#alamat").html(d.kecamatan + ', ' + d.kabupaten + ', ' + d.provinsi);
                $("#ttl").html(d.tempat_lahir + ', </br>' + lh.getDate() + "-" + (lh.getMonth() + 1) + "-" + lh.getFullYear());
                $("#wilayah").html(d.domisili_santri.slice(-1)[0].wilayah);
                $("#blok").html("Blok: " + d.domisili_santri.slice(-1)[0].blok);
                $("#kamar").html("Kamar: " + d.domisili_santri.slice(-1)[0].kamar);
                console.log(awal.getFullYear());
            }
        });
    });
</script>
@endsection