@extends('layouts.app')

@section('content_header')
@stop

@section('content')
<div class="container">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Ganti Password</h3>
            </div>
            <form method="POST" action="{{ URL::to('gpassword') }}">
            @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="pass" placeholder="Password">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('adminlte_js')
<script>

</script>
@endsection