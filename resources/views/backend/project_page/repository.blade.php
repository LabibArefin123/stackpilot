@extends('adminlte::page')

@section('title', 'Repository')

<link rel="stylesheet"
    href="{{ asset('css/custom_backend/project_page/repository_page/commit_history/commit-layout.css') }}">
<link rel="stylesheet"
    href="{{ asset('css/custom_backend/project_page/repository_page/commit_history/commit-card.css') }}">
<link rel="stylesheet"
    href="{{ asset('css/custom_backend/project_page/repository_page/commit_history/commit-badge.css') }}">
<link rel="stylesheet"
    href="{{ asset('css/custom_backend/project_page/repository_page/commit_history/commit-table.css') }}">
<link rel="stylesheet"
    href="{{ asset('css/custom_backend/project_page/repository_page/commit_history/commit-responsive.css') }}">
<link rel="stylesheet"
    href="{{ asset('css/custom_backend/project_page/repository_page/rep-highlight/highlight.css') }}">
<link rel="stylesheet"
    href="{{ asset('css/custom_backend/project_page/repository_page/rep-highlight/code-view.css') }}">

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h3 class="mb-1">

                        <i class="fas fa-code-branch text-primary mr-2"></i>

                        {{ $project->name }}

                        Repository

                    </h3>

                    <small class="text-muted">

                        Browse commit history, search commits and inspect repository changes.

                    </small>

                </div>

                <div>
                    <span class="badge badge-primary p-2 mr-2">
                        {{-- {{ count($commits) }} --}}
                        Commits
                        <button class="btn btn-sm btn-light btn-expand ml-2">

                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <section class="content">

        @php

            $authors = collect($timeline)
                ->flatMap(fn($day) => $day['commits'])
                ->pluck('author')
                ->unique()
                ->sort()
                ->values();

        @endphp

        <div class="card repository-toolbar mb-3">

            <div class="card-body">

                <div class="row align-items-center">

                    <div class="col-lg-3">

                        <input id="repository-search" class="form-control" type="text"
                            placeholder="Search commit, author or hash...">

                    </div>

                    <div class="col-lg-2">

                        <select id="repository-author" class="form-control">

                            <option value="">All Authors</option>

                            @foreach ($authors as $author)
                                <option value="{{ $author }}">

                                    {{ $author }}

                                </option>
                            @endforeach

                        </select>

                    </div>

                    <div class="col-lg-2">

                        <input type="date" id="repository-date" class="form-control">

                    </div>

                    <div class="col-lg-5 text-right">

                        <button class="btn btn-outline-dark btn-scroll-top">

                            <i class="fas fa-arrow-up"></i>

                        </button>

                    </div>

                </div>

            </div>

        </div>

        <div id="repository-commits" class="container-fluid commit-layout">

            @forelse($timeline as $day)

                <div class="repository-date-header mb-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h4 class="mb-1">

                                <i class="far fa-calendar-alt text-primary"></i>

                                {{ \Carbon\Carbon::parse($day['date'])->format('d M Y') }}

                            </h4>

                        </div>

                        <div>

                            <span class="badge badge-primary">

                                {{ $day['total'] }} Commits

                            </span>

                            <span class="badge badge-success">

                                +{{ $day['added'] }}

                            </span>

                            <span class="badge badge-danger">

                                -{{ $day['deleted'] }}

                            </span>

                        </div>

                    </div>

                </div>

                @foreach ($day['commits'] as $commit)
                    <div class="card commit-card repository-card mb-3">

                        <div class="card-header">

                            <div class="commit-header">

                                <div class="commit-info">

                                    <h5 class="commit-title">

                                        {{ $commit['message'] }}

                                    </h5>

                                    <div class="commit-meta">

                                        <i class="fas fa-user"></i>

                                        {{ $commit['author'] }}

                                        <span class="commit-dot mx-2">•</span>

                                        <i class="far fa-clock"></i>

                                        {{ $commit['date'] }}

                                    </div>

                                </div>

                                <div class="commit-right">

                                    <span class="commit-hash">

                                        {{ $commit['short_hash'] }}

                                    </span>

                                    <span class="commit-added">

                                        +{{ $commit['added'] }}

                                    </span>

                                    <span class="commit-deleted">

                                        -{{ $commit['deleted'] }}

                                    </span>

                                </div>

                            </div>

                        </div>

                        <div class="card-body p-0">

                            <div class="table-responsive">

                                <table class="table commit-table mb-0">

                                    <thead>

                                        <tr>

                                            <th>File</th>

                                            <th width="110" class="text-center">

                                                Added

                                            </th>

                                            <th width="110" class="text-center">

                                                Deleted

                                            </th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        @foreach ($commit['files'] as $file)
                                            <tr>

                                                <td class="repository-file">

                                                    <i class="far fa-file-code text-primary mr-2"></i>

                                                    {{ $file['file'] }}

                                                </td>

                                                <td class="text-center text-success">

                                                    +{{ $file['added'] }}

                                                </td>

                                                <td class="text-center text-danger">

                                                    -{{ $file['deleted'] }}

                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>
                @endforeach

            @empty

                <div class="alert alert-info">

                    No commits found.

                </div>

            @endforelse

        </div>

    </section>
    <div style="height: 50px;"></div>
@endsection

@section('js')
    {{-- TOP SECTION PART --}}
    <script>
        window.repositoryProject = {{ $project->id }};

        window.repositorySearchUrl = "{{ route('projects.repository.search', $project) }}";

        window.repositoryFilterUrl = "{{ route('projects.repository.filter', $project) }}";
    </script>
    <script src="{{ asset('js/custom_backend/project_page/repository_page/repository-toolbar.js') }}"></script>
    <script src="{{ asset('js/custom_backend/project_page/repository_page/repository-search.js') }}"></script>
    <script src="{{ asset('js/custom_backend/project_page/repository_page/repository-ui.js') }}"></script>
    <script src="{{ asset('js/custom_backend/project_page/repository_page/repository-navigation.js') }}"></script>
    <link id="highlight-theme" rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/styles/github.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/highlight.min.js"></script>
@endsection

{{-- 
@section('js')

    <script>
        /*
    Future Features

    1. Commit search

    2. Commit timeline

    3. File diff

    4. Side by side diff

    5. Syntax highlighting

    6. Filter by author

    7. Filter by date

    8. Download patch

    9. Copy commit hash

    10. Expand commit changes

    */
    </script>

@endsection --}}
