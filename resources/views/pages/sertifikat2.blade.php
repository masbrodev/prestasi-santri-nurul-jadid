@extends('layouts.app')

@section('content_header')
<h1>Sertifikat</h1>
@stop

@section('content')
@section('plugins.LoadingOverlay', true)
<div class="container">
    <div class="row">
        <div class="table-responsive col-md-6">
        <h3 class="text-center">Prestasi</h3>
            <table class="table table-bordered table-sm" id="table-kategori">
                <thead>
                    <tr>
                        <th style="width: 10px">No.</th>
                        <th>Nama Prestasi</th>
                        <th>Tahun</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prestasi as $p)
                    @foreach($p as $r)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $r->nama_prestasi }}</td>
                        <td>{{ $r->tahun}}</td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <br>
        <div class="table-responsive col-md-6">
        <h3 class="text-center">Peminatan Keilmuan</h3>
            <table class="table table-bordered table-sm" id="table-kategori">
                <thead>
                    <tr>
                        <th style="width: 10px">No.</th>
                        <th>Jurusan</th>
                        <th>Sub</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ilmu as $r)
                    @if(!empty($r->ilmu))
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $r->ilmu->jurusan }}</td>
                        <td>{{ $r->ilmu->sub }}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <br>
        <br>

        <div class="table-responsive col-md-6">
        <h3 class="text-center">Peminatan Skill</h3>
            <table class="table table-bordered table-sm" id="table-kategori">
                <thead>
                    <tr>
                        <th style="width: 10px">No.</th>
                        <th>Jurusan</th>
                        <th>Sub</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skill as $r)
                    @if(!empty($r->skill))
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $r->skill->jurusan }}</td>
                        <td>{{ $r->skill->sub }}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <br>
        <br>

        <div class="table-responsive col-md-6">
        <h3 class="text-center">Rekam Jejak Organisasi</h3>
            <table class="table table-bordered table-sm" id="table-kategori">
                <thead>
                    <tr>
                        <th style="width: 10px">No.</th>
                        <th>Kategori</th>
                        <th>Organisasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($organ as $r)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $r->kategori }}</td>
                        <td>{{ $r->nama_organisasi }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <br>
        <br>

        <div class="table-responsive col-md-6">
        <h3 class="text-center">Rekam Jejak Ekstrakurikuler</h3>
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
                    @foreach($eks as $r)
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