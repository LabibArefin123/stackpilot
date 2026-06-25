@extends('adminlte::page')

@section('title', 'Environment')

@section('content')

    <div class="card">

        <div class="card-header">
            Laravel Environment
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th>APP_ENV</th>
                    <td>production</td>
                </tr>

                <tr>
                    <th>PHP Version</th>
                    <td>8.2</td>
                </tr>

                <tr>
                    <th>Laravel Version</th>
                    <td>11.x</td>
                </tr>

            </table>

        </div>

    </div>

@endsection
