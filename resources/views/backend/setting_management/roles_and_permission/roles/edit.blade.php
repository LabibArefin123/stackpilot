@extends('adminlte::page')

@section('title', 'Edit Role')

@section('content_header')

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h1 class="mb-0">

                <i class="fas fa-user-shield text-primary"></i>

                Edit Role

            </h1>

            <small class="text-muted">

                {{ $role->name }}

            </small>

        </div>

        <a href="{{ route('roles.index') }}" class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Back

        </a>

    </div>

@stop

@section('content')

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    @if ($newPermissions->count())
        <div class="alert alert-warning shadow-sm">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <i class="fas fa-bell"></i>

                    <strong>

                        {{ $newPermissions->count() }}

                    </strong>

                    new permissions detected.

                </div>

                <button class="btn btn-warning btn-sm" id="showNewPermissions">

                    <i class="fas fa-eye"></i>

                    Show

                </button>

            </div>

        </div>
    @endif


    <form action="{{ route('roles.update', $role->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="card card-outline card-primary">

            <div class="card-header">

                <h3 class="card-title">

                    Role Information

                </h3>

            </div>

            <div class="card-body">

                <div class="form-group">

                    <label>

                        Role Name

                    </label>

                    <input type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}">

                </div>

            </div>

        </div>



        <div class="card card-outline card-primary">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-key mr-2"></i>

                    All Permissions

                </h3>

                <div class="card-tools">

                    <button type="button" class="btn btn-primary btn-sm" id="selectAllPermissions">

                        Select All

                    </button>

                    <button type="button" class="btn btn-danger btn-sm" id="unselectAllPermissions">

                        Unselect All

                    </button>

                </div>

            </div>

        </div>


        @foreach ($groupedPermissions as $group => $groupPermissions)
            <div class="card card-outline card-info permission-group" id="group-{{ $group }}">

                <div class="card-header">

                    <h3 class="card-title text-uppercase">

                        {{ ucfirst($group) }}

                        <span class="badge badge-primary">

                            {{ $groupPermissions->count() }}

                        </span>

                    </h3>

                    <div class="card-tools">

                        <button type="button" class="btn btn-xs btn-outline-primary select-all-btn"
                            data-group="{{ $group }}">

                            Select

                        </button>

                        <button type="button" class="btn btn-xs btn-outline-danger unselect-all-btn"
                            data-group="{{ $group }}">

                            Unselect

                        </button>

                        <button class="btn btn-tool" data-card-widget="collapse">

                            <i class="fas fa-minus"></i>

                        </button>

                    </div>

                </div>

                <div class="card-body permission-scroll">

                    <div class="row">

                        @foreach ($groupPermissions as $permission)
                            @php

                                $isNew = !in_array($permission->name, $rolePermissions);

                            @endphp

                            <div class="col-lg-4 col-md-6 mb-2 {{ $isNew ? 'new-permission' : '' }}">

                                <div class="form-check">

                                    <input type="checkbox" class="form-check-input perm-all perm-{{ $group }}"
                                        name="permissions[]" value="{{ $permission->name }}"
                                        id="perm{{ $permission->id }}"
                                        {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>

                                    <label class="form-check-label" for="perm{{ $permission->id }}">

                                        {{ $permission->name }}

                                        @if ($isNew)
                                            <span class="badge badge-warning">

                                                NEW

                                            </span>
                                        @endif

                                    </label>

                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>
        @endforeach


        <div class="mt-4">

            {{ $permissions->links('pagination::bootstrap-5') }}

        </div>


        <div class="text-right mt-4">

            <button class="btn btn-success btn-lg">

                <i class="fas fa-save"></i>

                Update Role

            </button>

        </div>

    </form>

@endsection


@push('css')
    <style>
        .permission-scroll {

            max-height: 400px;

            overflow-y: auto;

        }

        .permission-scroll::-webkit-scrollbar {

            width: 8px;

        }

        .new-permission {

            animation: fadeIn .5s;

        }

        @keyframes fadeIn {

            from {

                opacity: .3;

                transform: translateY(8px);

            }

            to {

                opacity: 1;

                transform: none;

            }

        }
    </style>
@endpush


@push('js')
    <script src="{{ asset('js/custom_backend/setting_management/roles/edit_page/permissions.js') }}"></script>

    <script src="{{ asset('js/custom_backend/setting_management/roles/edit_page/notifications.js') }}"></script>
@endpush
