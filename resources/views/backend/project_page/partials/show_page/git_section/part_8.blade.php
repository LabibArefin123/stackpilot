<div class="card-header">

    <h3 class="card-title">

        <i class="fas fa-chart-bar text-success"></i>

        Git Statistics

    </h3>

</div>

<div class="card-body">

    <div class="row">

        <div class="col-md-3">

            <div class="small-box bg-primary">

                <div class="inner">

                    <h3>

                        {{ $git['commit_count'] }}

                    </h3>

                    <p>

                        Total Commits

                    </p>

                </div>

                <div class="icon">

                    <i class="fas fa-code-commit"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="small-box bg-success">

                <div class="inner">

                    <h3>

                        {{ $git['branch_count'] }}

                    </h3>

                    <p>

                        Total Branches

                    </p>

                </div>

                <div class="icon">

                    <i class="fas fa-code-branch"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="small-box bg-warning">

                <div class="inner">

                    <h3>

                        {{ $git['total_contributors'] }}

                    </h3>

                    <p>

                        Contributors

                    </p>

                </div>

                <div class="icon">

                    <i class="fas fa-users"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="small-box bg-danger">

                <div class="inner">

                    <h3>

                        {{ $git['health'] }}%

                    </h3>

                    <p>

                        Repository Health

                    </p>

                </div>

                <div class="icon">

                    <i class="fas fa-heartbeat"></i>

                </div>

            </div>

        </div>

    </div>

    <table class="table table-hover">

        <tr>

            <th width="250">

                Last Commit Author

            </th>

            <td>

                {{ $git['last_commit_author'] }}

            </td>

        </tr>

        <tr>

            <th>

                Author Email

            </th>

            <td>

                {{ $git['last_commit_email'] }}

            </td>

        </tr>

        <tr>

            <th>

                Current Branch

            </th>

            <td>

                {{ $git['branch'] }}

            </td>

        </tr>

        <tr>

            <th>

                Latest Commit

            </th>

            <td>

                <code>

                    {{ $git['last_hash'] }}

                </code>

            </td>

        </tr>

    </table>

</div>
