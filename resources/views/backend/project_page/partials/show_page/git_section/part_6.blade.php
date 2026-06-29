<div class="card-header">
    <h3 class="card-title">
        <i class="fas fa-code-branch text-primary"></i>
        Git Branches
    </h3>
</div>

<div class="card-body">
    <div class="row">
        {{-- Local Branches --}}
        @include('backend.project_page.partials.show_page.git_section.part_6_a')
        {{-- Remote Branches --}}
        @include('backend.project_page.partials.show_page.git_section.part_6_b')
    </div>
</div>
