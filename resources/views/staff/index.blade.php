@extends('layouts.dashboard')

@section('title', 'Staff Management - Luxe Nail')
@section('page-title', 'Staff Management')

@section('content')

<style>
    .staff-header-card {
        background: linear-gradient(135deg, #ee9ca7 0%, #f3b8c2 100%);
        border-radius: 25px;
        padding: 1.5rem 2rem;
        box-shadow: 0 10px 40px rgba(216, 122, 135, 0.25);
        margin-bottom: 1.5rem;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .staff-header-card::before {
        content: '';
        position: absolute;
        top: -40%;
        right: -20%;
        width: 250px;
        height: 250px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .staff-card {
        background: white;
        border-radius: 25px;
        padding: 2rem;
        box-shadow: 0 10px 40px rgba(216, 122, 135, 0.15);
        transition: 0.3s;
    }

    .staff-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 50px rgba(216, 122, 135, 0.25);
    }

    .table thead {
        background-color: #ffe6ef;
    }

    .table thead th {
        color: #451a2b;
        font-weight: 600;
    }

    .btn-add-staff {
        background: linear-gradient(135deg, #ee9ca7, #d87a87);
        color: white;
        border-radius: 12px;
        padding: 0.6rem 1.4rem;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(238, 156, 167, 0.3);
        transition: 0.3s;
    }

    .btn-add-staff:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(238, 156, 167, 0.4);
        color: white;
    }

    .btn-edit {
        background-color: #fcca33;
        color: white;
        border-radius: 10px;
        padding: 0.4rem 0.6rem;
        font-size: 0.85rem;
    }

    .btn-delete {
        background-color: #ff283d;
        color: white;
        border-radius: 10px;
        padding: 0.4rem 0.6rem;
        font-size: 0.85rem;
    }
</style>

<div class="container-fluid mt-4">

    {{-- Header Card --}}
    <div class="staff-header-card d-flex justify-content-between align-items-center">
        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-people-fill me-2"></i> Staff List
            </h3>
            <p class="mb-0" style="opacity: 0.9;">Manage all staff accounts</p>
        </div>

        <a href="{{ route('staff.create') }}" class="btn btn-add-staff">
            <i class="bi bi-plus-circle me-2"></i> Add Staff
        </a>
    </div>

    {{-- List Card --}}
    <div class="staff-card">

        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($staff as $index => $s)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $s->name }}</td>
                        <td>{{ $s->email }}</td>
                        <td class="text-center">

                            {{-- EDIT --}}
                            <a href="{{ route('staff.edit', $s->id) }}" 
                               class="btn btn-edit btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('staff.destroy', $s->id) }}" 
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-delete btn-sm"
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
