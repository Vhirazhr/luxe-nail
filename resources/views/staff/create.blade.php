@extends('layouts.dashboard')

@section('title', 'Add Staff - Luxe Nail')
@section('page-title', 'Add Staff')

@section('content')

<style>
    .add-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .add-header-card {
        background: linear-gradient(135deg, #ee9ca7 0%, #f3b8c2 100%);
        border-radius: 25px;
        padding: 1.5rem 2rem;
        box-shadow: 0 10px 40px rgba(216, 122, 135, 0.25);
        margin-bottom: 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .add-header-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 250px;
        height: 250px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .add-form-card {
        background: white;
        border-radius: 25px;
        padding: 2rem;
        box-shadow: 0 10px 40px rgba(216, 122, 135, 0.15);
        transition: all 0.3s ease;
    }

    .add-form-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 50px rgba(216, 122, 135, 0.25);
    }

    .form-group-custom {
        margin-bottom: 1.5rem;
    }

    .form-group-custom label {
        font-weight: 600;
        color: #451a2b;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
    }

    .form-group-custom label i {
        color: #ee9ca7;
    }

    .form-control-custom {
        border: 2px solid #f3b8c2;
        border-radius: 12px;
        padding: 0.8rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #fafafa;
    }

    .form-control-custom:focus {
        border-color: #ee9ca7;
        box-shadow: 0 0 0 0.2rem rgba(238, 156, 167, 0.25);
        background: white;
        outline: none;
    }

    .form-control-custom:hover {
        border-color: #ee9ca7;
    }

    .btn-save {
        background: linear-gradient(135deg, #ee9ca7, #d87a87);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 0.8rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(238, 156, 167, 0.3);
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(238, 156, 167, 0.4);
        color: white;
    }

    .btn-cancel {
        background: #e0e0e0;
        color: #666;
        border: none;
        border-radius: 12px;
        padding: 0.8rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-cancel:hover {
        background: #d0d0d0;
        color: #666;
    }
</style>

<div class="container-fluid mt-4">
    <div class="add-container">

        {{-- Add Header Card --}}
        <div class="add-header-card">
            <div class="position-relative">
                <h3 class="text-white fw-bold mb-1">
                    <i class="bi bi-plus-circle me-2"></i>Add New Staff
                </h3>
                <p class="text-white mb-0" style="opacity: 0.9; font-size: 0.95rem;">
                    Create a new staff member account
                </p>
            </div>
        </div>

        {{-- Add Form Card --}}
        <div class="add-form-card">
            <form action="{{ route('staff.store') }}" method="POST">
                @csrf

                <div class="form-group-custom">
                    <label>
                        <i class="bi bi-person"></i> Full Name
                    </label>
                    <input type="text" 
                           name="name" 
                           class="form-control form-control-custom" 
                           placeholder="Enter staff name"
                           required>
                </div>

                <div class="form-group-custom">
                    <label>
                        <i class="bi bi-envelope"></i> Email Address
                    </label>
                    <input type="email" 
                           name="email" 
                           class="form-control form-control-custom" 
                           placeholder="Enter email address"
                           required>
                </div>

                <div class="form-group-custom">
                    <label>
                        <i class="bi bi-lock"></i> Password
                    </label>
                    <input type="password" 
                           name="password" 
                           class="form-control form-control-custom" 
                           placeholder="Create password"
                           required>
                    <small class="text-muted" style="font-size: 0.85rem;">
                        <i class="bi bi-info-circle me-1"></i>Minimum 8 characters recommended
                    </small>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-save">
                        <i class="bi bi-check-circle me-2"></i> Save Staff
                    </button>
                    <a href="{{ route('staff.index') }}" class="btn btn-cancel">
                        <i class="bi bi-x-circle me-2"></i> Cancel
                    </a>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection