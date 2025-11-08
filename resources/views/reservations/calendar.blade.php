@extends('layouts.app')

@section('title', 'Booking Calendar')

@section('content')
<div class="container" style="padding-top: 120px; padding-bottom: 80px;">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="calendar-card">
                <div class="calendar-header">
                    <h1 class="calendar-title">
                        <i class="fas fa-calendar-alt me-3"></i>Booking Calendar
                    </h1>
                    <p class="calendar-subtitle">View available time slots and existing reservations</p>
                </div>

                <!-- Calendar Navigation -->
                <div class="calendar-navigation">
                    <button class="btn btn-calendar-nav" id="prevMonth">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <h3 class="calendar-month" id="currentMonth"></h3>
                    <button class="btn btn-calendar-nav" id="nextMonth">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <!-- Calendar Grid -->
                <div class="calendar-grid" id="calendarGrid">
                    <!-- Calendar will be loaded here via JavaScript -->
                </div>

                <!-- Legend -->
                <div class="calendar-legend">
                    <div class="legend-item">
                        <div class="legend-color available"></div>
                        <span>Available</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color booked"></div>
                        <span>Booked</span>
                    </div>
                </div>
            </div>

            <!-- Reservation Details Modal -->
            <div class="modal fade" id="reservationModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDateTitle"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div id="reservationList">
                                <!-- Reservations will be loaded here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.calendar-card {
    background: white;
    border-radius: 20px;
    padding: 3rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.calendar-header {
    text-align: center;
    margin-bottom: 2rem;
}

.calendar-title {
    color: var(--text-dark);
    font-weight: 700;
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
}

.calendar-subtitle {
    color: #666;
    font-size: 1.1rem;
}

.calendar-navigation {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 2rem;
    margin-bottom: 2rem;
}

.calendar-month {
    color: var(--text-dark);
    font-weight: 600;
    font-size: 1.5rem;
    margin: 0;
    min-width: 200px;
    text-align: center;
}

.btn-calendar-nav {
    background: linear-gradient(135deg, var(--dark-pink), var(--medium-pink));
    color: white;
    border: none;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s;
}

.btn-calendar-nav:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(216, 122, 135, 0.3);
}

.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 1px;
    background-color: var(--baby-pink);
    border: 1px solid var(--baby-pink);
    border-radius: 15px;
    overflow: hidden;
}

.calendar-day-header {
    background: linear-gradient(135deg, var(--soft-pink), var(--medium-pink));
    color: white;
    padding: 1rem;
    text-align: center;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.9rem;
}

.calendar-day {
    background: white;
    padding: 1rem;
    min-height: 120px;
    border: none;
    transition: all 0.3s;
    cursor: pointer;
    position: relative;
}

.calendar-day:hover {
    background: var(--baby-pink);
    transform: scale(1.02);
}

.calendar-day.other-month {
    background: #f8f9fa;
    color: #ccc;
}

.calendar-day.booked {
    background: linear-gradient(135deg, var(--dark-pink), var(--medium-pink));
    color: white;
    position: relative;
    overflow: hidden;
}

.calendar-day.booked::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--accent-gold);
}

.calendar-day.available {
    background: linear-gradient(135deg, var(--baby-pink), var(--soft-pink));
    color: var(--text-dark);
    border: 2px solid var(--soft-pink);
}

