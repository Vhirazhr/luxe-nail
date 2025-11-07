@extends('layouts.app')

@section('title', 'Make Reservation')

@section('content')
    <div class="container" style="padding-top: 120px; padding-bottom: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="reservation-form">
                    <h1 class="text-center mb-4" style="color: var(--text-dark);">Book Your Appointment</h1>
                    <p class="text-center mb-4">Fill out the form below to schedule your nail appointment. We'll confirm your booking shortly.</p>
                    
                    <form method="POST" action="{{ route('reservations.store') }}">
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
                                <input type="time" class="form-control" id="reservation_time" name="reservation_time" required>
                            </div>
                        </div>
                        
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-submit">Submit Reservation</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection