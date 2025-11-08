@extends('layouts.app')

@section('title', 'Thank You')

@section('content')
    <div class="container" style="padding-top: 120px; padding-bottom: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="thank-you-card">
                    <!-- Animated Checkmark -->
                    <div class="checkmark-container">
                        <i class="fas fa-check-circle checkmark-icon"></i>
                    </div>
                    
                    <!-- Main Title -->
                    <h1 class="thank-you-title">Thank You!</h1>
                    <p class="thank-you-subtitle">Your reservation has been submitted successfully</p>
                    
                    @if($reservation)
                        <!-- Reservation Details Card -->
                        <div class="reservation-details-card">
                            <div class="queue-number-badge">
                                {{ $reservation->queue_number }}
                            </div>
                            
                            <div class="reservation-info">
                                <div class="info-item">
                                    <i class="fas fa-calendar-alt me-2"></i>
                                    <span class="info-label">Reservation Date:</span>
                                    <strong class="info-value">{{ $reservation->reservation_date->format('F j, Y') }} at {{ $reservation->reservation_time }}</strong>
                                </div>
                                
                                <div class="info-item">
                                    <i class="fas fa-spa me-2"></i>
                                    <span class="info-label">Treatment:</span>
                                    <strong class="info-value">{{ $reservation->treatment_type == 'nail_extension' ? 'Nail Extension' : 'Nail Art' }}</strong>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Confirmation Message -->
                    <div class="confirmation-message">
                        <i class="fas fa-comment-dots me-2"></i>
                        Download this Appointment sheet and We'll contact you soon to confirm your appointment
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="text-center mt-4">
                        <!-- Tombol Download PDF -->
                        <a href="/reservations/{{ $reservation->queue_number }}/download" class="btn btn-download me-3">
                            <i class="fas fa-download me-2"></i>Download PDF
                        </a>
                        
                        <!-- Tombol Back to Home -->
                        <a href="{{ route('home') }}" class="btn btn-home">
                            <i class="fas fa-home me-2"></i>Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>