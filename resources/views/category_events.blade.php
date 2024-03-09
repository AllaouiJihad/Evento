@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col text-center mb-5">
        <h2 class="display-4 font-weight-bolder">Les Événements </h2>
    </div>
    <div class="row" id="search_result">
        @foreach ($events->events as $event)
            <div class="col-md-4 mb-4">
                <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/' . $event->media) }}"
                            alt="{{ $event->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ $event->date }}</p>
                        <a href="{{ route('event.get', $event->id) }}" class="btn btn-primary">Voir les
                            détails</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection