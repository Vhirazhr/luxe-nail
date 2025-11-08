@extends('layouts.app')

@section('title', 'Make Reservation')

@section('content')
    <div class="container" style="padding-top: 120px; padding-bottom: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="reservation-form">
                    <h1 class="text-center mb-4" style="color: var(--text-dark);">Book Your Appointment</h1>
                    <p class="text-center mb-4">Fill out the form below to schedule your nail appointment. We'll confirm your booking shortly.</p>
                    
                    <form id="bookingForm" method="POST" action="{{ route('reservations.store') }}">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="treatment_type" class="form-label">Treatment Type</label>
                                <select class="form-select" id="treatment_type" name="treatment_type" required>
                                    <option value="">Select Treatment</option>
                                    <option value="nail_extension">Nail Extension</option>
                                    <option value="nail_art">Nail Art</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <label for="reservation_date" class="form-label">Reservation Date</label>
                                <input type="date" class="form-control" id="reservation_date" name="reservation_date" min="{{ date('Y-m-d') }}" required>
                            </div>
                            
                        <div class="col-md-3 mb-3">
    <label for="reservation_time" class="form-label">Reservation Time</label>
    <select class="form-select" id="reservation_time" name="reservation_time" required>
        <option value="">Select Time</option>
        <option value="08:00">8:00</option>
        <option value="09:00">9:00</option>
        <option value="10:00">10:00</option>
        <option value="11:00">11:00</option>
        <option value="12:00">12:00</option>
        <option value="13:00">13:00</option>
        <option value="14:00">14:00</option>
        <option value="15:00">15:00</option>
        <option value="16:00">16:00</option>
        <option value="17:00">17:00</option>
        <option value="18:00">18:00</option>
        <option value="19:00">19:00</option>
        <option value="20:00">20:00</option>
        <option value="21:00">21:00</option>
        <option value="22:00">22:00</option>
    </select>
    <div class="form-text">We're open from 8:00 AM to 10:00 PM</div>
</div>
                        
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-submit" id="submitBtn">
                                <span id="submitText">Submit Reservation</span>
                                <div id="submitSpinner" class="spinner-border spinner-border-sm d-none" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
    const bookingForm = document.getElementById('bookingForm');
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const submitSpinner = document.getElementById('submitSpinner');

    bookingForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Show loading state
        submitText.textContent = 'Processing...';
        submitSpinner.classList.remove('d-none');
        submitBtn.disabled = true;

        // Get form data
        const formData = new FormData(this);

        // AJAX request
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('validation_error');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Success - redirect to thank you page
                Swal.fire({
                    icon: 'success',
                    title: 'Booking Successful!',
                    text: 'Your appointment has been booked successfully.',
                    confirmButtonColor: '#d87a87',
                    confirmButtonText: 'Continue'
                }).then(() => {
                    window.location.href = data.redirect_url;
                });
            }
        })
        .catch(error => {
            // Reset button state
            submitText.textContent = 'Submit Reservation';
            submitSpinner.classList.add('d-none');
            submitBtn.disabled = false;

            // Show error message
            Swal.fire({
                icon: 'warning',
                title: 'Booking Failed',
                text: 'Sorry, the selected date or time is not available. Please choose another date or time.',
                confirmButtonColor: '#d87a87',
                confirmButtonText: 'Try Again'
            });
        });
    });

    // Clear time ketika date berubah
    const dateInput = document.getElementById('reservation_date');
    const timeInput = document.getElementById('reservation_time');

    dateInput.addEventListener('change', function() {
        timeInput.value = '';
    });
});
    </script>

    <style>
        .reservation-form {
            background-color: var(--text-light);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            border: 1px solid var(--soft-pink);
            padding: 12px 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--dark-pink);
            box-shadow: 0 0 0 0.2rem rgba(216, 122, 135, 0.25);
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--medium-pink) 0%, var(--dark-pink) 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 30px;
            transition: all 0.3s;
            width: 100%;
            position: relative;
        }

        .btn-submit:hover:not(:disabled) {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(216, 122, 135, 0.3);
        }

        .btn-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
        }
    </style>
@endsection