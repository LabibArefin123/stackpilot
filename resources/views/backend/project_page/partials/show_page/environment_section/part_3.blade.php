<div class="card card-outline card-success">
    <div class="card-header">
        <h3 class="card-title">
            Installed Binaries
        </h3>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Software</th>
                    <th>Binary</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>PHP</td>
                    <td><code>{{ $project->environment->php_binary }}</code></td>
                </tr>

                <tr>
                    <td>Composer</td>
                    <td><code>{{ $project->environment->composer_binary }}</code></td>
                </tr>

                <tr>
                    <td>Node</td>
                    <td><code>{{ $project->environment->node_binary }}</code></td>
                </tr>

                <tr>
                    <td>NPM</td>
                    <td><code>{{ $project->environment->npm_binary }}</code></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
