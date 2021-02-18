@extends('layouts.app')
@section('content_header')
<h1>Dashboard</h1>
@stop
@section('content')
@section('plugins.LoadingOverlay', true)
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 id="tsantri">7070</h3>

                        <p>Total Santri</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-database"></i>
                    </div>
                    <a href="https://nuruljadid.app/data-pokok/santri?page=1&limit=25" class="small-box-footer">Selengkapnya  <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 id="talumni">6060</h3>

                        <p>Total Alumni</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                    <a href="https://nuruljadid.app/data-pokok/alumni?page=1&limit=25" class="small-box-footer">Selengkapnya  <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $all }}</h3>

                        <p>Total Data PDPS</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list-alt"></i>
                    </div>
                    <a href="#" class="small-box-footer">Selengkapnya  <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $prestasi }}</h3>

                        <p>Total Prestasi</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-trophy"></i>
                    </div>
                    <a href="{{ URL::to('prestasi-santri') }}" class="small-box-footer">Selengkapnya  <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $ilmu }}</h3>

                        <p>Total Peminatan Keilmuan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <a href="{{ URL::to('peminatan-keilmuan') }}" class="small-box-footer">Selengkapnya  <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $skill }}</h3>

                        <p>Total Peminatan Skill</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-futbol"></i>
                    </div>
                    <a href="{{ URL::to('peminatan-skill') }}" class="small-box-footer">Selengkapnya  <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $organ }}</h3>

                        <p>Total Jejak Keorganisasian</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{ URL::to('jejak-keorganisasian') }}" class="small-box-footer">Selengkapnya  <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $eks }}</h3>

                        <p>Total Jejak Ekstrakurikuler</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-university"></i>
                    </div>
                    <a href="{{ URL::to('jejak-ekstrakurikuler') }}" class="small-box-footer">Selengkapnya  <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
</section>

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
            url: "{{URL::to('api/dashboard')}}",
            success: function(data) {
                $.LoadingOverlay("hide");

                $("#tsantri").html(data.dash.santri.total);
                $("#talumni").html(data.dash.alumni.total);
            }
        });
    });
</script>
@endsection