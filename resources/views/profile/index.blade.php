@extends('layouts.dashboard')

@section('title', 'My Profile - Luxe Nail')
@section('page-title', 'My Profile')

@section('content')
    <style>
        .profile-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .profile-header-card {
            background: linear-gradient(135deg, #ee9ca7 0%, #f3b8c2 100%);
            border-radius: 25px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(216, 122, 135, 0.25);
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .profile-header-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .profile-avatar {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 1rem;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 5px solid white;
            box-shadow: 0 8px 24px rgba(69, 26, 43, 0.3);
            object-fit: cover;
        }

        .avatar-placeholder {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 5px solid white;
            background: linear-gradient(135deg, #ffecd2, #fcb69f);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
            font-weight: 700;
            box-shadow: 0 8px 24px rgba(69, 26, 43, 0.3);
        }

        .camera-icon {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background: white;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .camera-icon:hover {
            transform: scale(1.1);
            background: #ee9ca7;
        }

        .camera-icon:hover i {
            color: white;
        }

        .camera-icon i {
            color: #ee9ca7;
            font-size: 1rem;
        }

        .profile-info-card {
            background: white;
            border-radius: 25px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(216, 122, 135, 0.15);
            transition: all 0.3s ease;
        }

        .profile-info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(216, 122, 135, 0.25);
        }

        .form-group-custom {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group-custom label {
            font-weight: 600;
            color: #451a2b;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group-custom label i {
            color: #ee9ca7;
            font-size: 1rem;
        }

        .form-control-custom {
            border: 2px solid #f3b8c2;
            border-radius: 15px;
            padding: 0.9rem 1.2rem;
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

        .btn-edit-profile {
            background: linear-gradient(135deg, #ee9ca7, #d87a87);
            color: white;
            border: none;
            border-radius: 15px;
            padding: 0.9rem 2.5rem;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(238, 156, 167, 0.4);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-edit-profile:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(238, 156, 167, 0.5);
            background: linear-gradient(135deg, #d87a87, #ee9ca7);
        }

        .btn-edit-profile i {
            font-size: 1.1rem;
        }

        .stats-section {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .info-badge {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .info-badge i {
            font-size: 1.5rem;
            color: white;
        }

        .info-badge-content h6 {
            color: white;
            font-size: 0.85rem;
            margin: 0;
            opacity: 0.9;
            font-weight: 500;
        }

        .info-badge-content p {
            color: white;
            font-size: 1.1rem;
            margin: 0;
            font-weight: 700;
        }

        @media (max-width: 768px) {
            .stats-section {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="container-fluid mt-4">
        <div class="profile-container">

            {{-- Profile Header Card --}}
            <div class="profile-header-card">
                <div class="text-center position-relative">
                    <div class="profile-avatar">
                        {{-- Placeholder Avatar (inisial nama user login) --}}
                        <div class="avatar-placeholder">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>

                        <div class="camera-icon">
                            <i class="fas fa-camera"></i>
                        </div>
                    </div>

                    <h3 class="text-white fw-bold mb-1">{{ Auth::user()->name }}</h3>
                    <p class="text-white mb-3" style="opacity: 0.9;">
                        <i class="fas fa-shield-alt me-2"></i>{{ ucfirst(Auth::user()->role ?? 'Administrator') }}
                    </p>
                    <span class="badge"
                        style="background: rgba(255, 255, 255, 0.3); color: white; padding: 0.5rem 1.5rem; border-radius: 20px; font-size: 0.9rem;">
                        <i class="fas fa-circle me-2" style="font-size: 0.5rem; color: #4ade80;"></i>
                        Active
                    </span>
                </div>
            </div>

            {{-- Profile Info Card --}}
            <div class="profile-info-card">
                <h5 class="fw-bold mb-4" style="color:#451a2b;">
                    <i class="fas fa-user-circle me-2" style="color:#ee9ca7;"></i>
                    Personal Information
                </h5>

                <form id="profileForm" action="{{ route('profile.update') }}" method="POST">
                    @csrf

                    <div class="form-group-custom">
                        <label><i class="fas fa-user"></i> Full Name</label>
                        <input type="text" name="name" class="form-control form-control-custom" value="{{ $user->name }}"
                            readonly>
                    </div>

                    <div class="form-group-custom">
                        <label><i class="fas fa-envelope"></i> Email Address</label>
                        <input type="email" name="email" class="form-control form-control-custom" value="{{ $user->email }}"
                            readonly>
                    </div>

                    <div class="form-group-custom">
                        <label><i class="fas fa-lock"></i> Password</label>
                        <input type="password" name="password" id="passwordField" class="form-control form-control-custom"
                            value="********" readonly>
                    </div>

                    <div class="text-end mt-4">
                        <button type="button" class="btn btn-edit-profile" id="editBtn">
                            <i class="fas fa-pencil-alt"></i> Edit Profile
                        </button>
                        <button type="submit" class="btn btn-edit-profile d-none" id="saveBtn" style="background: #4ade80;">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                    </div>
                </form>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const editBtn = document.getElementById('editBtn');
                        const saveBtn = document.getElementById('saveBtn');
                        const form = document.getElementById('profileForm');
                        const inputs = form.querySelectorAll('input');
                        const passwordField = document.getElementById('passwordField');

                        editBtn.addEventListener('click', () => {
                            inputs.forEach(input => input.removeAttribute('readonly'));

                            // Ganti field password jadi kosong saat edit
                            passwordField.value = '';
                            passwordField.placeholder = 'Enter new password (optional)';

                            editBtn.classList.add('d-none');
                            saveBtn.classList.remove('d-none');
                        });
                    });
                </script>
            </div>

        </div>
    </div>
@endsection