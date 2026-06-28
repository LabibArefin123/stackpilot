<div class="card card-outline card-success">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fab fa-git-alt"></i>

            Git Activity Logs

        </h3>

    </div>

    <div class="card-body">

        <table id="gitLogTable" class="table table-bordered table-striped table-hover">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Project</th>

                    <th>Branch</th>

                    <th>Commit</th>

                    <th>Author</th>

                    <th>Date</th>

                    <th>Message</th>

                </tr>

            </thead>

            <tbody>

                @forelse($gitLogs as $log)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $log['project'] }}</td>

                        <td>{{ $log['branch'] }}</td>

                        <td>

                            <code>{{ $log['hash'] }}</code>

                        </td>

                        <td>{{ $log['author'] }}</td>

                        <td>{{ $log['date'] }}</td>
                        <td style="white-space: normal; min-width:350px;">

                            @php

                                $lines = preg_split('/\r\n|\r|\n|;|,/', $log['message']);

                                $lines = array_filter(array_map('trim', $lines));

                            @endphp

                            @if (count($lines) > 1)
                                <ol class="mb-0 pl-3">

                                    @foreach ($lines as $line)
                                        <li>{{ $line }}</li>
                                    @endforeach

                                </ol>
                            @else
                                {{ $log['message'] }}
                            @endif

                        </td>
                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center text-muted">

                            <i class="fab fa-git-alt fa-3x mb-2"></i>

                            <br>

                            No Git activity found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>
