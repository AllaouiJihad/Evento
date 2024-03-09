<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function reserve(StoreReservationRequest $request)
    {
        if (Auth::id() != NULL) {
            $nbr_ticket = DB::table('tickets')->select('places_nbr')->where('id', $request->input('ticket_id'))->value('places_nbr');
            $reservation = Reservation::create([
                'ticket_id' => $request->input('ticket_id'),
                'user_id' => Auth::id(),
                'status' => $request->input('status'),
            ]);


            if ($reservation != NULL) {
                $nbr_places = $nbr_ticket - 1;

                DB::table('tickets')->where('id', $request->input('ticket_id'))->update(['places_nbr' => $nbr_places]);
                if ($reservation->status == 0) {
                    return redirect()->route('home')->with('success', "Votre ticket a bien été enregistré. L'organisateur va traiter votre réservation.");
                } else if ($reservation->status == 1) {
                    return redirect()->route('home')->with('success', "Votre ticket a bien été réservé");
                }
            }
        } else {
            return redirect()->route('login');
        }
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
