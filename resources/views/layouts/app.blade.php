@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Prestasi Santri</h1>
@stop

@section('content')
<p>Welcome to this beautiful admin panel.</p>
@stop

@section('content_top_nav_left')
<li class="nav-item">
    <a class="nav-link" href="{{ URL::to('api/refresh') }}">
        <i class="fa fa-retweet"></i> Refresh
    </a>
</li>
@stop

@section('css')
@stop

@section('js')
{!! Toastr::message() !!}
@stop