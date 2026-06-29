<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-folder-open mr-2"></i>
            Project Information
        </h3>
    </div>

    <div class="card-body">
        {{-- Select Project Part --}}
        @include('backend.project_page.partials.project_install.part_1_a')
        {{-- Statistics Card Part 1x4 --}}
        @include('backend.project_page.partials.project_install.part_1_b')
    </div>
</div>
