"use strict";

window.RepositorySearch = {
    timer: null,

    initialize() {
        this.search();
    },

    search() {
        $("#repository-search").on("keyup", () => {
            clearTimeout(this.timer);

            this.timer = setTimeout(() => {
                $.ajax({
                    url: window.repositorySearchUrl,

                    type: "GET",

                    data: {
                        keyword: $("#repository-search").val(),
                    },

                    success: (response) => {
                        RepositorySearch.render(response.data);
                    },
                });
            }, 300);
        });
    },

    render(commits) {
        let html = "";

        commits.forEach((commit) => {
            html += RepositorySearch.card(commit);
        });

        $("#repository-commits").html(html);
    },

    card(commit) {
        let files = "";

        commit.files.forEach((file) => {
            files += `

            <tr>

                <td>${file.file}</td>

                <td class="text-center text-success">

                    +${file.added}

                </td>

                <td class="text-center text-danger">

                    -${file.deleted}

                </td>

            </tr>

            `;
        });

        return `

<div class="card commit-card repository-card">

<div class="card-header">

<div class="commit-header">

<div>

<h5>${commit.message}</h5>

<div class="commit-meta">

${commit.author}

•

${commit.date}

</div>

</div>

<div>

<span class="commit-hash">${commit.short_hash}</span>

<span class="commit-added">+${commit.added}</span>

<span class="commit-deleted">-${commit.deleted}</span>

</div>

</div>

</div>

<div class="card-body p-0">

<table class="table commit-table">

<tbody>

${files}

</tbody>

</table>

</div>

</div>

`;
    },
};

$(function () {
    RepositorySearch.initialize();
});
