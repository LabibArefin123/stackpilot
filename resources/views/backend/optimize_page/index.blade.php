@extends('adminlte::page')

@section('title', 'Laravel Optimization')

@section('content')

    <div class="row">

        <div class="col-md-3">
            <button class="btn btn-success btn-block">
                Optimize
            </button>
        </div>

        <div class="col-md-3">
            <button class="btn btn-danger btn-block">
                Optimize Clear
            </button>
        </div>

        <div class="col-md-3">
            <button class="btn btn-info btn-block">
                Config Cache
            </button>
        </div>

        <div class="col-md-3">
            <button class="btn btn-primary btn-block">
                Route Cache
            </button>
        </div>

    </div>

@endsection
