@extends('adminlte::page')

@section('title','Deployments')

@section('content')

<div class="row">

    <div class="col-md-3">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>{{ $deployments->where('status','success')->count() }}</h3>

                <p>Successful</p>

            </div>

            <div class="icon">

                <i class="fas fa-check-circle"></i>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="small-box bg-danger">

            <div class="inner">

                <h3>{{ $deployments->where('status','failed')->count() }}</h3>

                <p>Failed</p>

            </div>

            <div class="icon">

                <i class="fas fa-times-circle"></i>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>{{ $deployments->sum('success_count') }}</h3>

                <p>Total Success</p>

            </div>

            <div class="icon">

                <i class="fas fa-rocket"></i>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>{{ $deployments->sum('failed_count') }}</h3>

                <p>Total Failed</p>

            </div>

            <div class="icon">

                <i class="fas fa-bug"></i>

            </div>

        </div>

    </div>

</div>

<div class="card card-outline card-primary">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-rocket"></i>

            Deployment History

        </h3>

    </div>

    <div class="card-body table-responsive">

        <table class="table table-hover" id="dataTables">

            <thead>

            <tr>

                <th>Project</th>

                <th>Status</th>

                <th>Method</th>

                <th>Server</th>

                <th>Version</th>

                <th>Release</th>

                <th>Build</th>

                <th>Duration</th>

                <th>Artifact</th>

                <th>Deployed</th>

                <th width="130">Actions</th>

            </tr>

            </thead>

            <tbody>

            @forelse($deployments as $deployment)

                <tr>

                    <td>

                        {{ optional($deployment->project)->name }}

                    </td>

                    <td>

                        @if($deployment->status=='success')

                            <span class="badge badge-success">

                                Success

                            </span>

                        @elseif($deployment->status=='failed')

                            <span class="badge badge-danger">

                                Failed

                            </span>

                        @else

                            <span class="badge badge-warning">

                                {{ ucfirst($deployment->status) }}

                            </span>

                        @endif

                    </td>

                    <td>

                        {{ $deployment->method }}

                    </td>

                    <td>

                        {{ $deployment->server }}

                    </td>

                    <td>

                        {{ $deployment->version }}

                    </td>

                    <td>

                        {{ $deployment->release_version }}

                    </td>

                    <td>

                        {{ $deployment->build_number }}

                    </td>

                    <td>

                        {{ $deployment->build_duration }}

                    </td>

                    <td>

                        {{ $deployment->artifact_name }}

                    </td>

                    <td>

                        {{ optional($deployment->deployed_at)->diffForHumans() }}

                    </td>

                    <td>

                        <div class="btn-group">

                            <a href="{{ route('deployments.show',$deployment) }}"
                               class="btn btn-xs btn-info">

                                <i class="fas fa-eye"></i>

                            </a>

                            <a href="{{ route('deployments.edit',$deployment) }}"
                               class="btn btn-xs btn-warning">

                                <i class="fas fa-edit"></i>

                            </a>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="11" class="text-center">

                        No deployment records found.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>
<div style="height: 50px;"></div>
@endsection