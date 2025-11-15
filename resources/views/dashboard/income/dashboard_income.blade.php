@extends('layouts.dashboard')

@section('content')

<div class="income-page">

    <!-- TITLE -->
    <h2 class="text-white mb-3" style="font-family:'Georgia', serif;">Income Dashboard</h2>
    <p class="page-subtitle">Ringkasan transaksi dan pendapatan berdasarkan reservasi.</p>

    <!-- FILTER SECTION -->
    <div class="card-section filter-card mb-6">
        <h2 class="card-title" style="font-family: 'Georgia', serif;">Filters</h2>  
        <form method="GET" action="{{ route('dashboard.income') }}">
            <div class="filter-grid-beauty">
                <!-- Tanggal -->
                <div class="filter-item">
                    <label class="filter-label-beauty">Tanggal</label>
                    <input type="date" 
                       name="date" 
                       class="filter-input-beauty" 
                       value="{{ request('date') }}">
                </div>
                <!-- Service -->
                <div class="filter-item">
                    <label class="filter-label-beauty">Service</label>
                    <select name="treatment" class="filter-input-beauty">
                        <option value="">Semua Service</option>
                        <option value="Nail Art" {{ request('treatment')=='Nail Art' ? 'selected' : '' }}>Nail Art</option>
                        <option value="Nail Extension" {{ request('treatment')=='Nail Extension' ? 'selected' : '' }}>Nail Extension</option>
                    </select>
                </div>
                <!-- Status -->
                <div class="filter-item">
                    <label class="filter-label-beauty">Status</label>
                    <select name="status" class="filter-input-beauty">
                        <option value="">Semua</option>
                        <option value="Lunas" {{ request('status')=='Lunas' ? 'selected' : '' }}>Lunas</option>
                        <option value="Pending" {{ request('status')=='Pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                </div>
                <!-- Button -->
                <div class="filter-item filter-button-box">
                    <button class="filter-btn-beauty" type="submit">Filter</button>
                </div>
            </div>
        </form>
    </div>

    <!-- CUSTOMER LIST -->
    <div class="card-section filter-card mb-6">
        <h2 class="card-title" style="font-family: 'Georgia', serif;">Reservation Customer Data</h2> 
        <div class="payment-list">
            <div class="payment-item">
                <div>
                    <h4 class="payment-name">Syafira</h4>
                    <p class="payment-info">Nail Art • 12 Jan 2025</p>
                </div>
                <h4 class="payment-amount">Rp 850.000</h4>
            </div>
            <div class="payment-item">
                <div>
                    <h4 class="payment-name">Silviana</h4>
                    <p class="payment-info">Nail Extension • 12 Jan 2025</p>
                </div>
                <h4 class="payment-amount">Rp 450.000</h4>
            </div>
            <div class="payment-item">
                <div>
                    <h4 class="payment-name">Lisa</h4>
                    <p class="payment-info">Nail Art • 11 Jan 2025</p>
                </div>
                <h4 class="payment-amount">Rp 250.000</h4>
            </div>
        </div>
    </div>

    <!-- SUMMARY CARDS -->
    <div class="summary-grid mb-6">
        <div class="summary-card">
            <p class="page-subtitle">Total Income Bulanan</p>
            <p class="value">Rp 23.500.000</p>
        </div>
        <div class="summary-card">
            <p class="page-subtitle">Total Income Hari Ini</p>
            <p class="value">Rp 1.250.000</p>
        </div>
        <div class="summary-card">
            <p class="page-subtitle">Total Reservation</p>
            <p class="value">145</p>
        </div>
    </div>

    <!-- CHART -->
    <div class="card-section income-chart-card mb-10">
        <h2 class="card-title" style="font-family: 'Georgia', serif;">Income Chart</h2> 
        <div class="chart-placeholder">
            (Chart income akan tampil di sini)
        </div>
    </div>

<!-- DETAIL INCOME (MATCHES RECENT RESERVATIONS STYLE) -->
<div class="detail-income mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="bold" style="color:#ffffff; font-family:'Georgia', serif;">Detail Income</h3>
        <a href="{{ route('dashboard.income') }}" class="btn btn-sm text-light px-3 py-2" 
            style="background-color:#ee9ca7; border:none; border-radius:10px; font-family:'Georgia', serif;">
            See all →
        </a>
    </div>
    <div class="card border-0 shadow-sm p-4" 
     style="border-radius:20px; background:linear-gradient(180deg, #fff 0%, #fff5f8 100%);">

        <table class="table align-middle mb-0">
            <thead style="background-color:#ffe6ef;">
                <tr style="color:#451a2b; font-family:'Georgia', serif; font-weight:600;">
                    <th scope="col" class="text-center">Customer</th>
                    <th scope="col" class="text-center">Reservasi</th>
                    <th scope="col" class="text-center">Tanggal</th>
                    <th scope="col" class="text-center">Total</th>
                    <th scope="col" class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="reservation-row">
                    <td class="text-center">
                        <i class="bi me-2 text-pink"></i>Syafira
                    </td>
                    <td class="text-center">Nail Art</td>
                    <td class="text-center">12 Jan 2025</td>
                    <td class="text-center">Rp 850.000</td>
                    <td class="text-center">
                        <span class="badge rounded-pill px-3 py-2" 
                              style="background-color:#46b96a; color:white; font-weight:500;">
                            Lunas
                        </span>
                    </td>
                </tr>
                <tr class="reservation-row">
                    <td class="text-center">
                        <i class="bi me-2 text-pink"></i>Silviana
                    </td>
                    <td class="text-center">Nail Extension</td>
                    <td class="text-center">12 Jan 2025</td>
                    <td class="text-center">Rp 450.000</td>
                    <td class="text-center">
                        <span class="badge rounded-pill px-3 py-2" 
                              style="background-color:#46b96a; color:white; font-weight:500;">
                            Lunas
                        </span>
                    </td>
                </tr>
                <tr class="reservation-row">
                    <td class="text-center">
                        <i class="bi me-2 text-pink"></i>Lisa
                    </td>
                    <td class="text-center">Nail Art</td>
                    <td class="text-center">11 Jan 2025</td>
                    <td class="text-center">Rp 250.000</td>
                    <td class="text-center">
                        <span class="badge rounded-pill px-3 py-2" 
                              style="background-color:#fcca33; color:#fafafa; font-weight:500;">
                            Pending
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection