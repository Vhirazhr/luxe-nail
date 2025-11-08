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

    // Cek apakah sudah mencapai batas 8 booking di tanggal yang sama
    $existingBookings = Reservation::where('reservation_date', $validated['reservation_date'])
        ->count();

    if ($existingBookings >= 8) {
        return response()->json([
            'success' => false
        ], 422);
    }

    // Cek apakah waktu sudah dipesan
    $existingTime = Reservation::where('reservation_date', $validated['reservation_date'])
        ->where('reservation_time', $validated['reservation_time'])
        ->exists();

    if ($existingTime) {
        return response()->json([
            'success' => false
        ], 422);
    }

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

    return response()->json([
        'success' => true,
        'queue_number' => $queueNumber,
        'redirect_url' => route('reservations.thank-you', ['queue_number' => $queueNumber])
    ]);
}
    public function thankYou(Request $request)
    {
        $queueNumber = $request->query('queue_number');
        $reservation = Reservation::where('queue_number', $queueNumber)->first();

        if (!$reservation) {
            abort(404, 'Reservation not found');
        }

        return view('reservations.thank-you', compact('reservation'));
    }

    private function generateQueueNumber()
    {
        return 'LX' . date('Ymd') . strtoupper(Str::random(4));
    }

    public function downloadPdf($queue_number)
    {
        $reservation = Reservation::where('queue_number', $queue_number)->firstOrFail();

        $pdf = Pdf::loadView('reservations.pdf', compact('reservation'));

        return $pdf->download('reservation_' . $queue_number . '.pdf');
    }

    public function calendar()
    {
        return view('reservations.calendar');
    }

    public function getScheduleData(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        
        $reservations = Reservation::whereMonth('reservation_date', $month)
                                  ->whereYear('reservation_date', $year)
                                  ->get();

        // Hitung total booking per hari
        $bookingsPerDay = Reservation::whereMonth('reservation_date', $month)
                                    ->whereYear('reservation_date', $year)
                                    ->selectRaw('reservation_date, COUNT(*) as total')
                                    ->groupBy('reservation_date')
                                    ->pluck('total', 'reservation_date');

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
            ];
        }

        return response()->json([
            'scheduleData' => $scheduleData,
            'bookingsPerDay' => $bookingsPerDay,
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
            'formatted_date' => Carbon::parse($date)->format('F j, Y'),
            'total_bookings' => $reservations->count(),
            'is_full' => $reservations->count() >= 8
        ]);
    }

    public function checkAvailability(Request $request)
{
    $date = $request->date;
    $time = $request->time;

    // Check if date is in the past
    if (Carbon::parse($date)->isPast()) {
        return response()->json([
            'available' => false,
            'message' => 'Cannot book for past dates. Please choose a future date.'
        ]);
    }

    // Check if already reached 8 bookings for this date
    $existingBookings = Reservation::where('reservation_date', $date)->count();
    if ($existingBookings >= 8) {
        return response()->json([
            'available' => false,
            'message' => 'This date is fully booked. Please choose another date.'
        ]);
    }

    // Check if time slot is already taken
    $existingTime = Reservation::where('reservation_date', $date)
        ->where('reservation_time', $time)
        ->exists();

    if ($existingTime) {
        return response()->json([
            'available' => false,
            'message' => 'This time slot is already booked. Please choose another time.'
        ]);
    }

    return response()->json([
        'available' => true
    ]);
}
}