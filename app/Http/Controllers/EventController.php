<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('status', 0)->paginate(9);
        $categories = Category::all();
        return view('welcome', compact('events','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('add_event', compact('categories'));
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
            return redirect()->route('ticket.create', ['id' => $event_id]);
        }
    }

    public function getEvents()
    {
        $events = DB::table('events')
            ->join('users', 'users.id', '=', 'events.user_id')
            ->select('events.id','events.title', 'events.date', 'events.created_at', 'users.name')
            ->where('users.role_id', '=', 2)
            ->where('events.status', '=', 1)
            ->get();

        return view('events', compact('events'));
    }

    public function getEvent($id)
    {
        $event = Event::with('category')->with('user')->with('tickets')->where('id', $id)->first();
        $nbr_places = 0;


        foreach ($event->tickets as $ticket) {

            $nbr_places = $nbr_places + $ticket->places_nbr;
        }

        return view('event', compact('event', 'nbr_places'));
    }

    public function acceptEvent($id)
    {
        $event = Event::find($id);
        $event->status = 0;
        $event->save();
        return redirect()->route('events.getEvents');
    }

    public function acceptUserEvent(Request $request, $id)
    {

        $user = User::find($id);
        $user->role_id = 2;
        $user->save();

        $event = Event::find($request->event_id);
        $event->status = 0;
        $event->save();

        return redirect()->route('users.getUsers');
    }

    public function getMyEvents(){
        $events = Event::where('user_id',Auth::id())->get();
        return view('my_events', compact('events'));
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
        $event->delete();
        return redirect()->back();
    }

    public function searchEvents(Request $request)
    {
        $keyword = $request->input('titles');
        if ($keyword === '') {
            $events = Event::where('status', 0)->paginate(20);
        } else {

            $events = Event::where('title', 'like', '%' . $keyword . '%')
                ->where('status', 0)
                ->get();
        }

        return view('search')->with(['events' => $events, 'keyword' => $keyword]);
    }
}