.day-number {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.day-events {
    font-size: 0.8rem;
    font-weight: 500;
}

.event-count {
    background: rgba(255, 255, 255, 0.3);
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 600;
    backdrop-filter: blur(10px);
}

.calendar-legend {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid var(--soft-pink);
}

.legend-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: white;
    padding: 8px 15px;
    border-radius: 25px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.legend-color {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: 2px solid white;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.legend-color.available {
    background: linear-gradient(135deg, var(--baby-pink), var(--soft-pink));
}

.legend-color.booked {
    background: linear-gradient(135deg, var(--dark-pink), var(--medium-pink));
}

/* Modal Styling */
.modal-content {
    border-radius: 15px;
    border: none;
    box-shadow: 0 15px 40px rgba(0,0,0,0.1);
}

.modal-header {
    background: linear-gradient(135deg, var(--soft-pink), var(--medium-pink));
    color: white;
    border-bottom: none;
    border-radius: 15px 15px 0 0;
    padding: 1.5rem;
}

.modal-title {
    font-weight: 600;
}

.btn-close {
    filter: invert(1);
}

.reservation-item {
    background: var(--baby-pink);
    border-radius: 12px;
    padding: 1.25rem;
    margin-bottom: 1rem;
    border-left: 4px solid var(--dark-pink);
    transition: all 0.3s;
    box-shadow: 0 2px 8px rgba(216, 122, 135, 0.1);
}

.reservation-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(216, 122, 135, 0.2);
}

.reservation-time {
    font-weight: 600;
    color: var(--dark-pink);
    margin-bottom: 0.75rem;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.reservation-details {
    color: var(--text-dark);
    line-height: 1.6;
}

.reservation-details strong {
    color: var(--dark-pink);
}

.no-reservations {
    text-align: center;
    color: #666;
    font-style: italic;
    padding: 3rem;
    background: var(--baby-pink);
    border-radius: 10px;
}

/* Loading State */
.loading-calendar {
    text-align: center;
    padding: 3rem;
    color: var(--dark-pink);
    font-size: 1.1rem;
}

@media (max-width: 768px) {
    .calendar-card {
        padding: 1.5rem;
    }
    
    .calendar-day {
        padding: 0.75rem;
        min-height: 100px;
    }
    
    .day-number {
        font-size: 1rem;
    }
    
    .calendar-legend {
        flex-direction: column;
        gap: 1rem;
        align-items: center;
    }
    
    .legend-item {
        width: 100%;
        max-width: 200px;
        justify-content: center;
    }
    
    .calendar-navigation {
        gap: 1rem;
    }
    
    .calendar-month {
        font-size: 1.2rem;
        min-width: 150px;
    }
}

@media (max-width: 576px) {
    .calendar-day {
        padding: 0.5rem;
        min-height: 80px;
    }
    
    .day-number {
        font-size: 0.9rem;
    }
    
    .day-events {
        font-size: 0.7rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();

    const calendarGrid = document.getElementById('calendarGrid');
    const currentMonthElement = document.getElementById('currentMonth');
    const prevMonthBtn = document.getElementById('prevMonth');
    const nextMonthBtn = document.getElementById('nextMonth');
    const reservationModal = new bootstrap.Modal(document.getElementById('reservationModal'));

    // Initialize calendar
    updateCalendar();

    // Event listeners
    prevMonthBtn.addEventListener('click', () => {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        updateCalendar();
    });

    nextMonthBtn.addEventListener('click', () => {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        updateCalendar();
    });

    function updateCalendar() {
        // Show elegant loading
        calendarGrid.innerHTML = `
            <div class="loading-calendar">
                <i class="fas fa-spinner fa-spin me-2"></i>
                Loading calendar...
            </div>
        `;

        // Fetch schedule data
        fetch(`/schedule-data?month=${currentMonth + 1}&year=${currentYear}`)
            .then(response => response.json())
            .then(data => {
                renderCalendar(data);
            })
            .catch(error => {
                console.error('Error:', error);
                calendarGrid.innerHTML = `
                    <div class="loading-calendar text-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Error loading calendar. Please try again.
                    </div>
                `;
            });
    }

    function renderCalendar(data) {
        const scheduleData = data.scheduleData;
        
        // Update month title
        currentMonthElement.textContent = new Date(currentYear, currentMonth).toLocaleString('default', { 
            month: 'long', 
            year: 'numeric' 
        });

        // Clear calendar
        calendarGrid.innerHTML = '';

        // Add day headers
        const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        days.forEach(day => {
            const dayHeader = document.createElement('div');
            dayHeader.className = 'calendar-day-header';
            dayHeader.textContent = day;
            calendarGrid.appendChild(dayHeader);
        });

        // Get first day of month and total days
        const firstDay = new Date(currentYear, currentMonth, 1);
        const lastDay = new Date(currentYear, currentMonth + 1, 0);
        const startingDay = firstDay.getDay();
        const totalDays = lastDay.getDate();

        // Add empty cells for days before month starts
        for (let i = 0; i < startingDay; i++) {
            const emptyDay = document.createElement('div');
            emptyDay.className = 'calendar-day other-month';
            calendarGrid.appendChild(emptyDay);
        }

        // Add days of the month
        for (let day = 1; day <= totalDays; day++) {
            const dayElement = document.createElement('div');
            const dateString = `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            
            // Check if has reservations
            const hasReservations = scheduleData[dateString];
            const reservationCount = hasReservations ? hasReservations.length : 0;
            
            dayElement.className = 'calendar-day';
            if (reservationCount > 0) {
                dayElement.classList.add('booked');
            } else {
                dayElement.classList.add('available');
            }
            
            dayElement.innerHTML = `
                <div class="day-number">${day}</div>
                ${reservationCount > 0 ? 
                    `<div class="day-events">
                        <span class="event-count">
                            <i class="fas fa-users me-1"></i>
                            ${reservationCount} booking${reservationCount > 1 ? 's' : ''}
                        </span>
                    </div>` : 
                    '<div class="day-events"><i class="fas fa-check me-1"></i>Available</div>'
                }
            `;
            
            // Add click event to view reservations
            if (reservationCount > 0) {
                dayElement.style.cursor = 'pointer';
                dayElement.addEventListener('click', () => showReservationDetails(dateString));
            } else {
                dayElement.style.cursor = 'default';
            }
            
            calendarGrid.appendChild(dayElement);
        }
    }

    function showReservationDetails(date) {
        // Show loading in modal
        document.getElementById('reservationList').innerHTML = `
            <div class="loading-calendar">
                <i class="fas fa-spinner fa-spin me-2"></i>
                Loading reservations...
            </div>
        `;
        
        reservationModal.show();

        fetch(`/date-details/${date}`)
            .then(response => response.json())
            .then(data => {
                const modalTitle = document.getElementById('modalDateTitle');
                const reservationList = document.getElementById('reservationList');
                
                modalTitle.textContent = `📅 Reservations for ${data.formatted_date}`;
                
                if (data.reservations.length > 0) {
                    reservationList.innerHTML = data.reservations.map(reservation => `
                        <div class="reservation-item">
                            <div class="reservation-time">
                                <i class="fas fa-clock me-2"></i>${reservation.reservation_time}
                                <span style="font-size: 0.8rem; background: var(--dark-pink); color: white; padding: 2px 8px; border-radius: 10px; margin-left: 10px;">
                                    ${reservation.queue_number}
                                </span>
                            </div>
                            <div class="reservation-details">
                                <strong><i class="fas fa-user me-1"></i>Name:</strong> ${reservation.name}<br>
                                <strong><i class="fas fa-phone me-1"></i>Phone:</strong> ${reservation.phone}<br>
                                <strong><i class="fas fa-spa me-1"></i>Treatment:</strong> 
                                ${reservation.treatment_type === 'nail_extension' ? 'Nail Extension' : 'Nail Art'}
                            </div>
                        </div>
                    `).join('');
                } else {
                    reservationList.innerHTML = `
                        <div class="no-reservations">
                            <i class="fas fa-calendar-times fa-2x mb-3"></i><br>
                            No reservations for ${data.formatted_date}
                        </div>
                    `;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('reservationList').innerHTML = `
                    <div class="no-reservations text-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Error loading reservations
                    </div>
                `;
            });
    }
});
</script>
@endsection