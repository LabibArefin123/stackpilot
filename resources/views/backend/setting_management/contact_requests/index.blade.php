@extends('adminlte::page')

@section('title', 'Contact & Appointment Requests')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <h1 class="mb-0">Contact & Appointment Requests</h1>
    </div>
@stop
@section('content')
    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover text-nowrap w-100" id="contactRequestTable">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Message</th>
                        <th>Total Today</th>
                        <th>Last Submitted At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    {{-- Toast for errors --}}
    <div id="dtErrorToast" class="toast position-fixed top-0 end-0 m-3 p-2 bg-danger text-white"
        style="display:none; z-index: 1055;">
        <span id="dtErrorMessage"></span>
        <button type="button" class="btn-close btn-close-white float-end" onclick="closeDtToast()"></button>
    </div>

    {{-- Modal to view full message --}}
    <div class="modal fade" id="fullMessageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Full Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="fullMessageContent"></div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        function showDtToast(message) {
            $('#dtErrorMessage').text(message);
            $('#dtErrorToast').fadeIn().addClass('show');
            setTimeout(() => $('#dtErrorToast').fadeOut().removeClass('show'), 5000);
        }

        function closeDtToast() {
            $('#dtErrorToast').fadeOut().removeClass('show');
        }

        $(function() {
            $.fn.dataTable.ext.errMode = 'none';

            const table = $('#contactRequestTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('contact_requests.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'type',
                        name: 'type',
                        render: data => data.charAt(0).toUpperCase() + data.slice(1)
                    },
                    {
                        data: 'message',
                        name: 'message',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'total_today',
                        name: 'total_today',
                        searchable: false
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                order: [
                    [7, 'desc']
                ],
            });

            // Click to view full message in modal
            $('#contactRequestTable').on('click', '.view-full-message', function() {
                const message = $(this).data('message');
                $('#fullMessageContent').text(message);
                const modal = new bootstrap.Modal(document.getElementById('fullMessageModal'));
                modal.show();
            });

            table.on('error.dt', function(e, settings, techNote, message) {
                console.error('DataTable Error:', message);
                showDtToast('A technical issue occurred. Please contact the dev team.');
            });
        });
    </script>
@endsection
