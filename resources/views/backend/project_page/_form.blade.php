{{-- GENERAL INFORMATION PART --}}
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-project-diagram mr-2"></i>
            General Information
        </h3>
    </div>

   @include('backend.project_page.partials.edit_page.part_1')
</div>

{{-- ENVIRONMENT PART --}}
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-server mr-2"></i>
            Environment
        </h3>
    </div>

   @include('backend.project_page.partials.edit_page.part_2')
</div>

{{-- RUNTIME PART --}}
<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            Runtime
        </h3>
    </div>

    @include('backend.project_page.partials.edit_page.part_3')
</div>

{{-- SERVER PART --}}
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">
            Server Configuration
        </h3>
    </div>

    @include('backend.project_page.partials.edit_page.part_4')
</div>

<div class="card">
    <div class="card-footer">
        <button class="btn btn-primary">
            <i class="fas fa-save mr-1"></i>
            {{ isset($project) ? 'Update Project' : 'Create Project' }}
        </button>

        <a href="{{ route('projects.index') }}" class="btn btn-default">
            Cancel
        </a>
    </div>
</div>
