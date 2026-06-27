@extends('adminlte::page')

@section('title', 'Git Monitor')

@section('content_header')

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h1>

                <i class="fab fa-git-alt text-danger mr-2"></i>

                Git Monitor

            </h1>

            <small class="text-muted">

                Monitor all project repositories from one dashboard

            </small>

        </div>

        <div>

            <button class="btn btn-primary">

                <i class="fas fa-sync-alt mr-1"></i>

                Refresh

            </button>

        </div>

    </div>

@stop


@section('content')

    <div class="container-fluid">
        {{-- Statistics --}}
        @include('backend.partials.git_page.index_page.part_1')
        {{-- Filters --}}
        @include('backend.partials.git_page.index_page.part_2')
        {{-- Repository Table --}}
        @include('backend.partials.git_page.index_page.part_3')
    </div>

@stop

@section('css')

    <style>
        .info-box {

            min-height: 110px;

        }

        .table td {

            vertical-align: middle;

        }

        .badge {

            font-size: 90%;

        }
    </style>

@stop

@section('js')

    <script>
        document.getElementById('repositorySearch').addEventListener('keyup', function() {

            let value = this.value.toLowerCase();

            let rows = document.querySelectorAll('#repositoryTable tbody tr');

            rows.forEach(function(row) {

                row.style.display = row.innerText.toLowerCase().includes(value)

                    ?
                    ''

                    :
                    'none';

            });

        });
    </script>

@stop
