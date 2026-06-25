@extends('adminlte::page')

@section('title', 'Logs')

@section('content')

    <div class="card card-danger">

        <div class="card-header">
            Error Logs
        </div>

        <div class="card-body">

            <pre>
[ERROR]
SQLSTATE[42S02]

[WARNING]
Queue Timeout

[INFO]
User Login Success
</pre>

        </div>

    </div>

@endsection
