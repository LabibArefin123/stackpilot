{{-- Git Information --}}
<div class="col-md-12">

    <div class="card card-outline card-primary">

        <div class="card-header">

            <h3 class="card-title">

                <i class="fab fa-git-alt mr-2"></i>

                Git Repository

            </h3>

        </div>

        <div class="card-body table-responsive p-0">

            <table class="table table-striped">

                <tr>
                    <th width="220">Repository</th>
                    <td>{{ $project->deployment->repository ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Branch</th>
                    <td>

                        <span class="badge badge-info">

                            {{ $project->deployment->branch ?? '-' }}

                        </span>

                    </td>
                </tr>

                <tr>
                    <th>Commit Hash</th>
                    <td>

                        <code>

                            {{ $project->deployment->commit_hash ?? '-' }}

                        </code>

                    </td>

                </tr>

                <tr>
                    <th>Commit Message</th>
                    <td>{{ $project->deployment->commit_message ?? '-' }}</td>
                </tr>

            </table>

        </div>

    </div>

</div>
