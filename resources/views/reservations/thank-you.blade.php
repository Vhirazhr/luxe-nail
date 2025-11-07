@extends('layouts.app')

@section('title', 'Thank You')

@section('content')
    <div class="container" style="padding-top: 120px; padding-bottom: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="thank-you-section">
                    <div class="mb-4">
                        <i class="fas fa-check-circle" style="font-size: 5rem; color: var(--dark-pink);"></i>
                    </div>
                    <h1 style="color: var(--text-dark);">Thank You!</h1>
                    <p class="reservation-details">Your reservation has been submitted successfully.</p>
                    
                    @if($reservation)
                        <div class="queue-number">{{ $reservation->queue_number }}</div>
                        <p class="reservation-details">
                            Your reservation schedule: 
                            <strong>{{ $reservation->reservation_date->format('F j, Y') }} at {{ $reservation->reservation_time }}</strong>
                        </p>
                        <p class="reservation-details">
                            Treatment: 
                            <strong>{{ $reservation->treatment_type == 'nail_extension' ? 'Nail Extension' : 'Nail Art' }}</strong>
                        </p>
                    @endif
                    
                    <p class="mt-4">We'll contact you soon to confirm your appointment.</p>
                    <a href="{{ route('home') }}" class="btn btn-hero mt-3">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection