@extends('adminlte::page')

@section('title', 'Installed Composer Packages')

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="card card-primary card-outline">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-cubes"></i>

                        Installed Composer Packages

                    </h3>

                </div>

                <div class="card-body">

                    <div class="form-group">

                        <label>Select Project</label>

                        <select id="project" class="form-control">

                            <option value="">Choose Project</option>

                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">

                                    {{ $project->name }}

                                </option>
                            @endforeach

                        </select>

                    </div>

                    <hr>

                    <table class="table table-bordered table-hover" id="packageTable">

                        <thead>

                            <tr>

                                <th width="50">#</th>

                                <th>Package</th>

                                <th width="180">Version</th>

                                <th width="180">Type</th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr>

                                <td colspan="4" class="text-center">

                                    Select a project.

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

@endsection

@push('js')
    <script>
        $('#project').change(function() {

            let id = $(this).val();

            if (id == '') return;

            let tbody = $('#packageTable tbody');

            tbody.html(
                '<tr><td colspan="4" class="text-center"><i class="fas fa-spinner fa-spin"></i> Loading...</td></tr>'
            );

            $.get('/composer/' + id + '/packages', function(data) {

                let html = '';

                let i = 1;

                $.each(data, function(index, item) {

                    html += `

                <tr>

                    <td>${i++}</td>

                    <td>${item.name}</td>

                    <td>${item.version}</td>

                    <td>

                        <span class="badge badge-${item.type=='Dependency'?'success':'warning'}">

                            ${item.type}

                        </span>

                    </td>

                </tr>

            `;

                });

                if (html == '')

                    html = '<tr><td colspan="4" class="text-center">No packages found.</td></tr>';

                tbody.html(html);

            });

        });
    </script>
@endpush
