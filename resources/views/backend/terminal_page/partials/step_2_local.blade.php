<div class="card card-primary shadow">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-desktop"></i>
            Step 2 : Local Project
        </h3>
    </div>

    <div class="card-body">
        <div class="row">
            {{-- Project --}}
            @include('backend.terminal_page.partials.part_2_local.part_1_a')
            {{-- PHP --}}
            @include('backend.terminal_page.partials.part_2_local.part_1_b')
            {{-- Node --}}
            @include('backend.terminal_page.partials.part_2_local.part_1_c')
        </div>

        <hr>
        {{-- Project Cards 1 x 4 --}}
        @include('backend.terminal_page.partials.part_2_local.part_2')
        <hr>

        <div class="text-center">

            <button class="btn btn-primary">

                <i class="fas fa-folder-open"></i>

                Open Folder

            </button>

            <button class="btn btn-success">

                <i class="fas fa-search"></i>

                Detect Environment

            </button>

            <button class="btn btn-warning" id="refreshLocal">
                <i class="fas fa-sync"></i>
                Refresh
            </button>

        </div>

    </div>

</div>

{{-- New Folder Modal --}}

<div class="modal fade" id="newFolderModal">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header bg-success">

                <h4 class="modal-title">

                    Create Local Folder

                </h4>

                <button class="close" data-dismiss="modal">

                    ×

                </button>

            </div>

            <div class="modal-body">

                <div class="form-group">

                    <label>

                        Folder Name

                    </label>

                    <input type="text" id="folder_name" class="form-control" placeholder="Example : TimeTrack">

                </div>

            </div>

            <div class="modal-footer">

                <button class="btn btn-success" id="createFolder">

                    Create

                </button>

            </div>

        </div>

    </div>

</div>
