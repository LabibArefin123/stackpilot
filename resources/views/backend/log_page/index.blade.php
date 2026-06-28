@extends('adminlte::page')

@section('title', 'Logs')

@section('plugins.Datatables', true)

@section('content_header')

    <div class="d-flex justify-content-between align-items-center">

        <h1>

            <i class="fas fa-file-alt text-danger"></i>

            Logs Monitor

        </h1>

        <div>

            <button class="btn btn-primary">

                <i class="fas fa-sync"></i>

                Refresh

            </button>

        </div>

    </div>

@stop

@section('content')

    {{-- Statistics --}}

    @include('backend.partials.log_page.index_page.part_1')

    {{-- Project Filter --}}

    @include('backend.partials.log_page.index_page.part_2')
    
    {{-- Git Logs --}}
    
    @include('backend.partials.log_page.index_page.part_3')
    
    {{-- Laravel Logs --}}
    
    @include('backend.partials.log_page.index_page.part_4')
  
    <div class="card mt-4">
        <div class="card-body" style="height:50px;"> <!-- spacing card --> </div>
    </div>
@stop

@section('js')

    <script>
        $(function() {

            $('#gitLogTable').DataTable({

                pageLength: 10,

                responsive: true,

                autoWidth: false,

                ordering: true

            });

            $('#serverLogTable').DataTable({

                pageLength: 10,

                responsive: true,

                autoWidth: false,

                ordering: true

            });

            $('#projectFilter').on('change', function() {

                let value = $(this).val();

                $('#gitLogTable').DataTable().column(1).search(value).draw();

                $('#serverLogTable').DataTable().column(1).search(value).draw();

            });

        });
    </script>

    <script src="{{ asset('js/custom_backend/log_page/index_page/view_modal.js') }}"></script>

@stop
