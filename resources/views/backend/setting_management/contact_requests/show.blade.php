@extends('adminlte::page')

@section('title', 'View Contact Request')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <h1 class="mb-0">Contact Request Details</h1>

        <div class="btn-group">
            {{-- Optional Edit button if you allow editing --}}
            <a href="{{ route('contact_requests.edit', $contact_request->id) }}" class="btn btn-warning btn-sm">
                <i class="fas fa-edit"></i> Edit
            </a>

            <a href="{{ route('contact_requests.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Go Back
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">

            <div class="row">

                {{-- Name --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Name</label>
                    <input type="text" class="form-control" value="{{ $contact_request->name }}" readonly>
                </div>

                {{-- Phone --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Phone</label>
                    <input type="text" class="form-control" value="{{ $contact_request->phone }}" readonly>
                </div>

                {{-- Email --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="text" class="form-control" value="{{ $contact_request->email }}" readonly>
                </div>

                {{-- Type --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Type</label>
                    <input type="text" class="form-control" value="{{ ucfirst($contact_request->type) }}" readonly>
                </div>

                {{-- Message / Description --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-semibold">Message</label>
                    <textarea class="form-control" rows="5" readonly>{{ $contact_request->message ?? 'No message provided.' }}</textarea>
                </div>

                {{-- Submitted At --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Submitted At</label>
                    <input type="text" class="form-control"
                        value="{{ $contact_request->created_at->format('d M Y, h:i A') }}" readonly>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4"></div>
@stop
