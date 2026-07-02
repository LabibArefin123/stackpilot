/*
|--------------------------------------------------------------------------
| Local Terminal - PHP / Node Version Handling
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Load PHP Versions
|--------------------------------------------------------------------------
*/

function loadPHPVersions() {
    $.get("/terminal/php", function (response) {
        let select = $("#php_version");

        if (!select.length) return;

        select.empty();

        $.each(response.php_versions || [], function (i, php) {
            select.append(
                '<option value="' + php.path + '">' + php.version + "</option>",
            );
        });

        if ((response.php_versions || []).length > 0) {
            $("#runningPHP").text(response.php_versions[0].version);
            $("#phpLocation").text(response.php_versions[0].path);
        } else {
            $("#runningPHP").text("--");
            $("#phpLocation").text("--");
        }
    });
}

/*
|--------------------------------------------------------------------------
| Load Node Versions
|--------------------------------------------------------------------------
*/

function loadNodeVersions() {
    $.get("/terminal/node", function (response) {
        let select = $("#node_version");

        if (!select.length) return;

        select.empty();

        $.each(response.node_versions || [], function (i, node) {
            select.append(
                '<option value="' + node.path + '">' + node.name + "</option>",
            );
        });

        if ((response.node_versions || []).length > 0) {
            $("#runningNode").text(response.node_versions[0].name);
            $("#nodeLocation").text(response.node_versions[0].path);
        } else {
            $("#runningNode").text("--");
            $("#nodeLocation").text("--");
        }
    });
}

/*
|--------------------------------------------------------------------------
| Load Composer Version
|--------------------------------------------------------------------------
*/

function loadComposerVersion() {

    $.get("/terminal/composer", function (response) {

        if (response.success && response.composer) {

            $("#composerVersion").text(response.composer.version);

            $("#composerLocation").text(response.composer.path);

        } else {

            $("#composerVersion").text("--");

            $("#composerLocation").text("--");

        }

    });

}
/*
|--------------------------------------------------------------------------
| Load Git Version
|--------------------------------------------------------------------------
*/

function loadGitVersion() {

    $.get("/terminal/git", function (response) {

        if (response.success && response.git) {

            $("#gitVersion").text(response.git.version);

            $("#gitLocation").text(response.git.path);

        } else {

            $("#gitVersion").text("--");

            $("#gitLocation").text("--");

        }

    });

}