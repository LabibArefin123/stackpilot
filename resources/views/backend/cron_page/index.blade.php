@extends('adminlte::page')

@section('title', 'Cron Jobs')
@section('content_header')


    <div class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>

                        <i class="fas fa-clock"></i>

                        Cron Job Manager

                    </h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">

                            Dashboard

                        </li>

                        <li class="breadcrumb-item active">

                            Cron Jobs

                        </li>

                    </ol>

                </div>

            </div>

        </div>

    </div>

@stop

@section('content')

    {{-- CRON STATISTICS --}}
    @include('backend.partials.cron_page.index_page.part_1')
    {{-- CRON TABLE --}}
    @include('backend.partials.cron_page.index_page.part_2')
    @include('backend.cron_page.modals.modal_log_history')
    @include('backend.cron_page.modals.modal_run')
    @include('backend.cron_page.modals.modal_status')

    <div class="card card-outline card-dark">

        <div class="card-header">

            <h3 class="card-title">

                <i class="fas fa-terminal"></i>

                Server Cron Command

            </h3>

        </div>

        <div class="card-body">

            <pre>* * * * * php /path/to/project/artisan schedule:run >> /dev/null 2>&1</pre>

            <button class="btn btn-primary">

                <i class="fas fa-copy"></i>

                Copy Command

            </button>

        </div>

    </div>

@endsection
@push('js')
    <script src="{{ asset('js/custom_backend/cron_page/index_page/cron_helpers.js') }}"></script>
    <script src="{{ asset('js/custom_backend/cron_page/index_page/cron_modal.js') }}"></script>
    <script src="{{ asset('js/custom_backend/cron_page/index_page/cron_run.js') }}"></script>
    <script src="{{ asset('js/custom_backend/cron_page/index_page/cron_status.js') }}"></script>
    <script src="{{ asset('js/custom_backend/cron_page/index_page/cron_logs.js') }}"></script>
    <script src="{{ asset('js/custom_backend/cron_page/index_page/cron_history.js') }}"></script>
    <script src="{{ asset('js/custom_backend/cron_page/index_page/cron_actions.js') }}"></script>
    <script src="{{ asset('js/custom_backend/cron_page/index_page/cron.js') }}"></script>
@endpush
