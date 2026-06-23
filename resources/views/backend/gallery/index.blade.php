@extends('adminlte::page')

@section('title', 'Gallery List')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Gallery List</h1>
        <a href="{{ route('galleries.create') }}" class="btn btn-sm btn-success d-flex align-items-center gap-2">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>
@stop

@section('content')
    <div class="card shadow">
        <div class="card-body table-responsive">
            <table id="dataTables" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Image</th>
                        <th>Title</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($galleries as $key => $gal)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">
                                @if ($gal->image)
                                    <img src="{{ asset('uploads/images/gallery/' . $gal->image) }}"
                                        class="gallery-thumb img-thumbnail"
                                        data-full="{{ asset('uploads/images/gallery/' . $gal->image) }}"
                                        style="width:120px; height:90px; object-fit:cover; cursor:pointer;">

                                    <div class="mt-2">
                                        <button class="btn btn-sm btn-info orientation-btn"
                                            data-img="{{ asset('uploads/images/gallery/' . $gal->image) }}">
                                            Detecting...
                                        </button>
                                    </div>
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $gal->title }}</td>

                            <td class="text-center">
                                <a href="{{ route('galleries.edit', $gal->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="{{ route('galleries.show', $gal->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-eye"></i> Show
                                </a>
                                <button type="button" class="btn btn-danger btn-sm delete-btn"
                                    data-id="{{ $gal->id }}">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                                <form id="delete-form-{{ $gal->id }}"
                                    action="{{ route('galleries.destroy', $gal->id) }}" method="POST"
                                    style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No galleries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card mt-4">
            <div class="card-body" style="height:50px;">
                <!-- spacing card -->
            </div>
        </div>
        <!-- Image Preview Modal -->
        <div class="modal fade" id="imagePreviewModal" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Image Preview</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="modalImage" class="img-fluid" style="max-height:500px; object-fit:contain;">
                        <div class="mt-3" id="modalInfo"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const buttons = document.querySelectorAll('.orientation-btn');

            buttons.forEach(button => {

                const imageUrl = button.dataset.img;
                const img = new Image();

                img.onload = function() {

                    const width = img.width;
                    const height = img.height;

                    let orientation = "";
                    let btnClass = "";

                    if (width > height) {
                        orientation = "Landscape";
                        btnClass = "btn-success";
                    } else if (height > width) {
                        orientation = "Portrait";
                        btnClass = "btn-warning";
                    } else {
                        orientation = "Equal";
                        btnClass = "btn-secondary";
                    }

                    button.textContent = orientation;
                    button.classList.remove('btn-info');
                    button.classList.add(btnClass);

                    // Click to open modal
                    button.addEventListener('click', function() {
                        document.getElementById('modalImage').src = imageUrl;
                        document.getElementById('modalInfo').innerHTML =
                            `Dimensions: ${width}px × ${height}px <br>
                     Orientation: ${orientation}`;
                        $('#imagePreviewModal').modal('show');
                    });

                };

                img.src = imageUrl;

            });

        });
    </script>
@stop
