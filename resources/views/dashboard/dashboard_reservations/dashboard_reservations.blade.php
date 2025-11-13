@extends('layouts.dashboard')
@section('title', 'Reservations')
@section('content')

<link rel="stylesheet" href="{{ asset('css/dashboard-reservations.css') }}">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="container-fluid px-4 mt-5">
    <h3 class="text-white mb-3" style="font-family:'Georgia', serif;">Calendar Reservations</h3>
    <div class="calendar-box p-4 shadow-lg mx-auto" style="max-width:700px;">
    <div class="calendar-head d-flex justify-content-between align-items-center mb-3">
        <button class="btn-cal" id="prevMonth"><i class="fas fa-chevron-left"></i></button>
        <h4 id="currentMonthSmall" class="fw-bold m-0 text-center"></h4>
        <button class="btn-cal" id="nextMonth"><i class="fas fa-chevron-right"></i></button>
    </div>
    {{-- HEADER DAYS FIXED --}}
    <div class="calendar-days-header">
        <div>Sun</div>
        <div>Mon</div>
        <div>Tue</div>
        <div>Wed</div>
        <div>Thu</div>
        <div>Fri</div>
        <div>Sat</div>
    </div>

    {{-- DAYS RENDERED HERE --}}
    <div id="calendarMini" class="calendar-grid">
        <!-- Header harus berada di dalam grid -->
        <div class="header">Sun</div>
        <div class="header">Mon</div>
        <div class="header">Tue</div>
        <div class="header">Wed</div>
        <div class="header">Thu</div>
        <div class="header">Fri</div>
        <div class="header">Sat</div>
    </div>
</div>
<hr class="section-divider">
    {{-- ===================== CRUD TABLE ===================== --}}
    <div class="recent-reservations mt-5">
        <h3 class="bold text-white" style="font-family:'Georgia', serif;">Reservations List</h3>
        
        <div class="card border-0 shadow-sm p-4 mt-3"
            style="border-radius:20px; background:linear-gradient(180deg, #fff 0%, #fff5f8 100%);">

            <table class="table align-middle mb-0">
                <thead style="background-color:#ffe6ef;">
                    <tr style="color:#451a2b; font-family:'Georgia', serif; font-weight:600;">
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th class="text-center">Actions</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>

                <tbody id="reservationTable">
                    <tr>
                        <td>Sarah</td>
                        <td>Nail Extension</td>
                        <td>12 Nov 2025</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-primary action-edit">Edit</button>
                            <button class="btn btn-sm btn-success action-confirm">Confirm</button>
                            <button class="btn btn-sm btn-danger action-cancel">Cancel</button>
                        </td>
                        <td class="text-center">
                        <span class="badge rounded-pill px-3 py-2" 
                              style="background-color:#46b96a; color:white; font-weight:500;">
                              Completed
                        </span>
                    </tr>
                    <tr>
                        <td>Shabrina</td>
                        <td>Nail Art</td>
                        <td>14 Nov 2025</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-primary action-edit">Edit</button>
                            <button class="btn btn-sm btn-success action-confirm">Confirm</button>
                            <button class="btn btn-sm btn-danger action-cancel">Cancel</button>
                        </td>
                        <td class="text-center">
                        <span class="badge rounded-pill px-3 py-2" 
                              style="background-color:#cd4358; color:white; font-weight:500;">
                              Cancel
                        </span>
                    </tr>
                </tbody>
            </table>

            <p class="mt-2 text-muted small">Klik tanggal di kalender untuk melihat reservasi.</p>
        </div>
    </div>

</div>
@endsection


@section('scripts')
<script>
// CRUD BUTTON HANDLER
function attachCrudActions() {

    document.querySelectorAll(".action-confirm").forEach(btn => {
        btn.onclick = function () {
            const id = this.dataset.id;

            fetch(`/dashboard/reservations/${id}/confirm`, {
                method: "PUT",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Content-Type": "application/json",
                }
            })
            .then(res => res.json())
            .then(() => {
                this.closest("tr").querySelector(".status-badge").innerHTML =
                    `<span class="badge bg-success text-white px-3 py-2">Confirmed</span>`;
            });
        };
    });

    document.querySelectorAll(".action-cancel").forEach(btn => {
        btn.onclick = function () {
            const id = this.dataset.id;

            fetch(`/dashboard/reservations/${id}/cancel`, {
                method: "PUT",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Content-Type": "application/json",
                }
            })
            .then(res => res.json())
            .then(() => {
                this.closest("tr").querySelector(".status-badge").innerHTML =
                    `<span class="badge bg-danger text-white px-3 py-2">Cancelled</span>`;
            });
        };
    });
}




// MINI CALENDAR
let today = new Date();
let month = today.getMonth();
let year = today.getFullYear();

document.addEventListener("DOMContentLoaded", () => loadCalendar());

function loadCalendar() {

    fetch(`/dashboard/reservations/schedule-data?month=${month+1}&year=${year}`)
        .then(res => res.json())
        .then(data => renderCalendar(data.scheduleData));

    document.getElementById("currentMonthSmall").innerText =
        new Date(year, month).toLocaleString("default", {
            month: "long",
            year: "numeric"
        });
}

function renderCalendar(schedule) {

    const grid = document.getElementById("calendarMini");
    grid.innerHTML = "";

    const firstDay = new Date(year, month, 1).getDay();
    const lastDay = new Date(year, month + 1, 0).getDate();

    // Kosong sebelum tanggal 1
    for (let i = 0; i < firstDay; i++) {
        grid.innerHTML += `<div class="empty"></div>`;
    }

    // Isi tanggal
    for (let d = 1; d <= lastDay; d++) {

        const date = `${year}-${String(month+1).padStart(2,'0')}-${String(d).padStart(2,'0')}`;
        const has = schedule[date] ? schedule[date].length : 0;

        grid.innerHTML += `
            <div class="calendar-day ${has ? 'booked' : 'available'}"
                 onclick="loadReservations('${date}', '${d}')">
                ${d}
            </div>
        `;
    }
}

document.getElementById("prevMonth").onclick = () => {
    month--;
    if (month < 0) { month = 11; year--; }
    loadCalendar();
};

document.getElementById("nextMonth").onclick = () => {
    month++;
    if (month > 11) { month = 0; year++; }
    loadCalendar();
};

// LOAD CRUD TABLE BY DATE
function loadReservations(date, dayNumber) {

    const table = document.getElementById("reservationTable");
    table.innerHTML = `<tr><td colspan="5" class="text-center py-3">Loading...</td></tr>`;

    fetch(`/dashboard/reservations/date-details/${date}`)
        .then(res => res.json())
        .then(data => {

            if (data.reservations.length === 0) {
                table.innerHTML = `
                    <tr>
                        <td colspan="5" class="text-center py-3 text-muted">
                            No reservations on ${dayNumber}
                        </td>
                    </tr>`;
                return;
            }

            table.innerHTML = data.reservations.map(r => `
                <tr>
                    <td>${r.name}</td>
                    <td>${r.treatment_type === 'nail_extension' ? 'Nail Extension' : 'Nail Art'}</td>
                    <td>${r.reservation_date}</td>

                    <td class="text-center">
                        <button class="btn btn-sm btn-success action-confirm" data-id="${r.id}">Confirm</button>
                        <button class="btn btn-sm btn-danger action-cancel" data-id="${r.id}">Cancel</button>
                    </td>

                    <td class="text-center status-badge">
                        <span class="badge bg-warning text-dark px-3 py-2">${r.status}</span>
                    </td>
                </tr>
            `).join("");

            attachCrudActions();
        });
}
</script>
@endsection