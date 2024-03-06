<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Evento</title>

    <!-- Fonts -->
        <!-- Font Awesome -->
  <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Cabin|Indie+Flower|Inknut+Antiqua|Lora|Ravi+Prakash"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


</head>

<body class="antialiased">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="/" class="navbar-brand">Evento</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item"><a href="{{ route('event.create') }}" class="nav-link">Ajouter
                                    Evenement</a></li>
                            <div class="d-none d-sm-flex align-items-center ms-6">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                        <svg class="bi bi-caret-down-fill" xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M8 11.293l5.646-5.647a.5.5 0 01.708.708l-6 6a.5.5 0 01-.708 0l-6-6a.5.5 0 11.708-.708L8 11.293z" />
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                                {{ __('Profile') }}
                                            </a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item">
                                                    {{ __('Log Out') }}
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Log in</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

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
                            {{$event->category->name}}
                        </p>
                        <p class="text ">
                            {{ $event->description }}
                        </p>
                        <h5><i class="fa-solid fa-ticket" style="color: #467eb9;"></i> Nombre de places disponaible : <strong style="color: #467eb9;">{{$nbr_places}}</strong></h5>
                    </div>

                </div>
                @foreach ($event->tickets as $ticket )
                    
                
                <div class="item">
                    <div class="item-right">
                        <h2 class="num">{{\Carbon\Carbon::parse($event->date)->format('d')}}</h2>
                        <p class="day">{{\Carbon\Carbon::parse($event->date)->format('F')}}</p>
                        <span class="up-border"></span>
                        <span class="down-border"></span>
                    </div> <!-- end item-right -->

                    <div class="item-left">
                        <p class="event"># {{ rand(1000, 9999) }} |<i  style="color: #FFD43B;">{{ $ticket->type}}</i> </p>
                        <h2 class="title">Live In Sydney</h2>

                        <div class="sce">
                            <div class="icon">
                                <i class="fa fa-table"></i>
                            </div>
                            <p>{{\Carbon\Carbon::parse($event->date)->format('d')}}th 2024 <br />{{ $ticket->price }} DH</p>
                        </div>
                        <div class="fix"></div>
                        <div class="loc">
                            <div class="icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <p>{{$event->location}}<br /> Party Number 16,20</p>
                        </div>
                        <div class="fix"></div>
                        <button class="tickets">Tickets</button>
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






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
