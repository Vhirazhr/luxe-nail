@extends('layouts.dashboard')

@section('title', 'Dashboard - Luxe Nail')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="recent-reservations mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="bold" style="color:#ffffff; font-family:'Georgia', serif;">Recent Reservations</h3>
        <a href="#" class="btn btn-sm text-light px-3 py-2" 
           style="background-color:#451a2b; border:none; border-radius:10px; font-family:'Georgia', serif;">
            See all →
        </a>
    </div>

    <div class="card border-0 shadow-sm p-4" 
         style="border-radius:20px; background:linear-gradient(180deg, #fff 0%, #fff5f8 100%);">
        <table class="table align-middle mb-0">
            <thead style="background-color:#ffe6ef;">
                <tr style="color:#451a2b; font-family:'Georgia', serif; font-weight:600;">
                    <th scope="col">Customer</th>
                    <th scope="col">Service</th>
                    <th scope="col" >Date</th>
                    <th scope="col" class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="reservation-row">
                    <td><i class="bi bi-person-circle me-2 text-pink"></i>Sarah</td>
                    <td>Nail Extension</td>
                    <td>12 Nov 2025</td>
                    <td class="text-center">
                        <span class="badge rounded-pill px-3 py-2" 
                              style="background-color:#46b96a; color:white; font-weight:500;">
                              Completed
                        </span>
                    </td>
                </tr>
                <tr class="reservation-row">
                    <td><i class="bi bi-person-circle me-2 text-pink"></i>Nadia</td>
                    <td>Nail Art</td>
                    <td>11 Nov 2025</td>
                    <td class="text-center">
                        <span class="badge rounded-pill px-3 py-2" 
                              style="background-color:#fcca33; color:#fafafa; font-weight:500;">
                              Pending
                        </span>
                    </td>
                </tr>
                <tr class="reservation-row">
                    <td><i class="bi bi-person-circle me-2 text-pink"></i>Lina</td>
                    <td>Nail Extension</td>
                    <td>10 Nov 2025</td>
                    <td class="text-center">
                        <span class="badge rounded-pill px-3 py-2" 
                              style="background-color:#ff8abb; color:#fafafa; font-weight:500;">
                              On Process
                        </span>
                    </td>
                </tr>
                <tr class="reservation-row">
                    <td><i class="bi bi-person-circle me-2 text-pink"></i>Jennie</td>
                    <td>Nail Art</td>
                    <td>10 Nov 2025</td>
                    <td class="text-center">
                        <span class="badge rounded-pill px-3 py-2" 
                              style="background-color:#ff283d; color:#fafafa; font-weight:500;">
                              Cancel
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection