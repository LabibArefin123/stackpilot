@extends('adminlte::page')

@section('title', 'Cron Jobs')

@section('content')

    <div class="card">

        <div class="card-header">
            Scheduled Tasks
        </div>

        <div class="card-body">

            <table class="table">

                <tr>
                    <th>Command</th>
                    <th>Last Run</th>
                </tr>

                <tr>
                    <td>schedule:run</td>
                    <td>1 minute ago</td>
                </tr>

            </table>

        </div>

    </div>

@endsection
