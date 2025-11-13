@extends('layouts.dashboard')

@section('title', 'Staff Management - Luxe Nail')
@section('page-title', 'Staff Management')

@section('content')
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold" style="color:#fff;">Staff List</h3>
        <a href="#" class="btn px-4 py-2" 
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
                    <th scope="col">Username</th>
                    <th scope="col">Phone</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Sarah</td>
                    <td>sarah01</td>
                    <td>08123456789</td>
                    <td class="text-center">
                        <button class="btn btn-sm text-light" 
                                style="background-color:#fcca33; border-radius:8px;">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button class="btn btn-sm text-light" 
                                style="background-color:#ff283d; border-radius:8px;">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Nadia</td>
                    <td>nadia02</td>
                    <td>082112345678</td>
                    <td class="text-center">
                        <button class="btn btn-sm text-light" 
                                style="background-color:#fcca33; border-radius:8px;">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button class="btn btn-sm text-light" 
                                style="background-color:#ff283d; border-radius:8px;">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Lina</td>
                    <td>lina03</td>
                    <td>08567891234</td>
                    <td class="text-center">
                        <button class="btn btn-sm text-light" 
                                style="background-color:#fcca33; border-radius:8px;">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button class="btn btn-sm text-light" 
                                style="background-color:#ff283d; border-radius:8px;">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
