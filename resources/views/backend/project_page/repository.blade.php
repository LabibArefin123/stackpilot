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

        {{-- Repository Filter Section --}}
        @include('backend.project_page.partials.repository_page.part_1')

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

                @include('backend.project_page.partials.repository_page.day_commit')
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
    <script src="{{ asset('js/custom_backend/project_page/repository_page/repository-init.js') }}"></script>
    <script src="{{ asset('js/custom_backend/project_page/repository_page/repository-ajax.js') }}"></script>
    <script src="{{ asset('js/custom_backend/project_page/repository_page/repository-filter.js') }}"></script>
    <script src="{{ asset('js/custom_backend/project_page/repository_page/repository-events.js') }}"></script>
    <script src="{{ asset('js/custom_backend/project_page/repository_page/repository-render.js') }}"></script>
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
