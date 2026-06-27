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

    <div class="row">

        <div class="col-lg-3">

            <div class="small-box bg-primary">

                <div class="inner">

                    <h3>{{ $projects->count() }}</h3>

                    <p>Projects</p>

                </div>

                <div class="icon">

                    <i class="fas fa-project-diagram"></i>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="small-box bg-success">

                <div class="inner">

                    <h3>{{ count($gitLogs) }}</h3>

                    <p>Git Activities</p>

                </div>

                <div class="icon">

                    <i class="fab fa-git-alt"></i>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="small-box bg-danger">

                <div class="inner">

                    <h3>{{ count($serverLogs) }}</h3>

                    <p>Server Logs</p>

                </div>

                <div class="icon">

                    <i class="fas fa-server"></i>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="small-box bg-warning">

                <div class="inner">

                    <h3>{{ now()->format('d M Y') }}</h3>

                    <p>Today</p>

                </div>

                <div class="icon">

                    <i class="fas fa-calendar"></i>

                </div>

            </div>

        </div>

    </div>

    {{-- Project Filter --}}

    <div class="card card-outline card-primary">

        <div class="card-header">

            <h3 class="card-title">

                <i class="fas fa-filter"></i>

                Project Filter

            </h3>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4">

                    <select class="form-control" id="projectFilter">

                        <option value="">All Projects</option>

                        @foreach ($projects as $project)
                            <option value="{{ $project->name }}">

                                {{ $project->name }}

                            </option>
                        @endforeach

                    </select>

                </div>

            </div>

        </div>

    </div>

    {{-- Git Logs --}}

    <div class="card card-outline card-success">

        <div class="card-header">

            <h3 class="card-title">

                <i class="fab fa-git-alt"></i>

                Git Activity Logs

            </h3>

        </div>

        <div class="card-body">

            <table id="gitLogTable" class="table table-bordered table-striped table-hover">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Project</th>

                        <th>Branch</th>

                        <th>Commit</th>

                        <th>Author</th>

                        <th>Date</th>

                        <th>Message</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($gitLogs as $log)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $log['project'] }}</td>

                            <td>{{ $log['branch'] }}</td>

                            <td>

                                <code>{{ $log['hash'] }}</code>

                            </td>

                            <td>{{ $log['author'] }}</td>

                            <td>{{ $log['date'] }}</td>
                            <td style="white-space: normal; min-width:350px;">

                                @php

                                    $lines = preg_split('/\r\n|\r|\n|;|,/', $log['message']);

                                    $lines = array_filter(array_map('trim', $lines));

                                @endphp

                                @if (count($lines) > 1)
                                    <ol class="mb-0 pl-3">

                                        @foreach ($lines as $line)
                                            <li>{{ $line }}</li>
                                        @endforeach

                                    </ol>
                                @else
                                    {{ $log['message'] }}
                                @endif

                            </td>
                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center text-muted">

                                <i class="fab fa-git-alt fa-3x mb-2"></i>

                                <br>

                                No Git activity found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- Laravel Logs --}}

    <div class="card card-outline card-danger">

        <div class="card-header">

            <h3 class="card-title">

                <i class="fas fa-server"></i>

                Laravel Logs (from GitHub Account)

            </h3>

        </div>

        <div class="card-body">

            <table id="serverLogTable" class="table table-bordered table-striped table-hover">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Project</th>

                        <th>Level</th>

                        <th>Date</th>

                        <th>Message</th>

                        <th>Details</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($serverLogs as $log)
                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $log['project'] }}</td>

                            <td>

                                <span class="badge badge-danger">

                                    {{ $log['level'] }}

                                </span>

                            </td>

                            <td>{{ $log['date'] }}</td>

                            <td>
                                {{ $log['message'] }}
                            </td>

                            <td>

                                @if (!empty($log['details']))
                                    <button type="button" class="btn btn-xs btn-info view-log-details"
                                        data-project="{{ $log['project'] }}" data-level="{{ $log['level'] }}"
                                        data-date="{{ optional($log['date'])->format('Y-m-d H:i:s') }}"
                                        data-message="{{ $log['message'] }}" data-details="{{ e($log['details']) }}">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                @else
                                    -
                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center text-muted">

                                <i class="fas fa-check-circle fa-3x text-success mb-2"></i>

                                <br>

                                No Laravel logs found.

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>
            @include('backend.log_page.modals.view_modal')
        </div>

    </div>
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
