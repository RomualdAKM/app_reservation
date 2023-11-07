<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reservations(){

        $reservations = Reservation::all();

        return response()->json([

            'reservations' => $reservations

        ]);
        
    }

    public function create_reservation(Request $request){
        
    }
}
