@extends('layouts.dashboard')

@section('title', 'Staff Management - Luxe Nail')
@section('page-title', 'Staff Management')

@section('content')
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold" style="color:#fff;">Staff List</h3>
        <a href="{{ route('staff.create') }}" class="btn px-4 py-2" 
           style="background-color:#ee9ca7; color:white; border-radius:10px;">
            <i class="bi bi-plus-circle me-2"></i> Add Staff
        </a>
    </div>

    <div class="card border-0 shadow-sm p-4" 
         style="border-radius:20px; background:linear-gradient(180deg,#fff,#fff5f8);">
        <table class="table align-middle mb-0">
            <thead style="background-color:#ffe6ef;">
                <tr style="color:#451a2b; font-family:'Georgia', serif; font-weight:600;">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($staff as $index => $s)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $s->name }}</td>
                        <td>{{ $s->email }}</td>

                        <td class="text-center">

                            <!-- EDIT BUTTON -->
                            <a href="{{ route('staff.edit', $s->id) }}"
                               class="btn btn-sm text-light"
                               style="background-color:#fcca33; border-radius:8px;">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <!-- DELETE BUTTON -->
                            <form action="{{ route('staff.destroy', $s->id) }}" 
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm text-light"
                                        style="background-color:#ff283d; border-radius:8px;"
                                        onclick="return confirm('Delete this staff?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach

                @if($staff->count() == 0)
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">
                            No staff available.
                        </td>
                    </tr>
                @endif
            </tbody>

        </table>
    </div>
</div>
@endsection
