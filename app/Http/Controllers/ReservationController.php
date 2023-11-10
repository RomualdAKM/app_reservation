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

    public function reservation($email)
    {

        $reservations = Reservation::where('user_email', $email)->orderBy('id', 'desc')->get();

        return response()->json(

            $reservations

        );
    }

    public function create_reservation(Request $request)
    {
        $reservation = new Reservation();

        $reservation->date = $request->date;
        $reservation->start_hour = $request->start_hour;
        $reservation->end_hour = $request->end_hour;
        $reservation->user_email = $request->user_email;
        $reservation->service = $request->service;
        $reservation->save();
    }
}
