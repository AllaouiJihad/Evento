@extends('layouts.main')
@section('content')
<section class="wrapper">
        <div class="container">

            <div class="container">
                <h1 class="upcomming">{{ $event->title }}</h1>
                <div class="row">
                    <img class="col" src="{{ asset('storage/' . $event->media) }}" alt="{{ $event->title }}">
                    <div class="col m-5">
                        <h5>fondateur : {{ $event->user->name }}</h5>
                        <p>
                            <i class="fa-solid fa-table-list" style="color: #cca414;"></i>
                            {{ $event->category->name }}
                        </p>
                        <p class="text ">
                            {{ $event->description }}
                        </p>
                        <h5><i class="fa-solid fa-ticket" style="color: #467eb9;"></i> Nombre de places disponaible :
                            <strong style="color: #467eb9;">{{ $nbr_places }}</strong>
                        </h5>
                    </div>

                </div>
                @foreach ($event->tickets as $ticket)
                    <div class="item">
                        <div class="item-right">
                            <h2 class="num">{{ \Carbon\Carbon::parse($event->date)->format('d') }}</h2>
                            <p class="day">{{ \Carbon\Carbon::parse($event->date)->format('F') }}</p>
                            <span class="up-border"></span>
                            <span class="down-border"></span>
                        </div> <!-- end item-right -->

                        <div class="item-left">
                            <p class="event"># {{ rand(1000, 9999) }} |<i
                                    style="color: #FFD43B;">{{ $ticket->type }}</i> </p>
                            <h2 class="title">Live In Sydney</h2>

                            <div class="sce">
                                <div class="icon">
                                    <i class="fa fa-table"></i>
                                </div>
                                <p>{{ \Carbon\Carbon::parse($event->date)->format('d') }}th 2024
                                    <br />{{ $ticket->price }} DH
                                </p>
                            </div>
                            <div class="fix"></div>
                            <div class="loc">
                                <div class="icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <p>{{ $event->location }}<br />  Party Number 16,20</p>
                            </div>
                            <div class="fix"></div>
                            @if ($ticket->places_nbr != 0)
                                <form action="{{ route('reserve') }}" method="POST">
                                @csrf
                                <input value="{{ $event->acceptation }}" type="hidden" name="status">
                                <input value="{{ $ticket->id }}" type="hidden" name="ticket_id">
                                <button type="submit" class="tickets">Réserver</button>
                            </form>
                            @else
                            <button class="tickets text-decoration-line-through">SOLDE OUT</button>
                            @endif
                            
                        </div> <!-- end item-right -->
                    </div> <!-- end item -->
                @endforeach

            </div>



            {{-- <div class="row">
                @foreach ($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($event->media)
                            
                        
                        <img class="card-img-top" src="{{asset('storage/' . $event->media) }}" alt="{{ $event->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">{{ $event->date }}</p>
                            <a href="{{route('event.get',$event->id)}}" class="btn btn-primary">Voir les détails</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> --}}



        </div>
    </section>

@endsection