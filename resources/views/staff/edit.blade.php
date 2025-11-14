@extends('layouts.dashboard')

@section('title', 'Edit Staff - Luxe Nail')
@section('page-title', 'Edit Staff')

@section('content')
    <div class="container mt-4">

        <div class="card border-0 shadow-sm p-4"
            style="border-radius:20px; background:linear-gradient(180deg,#fff,#fff5f8);">

            <h4 class="fw-bold mb-3" style="color:#451a2b;">Edit Staff</h4>

            <form action="{{ route('staff.update', $staff->id) }}" method="POST">
                @csrf
                @method('PUT')


                <div class="mb-3">
                    <label class="form-label fw-semibold">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $staff->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $staff->email }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Password (optional)</label>
                    <input type="password" name="password" class="form-control" placeholder="Leave empty if not changing">
                </div>

                <button type="submit" class="btn px-4 py-2"
                    style="background-color:#fcca33; color:white; border-radius:10px;">
                    <i class="bi bi-save me-1"></i> Update
                </button>

                <a href="{{ route('staff.index') }}" class="btn px-4 py-2 ms-2"
                    style="background-color:#b8b8b8; color:white; border-radius:10px;">
                    Cancel
                </a>

            </form>
        </div>

    </div>
@endsection