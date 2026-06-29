<div class="card-body">
    <div class="row">
        <div class="form-group col-md-6">

            <label>Laravel Version</label>

            <input class="form-control" name="laravel_version"
                value="{{ old('laravel_version', optional($project->environment)->laravel_version) }}">

        </div>

        <div class="form-group col-md-6">

            <label>PHP Version</label>

            <input class="form-control" name="php_version"
                value="{{ old('php_version', optional($project->environment)->php_version) }}">

        </div>

        <div class="form-group col-md-6">

            <label>PHP Binary</label>

            <input class="form-control" name="php_binary"
                value="{{ old('php_binary', optional($project->environment)->php_binary ?? '/usr/bin/php') }}">

        </div>

        <div class="form-group col-md-6">

            <label>Composer Binary</label>

            <input class="form-control" name="composer_binary"
                value="{{ old('composer_binary', optional($project->environment)->composer_binary ?? '/usr/local/bin/composer') }}">

        </div>

        <div class="form-group col-md-6">

            <label>Node Version</label>

            <input class="form-control" name="node_version"
                value="{{ old('node_version', optional($project->environment)->node_version) }}">

        </div>

        <div class="form-group col-md-6">

            <label>NPM Binary</label>

            <input class="form-control" name="npm_binary"
                value="{{ old('npm_binary', optional($project->environment)->npm_binary) }}">

        </div>

    </div>
</div>
