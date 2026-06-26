@extends('adminlte::page')

@section('title', 'Repository Details')

@section('content_header')

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h1>

                <i class="fab fa-git-alt text-danger mr-2"></i>

                {{ $project->name }}

            </h1>

            <small class="text-muted">

                Git Repository Monitor

            </small>

        </div>

        <div>

            <a href="{{ route('gits.index') }}" class="btn btn-default">

                <i class="fas fa-arrow-left mr-1"></i>

                Back

            </a>

        </div>

    </div>

@stop

@section('content')

    <div class="container-fluid">

        {{-- ===================== SUMMARY ===================== --}}

        <div class="row">

            <div class="col-lg-3">

                <div class="info-box bg-gradient-success">

                    <span class="info-box-icon">

                        <i class="fas fa-code-branch"></i>

                    </span>

                    <div class="info-box-content">

                        <span class="info-box-text">

                            Current Branch

                        </span>

                        <span class="info-box-number">

                            {{ $git['branch'] }}

                        </span>

                    </div>

                </div>

            </div>

            <div class="col-lg-3">

                <div class="info-box bg-gradient-info">

                    <span class="info-box-icon">

                        <i class="fas fa-code"></i>

                    </span>

                    <div class="info-box-content">

                        <span class="info-box-text">

                            Commits

                        </span>

                        <span class="info-box-number">

                            {{ $git['commit_count'] }}

                        </span>

                    </div>

                </div>

            </div>

            <div class="col-lg-3">

                <div class="info-box bg-gradient-warning">

                    <span class="info-box-icon">

                        <i class="fas fa-users"></i>

                    </span>

                    <div class="info-box-content">

                        <span class="info-box-text">

                            Contributors

                        </span>

                        <span class="info-box-number">

                            {{ $git['total_contributors'] }}

                        </span>

                    </div>

                </div>

            </div>

            <div class="col-lg-3">

                <div class="info-box bg-gradient-danger">

                    <span class="info-box-icon">

                        <i class="fab fa-github"></i>

                    </span>

                    <div class="info-box-content">

                        <span class="info-box-text">

                            Repository

                        </span>

                        <span class="info-box-number">

                            @if ($git['repository'])
                                Ready
                            @else
                                Missing
                            @endif

                        </span>

                    </div>

                </div>

            </div>

        </div>

        {{-- ===================== Repository Overview ===================== --}}

        <div class="row">

            <div class="col-md-8">

                <div class="card card-outline card-primary">

                    <div class="card-header">

                        <h3 class="card-title">

                            <i class="fas fa-info-circle mr-2"></i>

                            Repository Information

                        </h3>

                    </div>

                    <div class="card-body table-responsive p-0">

                        <table class="table table-striped">

                            <tr>

                                <th width="220">

                                    Repository Name

                                </th>

                                <td>

                                    {{ $git['repository_name'] }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Current Branch

                                </th>

                                <td>

                                    <span class="badge badge-primary">

                                        {{ $git['branch'] }}

                                    </span>

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Default Branch

                                </th>

                                <td>

                                    {{ $git['default_branch'] }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Git Version

                                </th>

                                <td>

                                    {{ $git['git_version'] }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Commit Count

                                </th>

                                <td>

                                    {{ $git['commit_count'] }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Repository Size

                                </th>

                                <td>

                                    {{ $git['repository_size'] }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Remote URL

                                </th>

                                <td>

                                    <code>

                                        {{ $git['remote_url'] }}

                                    </code>

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Last Commit

                                </th>

                                <td>

                                    <code>

                                        {{ $git['last_hash'] }}

                                    </code>

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Last Commit Message

                                </th>

                                <td>

                                    {{ $git['last_message'] }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Last Commit Date

                                </th>

                                <td>

                                    {{ $git['last_date'] }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Last Author

                                </th>

                                <td>

                                    {{ $git['last_commit_author'] }}

                                    &lt;{{ $git['last_commit_email'] }}&gt;

                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card card-outline card-success">

                    <div class="card-header">

                        <h3 class="card-title">

                            Repository Health

                        </h3>

                    </div>

                    <div class="card-body">

                        <div class="progress-group">

                            Repository Exists

                            <span class="float-right">

                                <strong>

                                    {{ $git['repository'] ? 'Yes' : 'No' }}

                                </strong>

                            </span>

                            <div class="progress">

                                <div class="progress-bar bg-success" style="width:100%">

                                </div>

                            </div>

                        </div>

                        <div class="progress-group">

                            Working Tree

                            <span class="float-right">

                                <strong>

                                    {{ $git['working_tree'] ? 'Clean' : 'Modified' }}

                                </strong>

                            </span>

                            <div class="progress">

                                <div class="progress-bar

                                {{ $git['working_tree'] ? 'bg-success' : 'bg-warning' }}"
                                    style="width:100%">

                                </div>

                            </div>

                        </div>

                        <div class="progress-group">

                            Remote Connected

                            <span class="float-right">

                                <strong>

                                    {{ $git['connected'] ? 'Yes' : 'No' }}

                                </strong>

                            </span>

                            <div class="progress">

                                <div class="progress-bar bg-info" style="width:100%">

                                </div>

                            </div>

                        </div>

                        <div class="progress-group">

                            Latest Commit

                            <span class="float-right">

                                <strong>

                                    {{ $git['latest_commit'] ? 'OK' : 'Missing' }}

                                </strong>

                            </span>

                            <div class="progress">

                                <div class="progress-bar bg-success" style="width:100%">

                                </div>

                            </div>

                        </div>

                        <div class="progress-group">

                            Overall Health

                            <span class="float-right">

                                <strong>

                                    {{ $git['health'] }}%

                                </strong>

                            </span>

                            <div class="progress">

                                <div class="progress-bar bg-success" style="width:{{ $git['health'] }}%">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- ===================== Statistics ===================== --}}

        <div class="row">

            <div class="col-md-6">

                <div class="card card-outline card-info">

                    <div class="card-header">

                        <h3 class="card-title">

                            Repository Statistics

                        </h3>

                    </div>

                    <div class="card-body table-responsive p-0">

                        <table class="table table-hover">

                            <tr>

                                <th>Local Branches</th>

                                <td>

                                    {{ count($git['local_branches']) }}

                                </td>

                            </tr>

                            <tr>

                                <th>Remote Branches</th>

                                <td>

                                    {{ count($git['remote_branches']) }}

                                </td>

                            </tr>

                            <tr>

                                <th>Total Contributors</th>

                                <td>

                                    {{ $git['total_contributors'] }}

                                </td>

                            </tr>

                            <tr>

                                <th>Status</th>

                                <td>

                                    @if ($git['working_tree'])
                                        <span class="badge badge-success">

                                            Clean

                                        </span>
                                    @else
                                        <span class="badge badge-warning">

                                            Modified

                                        </span>
                                    @endif

                                </td>

                            </tr>

                            <tr>

                                <th>Remote</th>

                                <td>

                                    {{ $git['remote_name'] }}

                                </td>

                            </tr>

                            <tr>

                                <th>Default Remote Branch</th>

                                <td>

                                    {{ $git['default_remote_branch'] }}

                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <div class="card card-outline card-secondary">

                    <div class="card-header">

                        <h3 class="card-title">

                            Remote Information

                        </h3>

                    </div>

                    <div class="card-body table-responsive p-0">

                        <table class="table table-striped">

                            <tr>

                                <th width="180">

                                    Fetch URL

                                </th>

                                <td>

                                    <code>

                                        {{ $git['fetch_url'] }}

                                    </code>

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Push URL

                                </th>

                                <td>

                                    <code>

                                        {{ $git['push_url'] }}

                                    </code>

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Repository Path

                                </th>

                                <td>

                                    <code>

                                        {{-- {{ $project->environment->project_path }} --}}

                                    </code>

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Environment

                                </th>

                                <td>

                                    {{-- {{ $project->environment->environment }} --}}

                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

            </div>

        </div>
    </div>
@stop
