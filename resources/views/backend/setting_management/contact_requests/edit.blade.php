@extends('adminlte::page')

@section('title', 'Edit Contact Request')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <h1 class="mb-0">Edit Contact Request</h1>
        <a href="{{ route('contact_requests.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Go Back
        </a>
    </div>
@stop

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('contact_requests.update', $contact_request->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    {{-- Name --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $contact_request->name) }}" >
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Phone --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Phone <span class="text-danger">*</span></label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone', $contact_request->phone) }}" >
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $contact_request->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Type --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Type</label>
                        <input type="text" class="form-control" value="{{ ucfirst($contact_request->type) }}" readonly>
                    </div>

                    {{-- Message --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-semibold">Message</label>
                        <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="5">{{ old('message', $contact_request->message) }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Request
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <div class="mb-4"></div>
@stop
