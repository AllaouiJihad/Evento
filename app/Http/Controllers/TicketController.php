<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        return view('add_ticket',['id' => $request->id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $messages = [
            'price.required' => 'Le champ prix est requis.',
            'price.numeric' => 'Le champ prix doit être un nombre.',
            'price.min' => 'Le champ prix doit être un nombre positif.',
    
            'places_nbr.required' => 'Le champ nombre de places est requis.',
            'places_nbr.numeric' => 'Le champ nombre de places doit être un nombre.',
            'places_nbr.min' => 'Le champ nombre de places doit être un nombre positif.',
        ];

        $validate = $request->validate([
            'price' => 'required|numeric|min:0',
            'places_nbr' => 'required|numeric|min:0',
        ],$messages);
        
        $ticket = Ticket::create([
            'price' => $validate['price'],
            'places_nbr' => $validate['places_nbr'],
            'event_id' => $request->input('event_id'),
            'type' => $request->input('type'),
        ]);
        
        if ($ticket != NULL) {
            return redirect()->back()->with('success', 'Tickets ajoutés avec succès ! Vous pouvez ajouter un autre type de ticket.');
        }
        else{
            return redirect()->back()->withErrors(['message' => 'Une erreur est survenue lors de la création du ticket.']);
        }
    }



    public function getTickets($event){
        $tickets = Event::where('id', $event)->first();
        return view('gestion_reservation',compact('tickets'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
