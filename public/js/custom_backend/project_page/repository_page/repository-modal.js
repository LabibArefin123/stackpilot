window.RepositoryModal = {
    loading: function (modal, content) {
        $(content).html(`
<pre class="repository-code-view m-0 p-4 text-center">
Loading...
</pre>
        `);

        $(modal).modal("show");
    },

    showDiff: function (file, hash, diff) {
        $("#repositoryDiffFile").text(file);

        $("#repositoryDiffHash").text(hash);

        $("#repositoryDiffContent").html(diff);

        $("#repositoryDiffModal").modal("show");
    },

    showFile: function (file, hash, code) {
        $("#repositoryFileName").text(file);

        $("#repositoryFileHash").text(hash);

        $("#repositoryFileContent").text(code);

        $("#repositoryFileModal").modal("show");
    },
};
