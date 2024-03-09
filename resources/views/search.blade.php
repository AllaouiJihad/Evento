@foreach ($events as $event)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if ($event->media)
                                <img class="card-img-top" src="{{ asset('storage/' . $event->media) }}"
                                    alt="{{ $event->title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->title }}</h5>
                                <p class="card-text">{{ $event->date }}</p>
                                <a href="{{ route('event.get', $event->id) }}" class="btn btn-primary">Voir les
                                    détails</a>
                            </div>
                        </div>
                    </div>
                @endforeach