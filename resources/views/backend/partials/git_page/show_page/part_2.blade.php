<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-info-circle mr-2"></i>
                    Repository Information
                </h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th width="220">Repository Name</th>
                        <td>{{ $git['repository_name'] }}</td>
                    </tr>

                    <tr>
                        <th>Current Branch</th>
                        <td>
                            <span class="badge badge-primary">
                                {{ $git['branch'] }}
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <th>Default Branch</th>
                        <td>{{ $git['default_branch'] }}</td>
                    </tr>

                    <tr>
                        <th>Git Version</th>
                        <td> {{ $git['git_version'] }}</td>
                    </tr>

                    <tr>
                        <th>Commit Count</th>
                        <td>{{ $git['commit_count'] }}</td>
                    </tr>

                    <tr>
                        <th>Repository Size</th>
                        <td>{{ $git['repository_size'] }}</td>
                    </tr>

                    <tr>
                        <th>Remote URL</th>
                        <td>
                            <code>
                                {{ $git['remote_url'] }}
                            </code>
                        </td>
                    </tr>

                    <tr>
                        <th>Last Commit</th>
                        <td>
                            <code>
                                {{ $git['last_hash'] }}
                            </code>
                        </td>
                    </tr>

                    <tr>
                        <th>Last Commit Message</th>
                        <td>{{ $git['last_message'] }}</td>
                    </tr>

                    <tr>
                        <th>Last Commit Date </th>
                        <td>
                            {{ $git['last_date'] }}
                        </td>
                    </tr>

                    <tr>
                        <th>Last Author</th>
                        <td>
                            {{ $git['last_commit_author'] }}
                            &lt;{{ $git['last_commit_email'] }}&gt;
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
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
