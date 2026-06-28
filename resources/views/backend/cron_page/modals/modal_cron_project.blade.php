<div class="modal fade" id="cronProjectsModal">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <div class="modal-header bg-primary">

                <h5 class="modal-title">

                    <i class="fas fa-clock"></i>

                    All Laravel Cron Commands

                </h5>

                <button class="close" data-dismiss="modal">

                    &times;

                </button>

            </div>

            <div class="modal-body">

                <table class="table table-bordered table-hover">

                    <thead>

                        <tr>

                            <th width="40">#</th>

                            <th>Project</th>

                            <th>Cron Command</th>

                            <th width="70">Copy</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($projects as $project)
                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>

                                    <strong>{{ $project->name }}</strong>

                                </td>

                                <td>

                                    <input class="form-control" readonly value="{{ $project->cron['command'] }}">

                                </td>

                                <td>

                                    <button class="btn btn-success copy-cron"
                                        data-command="{{ $project->cron['command'] }}">

                                        <i class="fas fa-copy"></i>

                                    </button>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
