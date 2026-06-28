@extends('adminlte::page')

@section('title', 'Laravel Optimization')

@section('content_header')

    <div class="d-flex justify-content-between align-items-center">

        <h1>

            <i class="fas fa-bolt text-warning mr-2"></i>

            Laravel Optimization

        </h1>

        <span class="badge badge-success p-2">

            Ready

        </span>

    </div>

@stop

@section('content')
    @include('backend.partials.optimize_page.index_page.part_3')
    <div class="row">

        <div class="col-md-12">

            @include('backend.partials.optimize_page.index_page.part_1')

        </div>

    </div>

    <div class="row">

        <div class="col-md-12">
            @include('backend.partials.optimize_page.index_page.part_2')
        </div>

    </div>

    <div style="height: 50px;"></div>
@stop

@push('js')
    <script>
        $(function() {

            $('.run-command').click(function() {

                let button = $(this);

                let command = button.data('command');

                button.prop('disabled', true);

                $('#terminalOutput').text('Running ' + command + '...\n');

                $.ajax({

                    url: "{{ route('optimization.run') }}",

                    method: "POST",

                    data: {

                        _token: "{{ csrf_token() }}",

                        command: command

                    },

                    success: function(response) {

                        $('#terminalOutput').text(response.output);

                        $(document).Toasts('create', {

                            class: response.success ?
                                'bg-success' : 'bg-danger',

                            title: response.success ?
                                'Completed' : 'Failed',

                            body: response.success ?
                                'Command executed successfully.' :
                                'Command execution failed.'

                        });

                    },

                    error: function(xhr) {

                        $('#terminalOutput').text(

                            xhr.responseJSON?.output ??

                            'Unknown Error.'

                        );

                    },

                    complete: function() {

                        button.prop('disabled', false);

                    }

                });

            });

        });
    </script>
@endpush
