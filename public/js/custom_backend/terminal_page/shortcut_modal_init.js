$(function () {
    /*
    |--------------------------------------------------------------------------
    | Open Shortcut Modal
    |--------------------------------------------------------------------------
    */

    $(document).on("click", "#openShortcutModal", function () {
        $("#shortcutModal").modal("show");
    });

    /*
    |--------------------------------------------------------------------------
    | Close Modal
    |--------------------------------------------------------------------------
    */

    $(document).on("click", ".close-shortcut", function () {
        $("#shortcutModal").modal("hide");
    });

    /*
    |--------------------------------------------------------------------------
    | Shortcut Click
    |--------------------------------------------------------------------------
    */

    $(".shortcut").click(function () {
        let command = $(this).data("command");

        let commandMap = {
            artisan_optimize: "php artisan optimize",
            artisan_optimize_clear: "php artisan optimize:clear",
            artisan_migrate: "php artisan migrate",
            artisan_seed: "php artisan db:seed",
            artisan_storage: "php artisan storage:link",
            artisan_route_cache: "php artisan route:cache",
            artisan_config_cache: "php artisan config:cache",
            artisan_view_cache: "php artisan view:cache",

            composer_install: "composer install",
            composer_update: "composer update",
            composer_dump: "composer dump-autoload",

            npm_install: "npm install",
            npm_update: "npm update",
            npm_dev: "npm run dev",
            npm_build: "npm run build",

            git_status: "git status",
            git_pull: "git pull",
        };

        let text = commandMap[command] || command;

        $("#terminalCommand").val(text);

        $("#lastCommand").text(text);

        $("#terminalStatus").html(
            '<span class="badge badge-info">Ready</span>',
        );

        $("#shortcutModal").modal("hide");

        $("#terminalCommand").focus();
    });
});
