<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;
use App\Models\Ticket;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('status',0)->paginate(9);

        return view('welcome', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('add_event',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'acceptation' => 'required|boolean',
            'location' => 'required|string|max:255',
            'media' => 'nullable|image',
        ]);
        $mediaPath = $request->file('media')->store('uploads', 'public');

        $event = Event::create([
            'title' => $validate['title'],
            'description' => $validate['description'],
            'date' => $validate['date'],
            'acceptation' => $validate['acceptation'],
            'location' => $validate['location'],
            'user_id' => auth()->user()->id,
            'category_id' => $request->input('category_id'),
          'media' => $mediaPath,
        ]);
        $event_id = $event->id;
        if ($event != NULL) {
            return redirect()->route('ticket.create',['id' => $event_id]);
        }
    }

    public function getEvents(){
        $events = Event::where('status',1)->with('user')->get();
        
        return view('events', compact('events'));
    }

    public function getEvent($id){
        $event = Event::with('category')->with('user')->with('tickets')->where('id',$id)->first();
        $nbr_places=0;
        
       
        foreach($event->tickets as $ticket) {
            
            $nbr_places = $nbr_places+ $ticket->places_nbr;
        }
        
        return view('event',compact('event','nbr_places'));
    }

    public function acceptEvent($id){
        $event = Event::find($id);
        $event->status = 0;
        $event->save();
        return redirect()->route('events.getEvents');
    }
    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
