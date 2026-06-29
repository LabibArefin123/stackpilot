<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            Deployment Commands

        </h3>

    </div>

    <div class="card-body table-responsive p-0">

        <table class="table table-hover">

            <thead>

                <tr>

                    <th>Command</th>

                    <th>Value</th>

                </tr>

            </thead>

            <tbody>

                <tr>
                    <td>Git Pull</td>
                    <td><code>{{ $project->deployment->git_pull_command ?? '-' }}</code></td>
                </tr>

                <tr>
                    <td>Composer Install</td>
                    <td><code>{{ $project->deployment->composer_install_command ?? '-' }}</code></td>
                </tr>

                <tr>
                    <td>NPM Build</td>
                    <td><code>{{ $project->deployment->npm_build_command ?? '-' }}</code></td>
                </tr>

                <tr>
                    <td>Migration</td>
                    <td><code>{{ $project->deployment->migration_command ?? '-' }}</code></td>
                </tr>

                <tr>
                    <td>Cache Clear</td>
                    <td><code>{{ $project->deployment->cache_clear_command ?? '-' }}</code></td>
                </tr>

            </tbody>

        </table>

    </div>

</div>
