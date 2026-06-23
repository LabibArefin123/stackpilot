@extends('adminlte::page')

@section('title', 'Edit Gallery Image')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Edit Gallery Image</h1>
        <a href="{{ route('galleries.index') }}" class="btn btn-sm btn-secondary">
            ← Back
        </a>
    </div>
@stop

@section('content')
    <style>
        .progress-circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: conic-gradient(#28a745 0%, #e9ecef 0%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            font-weight: bold;
            font-size: 18px;
            position: relative;
        }

        .progress-circle span {
            position: absolute;
        }

        /* FIXED PREVIEW CONTAINER */
        .preview-wrapper {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 10px;
            background: #f8f9fa;
            height: 280px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            /* prevents crossing */
        }

        /* FIXED IMAGE STYLE */
        #imagePreview {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            /* keeps aspect ratio */
        }
    </style>
    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- LEFT SIDE --}}
                    <div class="col-md-6">

                        {{-- Title --}}
                        <div class="mb-3">
                            <label class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{ old('title', $gallery->title) }}"
                                class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Image Upload --}}
                        <div class="mb-3">
                            <label class="form-label">Change Image (optional)</label>
                            <input type="file" name="image" id="imageInput" class="form-control" accept="image/*">
                            <small class="text-muted">Leave empty to keep current image</small>
                        </div>

                        {{-- File Info --}}
                        <div id="fileInfo" class="small text-muted mt-2"></div>

                        {{-- Progress --}}
                        <div class="mt-3">
                            <div class="progress">
                                <div id="progressBar" class="progress-bar bg-success" style="width:0%">0%</div>
                            </div>
                            <small id="stageText" class="text-muted">Waiting...</small>
                        </div>

                    </div>

                    {{-- RIGHT SIDE --}}
                    <div class="col-md-6 text-center">
                        <label class="form-label fw-bold">Image Preview</label>
                        <div class="border rounded p-2 bg-light">
                            <img id="previewImage"
                                src="{{ $gallery->image ? asset('uploads/images/gallery/' . $gallery->image) : asset('uploads/images/no-image.png') }}"
                                class="img-fluid" style="max-height: 220px;">
                        </div>
                    </div>

                </div>

                {{-- Buttons --}}
                <div class="text-end mt-4">
                    <button class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Image
                    </button>
                </div>

            </form>

        </div>
    </div>

    {{-- JS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const input = document.getElementById('imageInput');
            const preview = document.getElementById('previewImage');
            const fileInfo = document.getElementById('fileInfo');
            const progressBar = document.getElementById('progressBar');
            const stageText = document.getElementById('stageText');

            input.addEventListener('change', function() {

                const file = this.files[0];
                if (!file) return;

                if (!file.type.startsWith('image/')) {
                    fileInfo.innerHTML = "<span class='text-danger'>Invalid image file</span>";
                    return;
                }

                stageText.innerText = 'Verifying...';
                updateProgress(20);

                const reader = new FileReader();

                reader.onload = function(e) {

                    const img = new Image();
                    img.onload = function() {

                        preview.src = e.target.result;

                        const sizeMB = (file.size / 1024 / 1024).toFixed(2);

                        fileInfo.innerHTML = `
                    Type: ${file.type}<br>
                    Size: ${sizeMB} MB<br>
                    Resolution: ${img.width} × ${img.height}px
                `;

                        stageText.innerText = 'Ready to upload';
                        updateProgress(100);
                    };

                    img.src = e.target.result;
                };

                reader.readAsDataURL(file);
            });

            function updateProgress(percent) {
                progressBar.style.width = percent + '%';
                progressBar.innerText = percent + '%';
            }
        });
    </script>

@stop
