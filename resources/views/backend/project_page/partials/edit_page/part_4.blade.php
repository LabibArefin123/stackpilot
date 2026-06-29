<div class="card-body">
    <div class="row">
        <div class="form-group col-md-6">

            <label>Server Name</label>

            <input class="form-control" name="server_name"
                value="{{ old('server_name', optional($project->environment)->server_name) }}">

        </div>

        <div class="form-group col-md-6">

            <label>Server IP</label>

            <input class="form-control" name="server_ip"
                value="{{ old('server_ip', optional($project->environment)->server_ip) }}">

        </div>

        <div class="form-group col-md-6">

            <label>SSH User</label>

            <input class="form-control" name="ssh_user"
                value="{{ old('ssh_user', optional($project->environment)->ssh_user) }}">

        </div>

        <div class="form-group col-md-6">

            <label>SSH Port</label>

            <input class="form-control" name="ssh_port"
                value="{{ old('ssh_port', optional($project->environment)->ssh_port ?? 22) }}">

        </div>

    </div>
</div>
