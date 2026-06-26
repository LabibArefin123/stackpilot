<div class="card-header">

    <h3 class="card-title">

        <i class="fas fa-network-wired text-info"></i>

        Remote Repository

    </h3>

</div>

<div class="card-body">

    <table class="table table-bordered">

        <tr>

            <th width="220">

                Remote Name

            </th>

            <td>

                <span class="badge badge-primary">

                    {{ $git['remote_name'] }}

                </span>

            </td>

        </tr>

        <tr>

            <th>

                Repository URL

            </th>

            <td>

                <code>

                    {{ $git['remote_url'] }}

                </code>

            </td>

        </tr>

        <tr>

            <th>

                Fetch URL

            </th>

            <td>

                {{ $git['fetch_url'] }}

            </td>

        </tr>

        <tr>

            <th>

                Push URL

            </th>

            <td>

                {{ $git['push_url'] }}

            </td>

        </tr>

        <tr>

            <th>

                Default Remote Branch

            </th>

            <td>

                <span class="badge badge-success">

                    {{ $git['default_remote_branch'] }}

                </span>

            </td>

        </tr>

        <tr>

            <th>

                Connection

            </th>

            <td>

                @if ($git['connected'])
                    <span class="badge badge-success">

                        Connected

                    </span>
                @else
                    <span class="badge badge-danger">

                        Offline

                    </span>
                @endif

            </td>

        </tr>

    </table>

</div>
