<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reservations()
    {

        $reservations = Reservation::all();

        return response()->json([

            'reservations' => $reservations

        ]);
    }

    public function create_reservation(Request $request)
    {
        $reservation = new Reservation();

        $reservation->date = $request->date;
        $reservation->heure = $request->heure;
        $reservation->user_id = $request->user_id;
        $reservation->service_id = $request->service_id;
        $reservation->save();
    }
}
