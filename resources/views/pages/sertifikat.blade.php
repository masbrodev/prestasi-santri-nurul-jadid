@extends('layouts.app')

@section('content_header')
<a href="#" id="link-cetak2" class="btn btn-outline-primary">Halaman Belakang</a>
@stop

@section('content')
@section('plugins.LoadingOverlay', true)
<center>

    <br>
    <br>
    <img src="{{ asset('NJ.png')}}" alt="" width="150" height="150">
    <br>
    <br>
    <br>
    <br>
    <h1>BADAN PENGELOLAAN DATA PRESTASI SANTRI<br>PONDOK PESANTREN NURUL JADID</h1>
    <br>
    <br>
    <br>
    <br>
    <h2>SERTIFIKAT KOMPETENSI & PRESTASI</h2>
    <p>No. 23456789345678997654345678</p>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h4>Dengan ini menyatakan bahwa</h4>
    <br>
    <h1 class="bold" id="nama_lengkap"></h1>
    <p id="niup"></p>
    <p>
    <h4>Telah memiliki prestasi dan berkontribusi dalam aktifitasnya sebagai santri <br>di pondok pesantren sejak tahun <span id="awal">2016</span> s/d {{ \Carbon\Carbon::now()->isoFormat('Y') }}</h4>
    </p>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <p>Paiton, {{ \Carbon\Carbon::now()->isoFormat('D - MMMM - Y') }}</p>
    <br>
    <br>
    <br>
</center>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col order-last">
            <center>
                <h4>Kepala Biro Pengembangan</h4>
                <br>
                <br>
                <br>
                <br>
                <h3 class="text-bold border-bottom">K.H. FAHMI AHZ</h3>
            </center>
        </div>
        <div class="col">
        </div>
        <div class="col order-first text-right">
            <center>
                <h4>Kepala Bidang PPM</h4>
                <br>
                <br>
                <br>
                <br>
                <h3 class="text-bold border-bottom">ROJABI AZZARGHANY</h3>
            </center>
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
            url: "{{URL::to('api/formulir'.str_replace('cetak', '', Request::path()))}}",
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
                $("#link-cetak2").attr('href', "{{URL::to('cetak2')}}" + "/" + d.uuid);
            }
        });
    });
</script>
@endsection