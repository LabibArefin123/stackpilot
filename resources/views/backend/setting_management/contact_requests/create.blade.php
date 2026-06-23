@extends('adminlte::page')

@section('title', 'Create Contact Request')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <h1 class="mb-0">Create New Contact Request</h1>
        <a href="{{ route('contact_requests.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Go Back
        </a>
    </div>
@stop

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('contact_requests.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    {{-- Name --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" >
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Phone --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Phone <span class="text-danger">*</span></label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone') }}" >
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Type --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Type <span class="text-danger">*</span></label>
                        <select name="type" class="form-control @error('type') is-invalid @enderror" >
                            <option value="">Select Type</option>
                            <option value="general" {{ old('type') == 'general' ? 'selected' : '' }}>General</option>
                            <option value="technical" {{ old('type') == 'technical' ? 'selected' : '' }}>Technical</option>
                            <option value="other" {{ old('type') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Message --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-semibold">Message</label>
                        <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="5">{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-plus"></i> Submit Request
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <div class="mb-4"></div>
@stop
