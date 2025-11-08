<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

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

        return $pdf->download('reservation_' . $queueNumber . '.pdf');
    }

    public function calendar()
    {
        return view('reservations.calendar');
    }

    public function getScheduleData(Request $request)
    {
        $month = $request->month;
    $year = $request->year;
    

    $today = now()->format('Y-m-d'); 
    
    $reservations = Reservation::whereMonth('reservation_date', $month)
                              ->whereYear('reservation_date', $year)
                              ->get();

        $scheduleData = [];
foreach ($reservations as $reservation) {
    $date = $reservation->reservation_date->format('Y-m-d');
    if (!isset($scheduleData[$date])) {
        $scheduleData[$date] = [];
    }
    
    $scheduleData[$date][] = [
        'time' => $reservation->reservation_time,
        'name' => $reservation->name,
        'treatment' => $reservation->treatment_type,
        'phone' => $reservation->phone,
        'queue_number' => $reservation->queue_number,
        'is_today' => ($date === $today)
    ];
}

        return response()->json([
            'scheduleData' => $scheduleData,
            'month' => $month,
            'year' => $year
        ]);
    }

    public function getDateDetails($date)
    {
        $reservations = Reservation::where('reservation_date', $date)
            ->whereIn('status', ['pending', 'confirmed'])
            ->orderBy('reservation_time')
            ->get();

        return response()->json([
            'date' => $date,
            'reservations' => $reservations,
            'formatted_date' => Carbon::parse($date)->format('F j, Y')
        ]);
    }
}
