@extends('layouts.dashboard')

@section('title', 'My Profile - Luxe Nail')
@section('page-title', 'My Profile')

@section('content')
<div class="container-fluid mt-4">

    <div class="card border-0 shadow-sm p-4 mx-auto" 
         style="max-width:600px; border-radius:20px; background:linear-gradient(180deg,#fff,#fff5f8);">
        
        <div class="text-center mb-4">
            {{-- Kalau nanti mau pakai foto bisa ditambah di sini --}}
            {{-- <img src="{{ asset('images/user.png') }}" alt="Profile" class="rounded-circle mb-3" width="120"> --}}
            <h4 class="fw-bold" style="color:#451a2b;">User Profile</h4>
            <p class="text-muted mb-0">Manage your account details</p>
        </div>

        <form>
            <div class="mb-3">
                <label class="form-label fw-semibold" style="color:#451a2b;">Full Name</label>
                <input type="text" class="form-control" value="Sarah Amelia" readonly
                       style="border-radius:10px;">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold" style="color:#451a2b;">Username</label>
                <input type="text" class="form-control" value="sarah01" readonly
                       style="border-radius:10px;">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold" style="color:#451a2b;">Email</label>
                <input type="email" class="form-control" value="sarah@example.com" readonly
                       style="border-radius:10px;">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold" style="color:#451a2b;">Phone</label>
                <input type="text" class="form-control" value="08123456789" readonly
                       style="border-radius:10px;">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold" style="color:#451a2b;">Password</label>
                <input type="password" class="form-control" value="********" readonly
                       style="border-radius:10px;">
            </div>

            <div class="text-end mt-4">
                <a href="#" class="btn px-4 py-2" 
                   style="background-color:#ee9ca7; color:white; border-radius:10px;">
                    <i class="bi bi-pencil-square me-2"></i> Edit Profile
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
