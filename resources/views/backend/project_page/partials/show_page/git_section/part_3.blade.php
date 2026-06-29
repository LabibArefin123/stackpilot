<div class="card-header">
    <h3 class="card-title">
        <i class="fab fa-git-alt text-danger"></i>
        Repository Information
    </h3>
</div>

<div class="card-body">
    <table class="table table-bordered table-hover">
        <tr>
            <th width="260">Repository Name</th>
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
            <th>Remote Repository</th>
            <td>{{ $git['remote_url'] }}</td>
        </tr>

        <tr>
            <th>Latest Commit Hash</th>
            <td>
                <code>
                    {{ $git['last_hash'] }}
                </code>
            </td>
        </tr>

        <tr>
            <th>Latest Commit Message</th>
            <td>{{ $git['last_message'] }} </td>
        </tr>

        <tr>
            <th>Latest Commit Date</th>
            <td>{{ $git['last_date'] }}</td>
        </tr>

        <tr>
            <th>Git Version</th>
            <td>{{ $git['git_version'] }}</td>
        </tr>

        <tr>
            <th>Default Branch</th>
            <td>{{ $git['default_branch'] }}</td>
        </tr>

        <tr>
            <th>Total Branches</th>
            <td>{{ $git['branch_count'] }}</td>
        </tr>

        <tr>
            <th>Total Commits</th>
            <td>{{ $git['commit_count'] }}</td>
        </tr>
    </table>
</div>
