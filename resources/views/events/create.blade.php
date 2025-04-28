@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Create New Event</h2>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <form action="{{ route('events.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Event Name:</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="max_attendees">Max Attendees:</label>
            <input type="number" name="max_attendees" class="form-control @error('max_attendees') is-invalid @enderror" value="{{ old('max_attendees') }}" min="1" >
            @error('max_attendees')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Create Event</button>
    </form>
</div>
@endsection
