<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label> Live Project</label>
            <select class="form-control" id="live_project">
                <option value="">Select Project</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" data-domain="{{ $project->domain }}"
                        data-api="{{ $project->api_name }}">
                        {{ $project->project_name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Server Root</label>
            <input class="form-control" value="/home/labibwor/" readonly>
        </div>
    </div>
</div>
