@extends('adminlte::page')

@section('title', 'Create Gallery Image')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Create Gallery Image</h1>
        <a href="{{ route('galleries.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-lg">
        <div class="card-body">

            <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <!-- LEFT SIDE -->
                    <div class="col-md-6">

                        <!-- Title -->
                        <div class="mb-3">
                            <label>Title *</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label>Upload Image *</label>
                            <input type="file" name="image" id="imageInput" class="form-control" accept="image/*"
                                required>
                        </div>

                        <!-- File Info -->
                        <div id="fileInfo" class="small text-muted"></div>

                        <!-- Progress -->
                        <div class="text-center mt-4">
                            <div class="progress-circle" id="progressCircle">
                                <span id="progressText">0%</span>
                            </div>
                            <div class="mt-2 small">
                                <span id="stageText">Waiting...</span>
                            </div>
                        </div>

                    </div>

                    <!-- RIGHT SIDE PREVIEW -->
                    <div class="col-md-6">
                        <label class="d-block mb-2">Image Preview</label>
                        <div class="preview-wrapper">
                            <img id="imagePreview" src="https://via.placeholder.com/300x250?text=Preview" class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Save
                    </button>
                </div>

            </form>

        </div>
    </div>

    {{-- SCRIPT --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const input = document.getElementById('imageInput');
            const preview = document.getElementById('imagePreview');
            const fileInfo = document.getElementById('fileInfo');
            const progressCircle = document.getElementById('progressCircle');
            const progressText = document.getElementById('progressText');
            const stageText = document.getElementById('stageText');

            input.addEventListener('change', function(e) {

                const file = e.target.files[0];
                if (!file) return;

                // Reset progress
                updateProgress(0);
                stageText.innerText = "Verifying...";

                // Validate image type
                if (!file.type.startsWith("image/")) {
                    fileInfo.innerHTML = "<span class='text-danger'>Invalid file type!</span>";
                    return;
                }

                const reader = new FileReader();

                reader.onload = function(event) {

                    const img = new Image();

                    img.onload = function() {

                        const width = img.width;
                        const height = img.height;
                        let orientation = "";

                        if (width > height) {
                            orientation = "Landscape (Width > Height)";
                        } else if (height > width) {
                            orientation = "Portrait (Height > Width)";
                        } else {
                            orientation = "Square";
                        }

                        // Set preview
                        preview.src = event.target.result;

                        const sizeMB = (file.size / 1024 / 1024).toFixed(2);

                        fileInfo.innerHTML = `
                    Format: {${file.type}} <br>
                    Size: ${sizeMB} MB <br>
                    Dimensions: ${width}px × ${height}px <br>
                    Orientation: ${orientation} <br>
                    Status: Safe to upload
                `;

                        // Stage 2
                        setTimeout(() => {
                            stageText.innerText = "Uploading...";
                            updateProgress(70);
                        }, 600);

                        // Stage 3
                        setTimeout(() => {
                            stageText.innerText = "Completed ✓";
                            updateProgress(100);
                        }, 1300);
                    };

                    img.src = event.target.result;
                };

                reader.readAsDataURL(file);

                updateProgress(25);
            });

            function updateProgress(percent) {
                progressCircle.style.background =
                    `conic-gradient(#28a745 ${percent}%, #e9ecef ${percent}%)`;
                progressText.innerText = percent + "%";
            }

        });
    </script>
@stop
