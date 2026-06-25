@extends('adminlte::page')

@section('title', 'Queue Monitor')

@section('content')

    <div class="row">

        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-success">
                    <i class="fas fa-stream"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">
                        Pending Jobs
                    </span>

                    <span class="info-box-number">
                        25
                    </span>
                </div>
            </div>
        </div>

    </div>

@endsection
