<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class ReservationController extends Controller
{
    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
            'treatment_type' => 'required|in:nail_extension,nail_art',
            'reservation_date' => 'required|date|after:today',
            'reservation_time' => 'required|date_format:H:i'
        ]);

        // Generate queue number
        $queueNumber = $this->generateQueueNumber();

        $reservation = Reservation::create([
            'name' => $validated['name'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            'treatment_type' => $validated['treatment_type'],
            'reservation_date' => $validated['reservation_date'],
            'reservation_time' => $validated['reservation_time'],
            'queue_number' => $queueNumber,
            'status' => 'pending'
        ]);

        return redirect()->route('reservations.thank-you', ['queue_number' => $queueNumber]);
    }

    public function thankYou(Request $request)
    {
        $queueNumber = $request->query('queue_number');
        $reservation = Reservation::where('queue_number', $queueNumber)->first();

        return view('reservations.thank-you', compact('reservation'));
    }

    private function generateQueueNumber()
    {
        return 'LX' . date('Ymd') . strtoupper(Str::random(4));
    }

    public function downloadPdf($queueNumber)
    {
        $reservation = Reservation::where('queue_number', $queueNumber)->firstOrFail();

        $pdf = Pdf::loadView('reservations.pdf', compact('reservation'));

        // Nama file bisa disesuaikan
        return $pdf->download('reservation_' . $queueNumber . '.pdf');
    }
}
