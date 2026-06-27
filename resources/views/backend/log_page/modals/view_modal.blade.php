<div class="modal fade" id="viewLogModal">

    <div class="modal-dialog modal-xl modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header bg-info">

                <h5 class="modal-title">

                    <i class="fas fa-file-alt mr-2"></i>

                    Laravel Log Details

                </h5>

                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <div class="modal-body">

                <table class="table table-bordered">

                    <tr>
                        <th width="140">Project</th>
                        <td id="modalProject"></td>
                    </tr>

                    <tr>
                        <th>Level</th>
                        <td id="modalLevel"></td>
                    </tr>

                    <tr>
                        <th>Date</th>
                        <td id="modalDate"></td>
                    </tr>

                    <tr>
                        <th>Message</th>
                        <td id="modalMessage"></td>
                    </tr>

                </table>

                <label class="font-weight-bold">

                    Stack Trace / Details

                </label>

                <pre id="modalDetails"
                    style="
                        max-height:500px;
                        overflow:auto;
                        font-size:12px;
                        background:#272822;
                        color:#f8f8f2;
                        padding:15px;
                        border-radius:5px;
                    "></pre>

            </div>

            <div class="modal-footer">

                <button class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>

            </div>

        </div>

    </div>

</div>
