"use strict";

window.RepositorySearch = {
    timer: null,

    initialize() {
        this.bindSearch();
    },

    bindSearch() {
        $("#repository-search").on("keyup", () => {
            clearTimeout(this.timer);

            this.timer = setTimeout(() => {
                this.load();
            }, 300);
        });
    },

    load() {
        $.ajax({
            url: window.repositorySearchUrl,

            type: "GET",

            data: {
                keyword: $("#repository-search").val().trim(),

                author: $("#repository-author").val(),

                date: $("#repository-date").val(),
            },

            success: (response) => {
                if (response.success) {
                    this.render(response.data);
                }
            },
        });
    },

    highlight(text, keyword) {
        if (!keyword) {
            return text;
        }

        const escaped = keyword.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");

        const regex = new RegExp("(" + escaped + ")", "gi");

        return text.replace(
            regex,
            "<mark class='repository-highlight'>$1</mark>",
        );
    },

    render(timeline) {
        let html = "";

        if (!timeline.length) {
            html = `

                <div class="alert alert-info text-center">

                    No commits found.

                </div>

            `;

            $("#repository-commits").html(html);

            return;
        }

        timeline.forEach((day) => {
            html += `

            <div class="repository-date-header mb-3">

                <div class="d-flex justify-content-between align-items-center">

                    <h4>

                        <i class="far fa-calendar-alt text-primary"></i>

                        ${day.date}

                    </h4>

                    <div>

                        <span class="badge badge-primary">

                            ${day.total} Commits

                        </span>

                        <span class="badge badge-success">

                            +${day.added}

                        </span>

                        <span class="badge badge-danger">

                            -${day.deleted}

                        </span>

                    </div>

                </div>

            </div>

            `;

            day.commits.forEach((commit) => {
                html += this.card(commit);
            });
        });

        $("#repository-commits").html(html);
    },

    card(commit) {
        const keyword = $("#repository-search").val().trim();

        const message = this.highlight(commit.message, keyword);

        const author = this.highlight(commit.author, keyword);

        const hash = this.highlight(commit.short_hash, keyword);

        let files = "";

        commit.files.forEach((file) => {
            files += `

            <tr>

                <td class="repository-file">

                    <i class="far fa-file-code text-primary mr-2"></i>

                  ${this.highlight(file.file, keyword)}

                </td>

                <td class="text-center">

                    <span class="text-success">

                        +${file.added}

                    </span>

                </td>

                <td class="text-center">

                    <span class="text-danger">

                        -${file.deleted}

                    </span>

                </td>

            </tr>

            `;
        });

        return `

<div class="card commit-card repository-card mb-3">

    <div class="card-header">

        <div class="commit-header">

            <div class="commit-info">

                <h5 class="commit-title">

                    ${message}

                </h5>

                <div class="commit-meta">

                    <i class="fas fa-user"></i>

                    ${author}

                    <span class="commit-dot">•</span>

                    <i class="far fa-calendar-alt"></i>

                    ${commit.date}

                </div>

            </div>

            <div class="commit-right">

                <span class="commit-hash">

                    ${hash}

                </span>

                <span class="commit-added">

                    +${commit.added}

                </span>

                <span class="commit-deleted">

                    -${commit.deleted}

                </span>

            </div>

        </div>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table commit-table mb-0">

                <thead>

                    <tr>

                        <th>File</th>

                        <th width="110" class="text-center">

                            Added

                        </th>

                        <th width="110" class="text-center">

                            Deleted

                        </th>

                    </tr>

                </thead>

                <tbody>

                    ${files}

                </tbody>

            </table>

        </div>

    </div>

</div>

`;
    },
};

$(function () {
    RepositorySearch.initialize();
});
