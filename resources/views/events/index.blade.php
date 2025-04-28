@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>All Events</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Create New Event</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Max Attendees</th>
                <th>Attendees Registered</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->max_attendees }}</td>
                    <td>{{ $event->attendees_count }}</td>
                    <td>
                        <a href="{{ route('events.edit', $event) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this event?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No events found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
