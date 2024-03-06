<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();

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
        return view('events');
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
