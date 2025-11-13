<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OwnerReservationController extends Controller
{
    /**
     * Halaman Dashboard Reservations (Calendar + CRUD Table)
     */
    public function index()
    {
        return view('dashboard.dashboard_reservations.dashboard_reservations');
    }


    /**
     * Untuk calendar — mengirim data booking per tanggal
     */
    public function getScheduleData(Request $request)
    {
        $month = $request->month;
        $year = $request->year;

        $reservations = Reservation::whereMonth('reservation_date', $month)
            ->whereYear('reservation_date', $year)
            ->orderBy('reservation_time')
            ->get();

        $scheduleData = [];

        foreach ($reservations as $r) {
            $date = Carbon::parse($r->reservation_date)->format('Y-m-d');

            if (!isset($scheduleData[$date])) {
                $scheduleData[$date] = [];
            }

            $scheduleData[$date][] = [
                'id'           => $r->id,
                'name'         => $r->name,
                'time'         => $r->reservation_time,
                'type'         => $r->treatment_type,
                'phone'        => $r->phone,
                'queue_number' => $r->queue_number,
                'status'       => $r->status,
            ];
        }

        return response()->json([
            'success'      => true,
            'scheduleData' => $scheduleData,
        ]);
    }


    /**
     * Ambil data reservasi sesuai tanggal (untuk CRUD table)
     */
    public function getDateDetails($date)
    {
        $reservations = Reservation::where('reservation_date', $date)
            ->orderBy('reservation_time')
            ->get();

        return response()->json([
            'success'        => true,
            'date'           => $date,
            'reservations'   => $reservations,
            'formatted_date' => Carbon::parse($date)->format('F j, Y'),
        ]);
    }



    /**
     * Confirm status reservasi
     */
    public function confirm($id)
    {
        $r = Reservation::findOrFail($id);
        $r->status = 'confirmed';
        $r->save();

        return response()->json([
            'success' => true,
            'message' => 'Reservation confirmed!',
        ]);
    }


    /**
     * Cancel status reservasi
     */
    public function cancel($id)
    {
        $r = Reservation::findOrFail($id);
        $r->status = 'cancelled';
        $r->save();

        return response()->json([
            'success' => true,
            'message' => 'Reservation cancelled!',
        ]);
    }
}