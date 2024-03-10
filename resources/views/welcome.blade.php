<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Evento</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('assets/cards_styl.css') }}">

</head>

<body class="antialiased">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">Evento</a>
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
                                        @if (Auth::user()->role_id == 2)
                                            
                                        
                                        <li>
                                            <a href="{{route('Myevents')}}" class="dropdown-item">Mes Événements</a>
                                        </li>
                                        <li>
                                            <a href="{{route('org.statistique')}}" class="dropdown-item"> Les statistiques</a>
                                        </li>

                                        @endif
                                        <li>
                                            <a href="{{route('user.reservation')}}" class="dropdown-item">Mes Reservations</a>
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
            <div class="row">
                @if (session('success'))
                    <div class="alert alert-success" id="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="col text-center mb-5">
                    <h2 class="display-4 font-weight-bolder">Événements à venir</h2>
                </div>

            </div>
            <div style="width :50% " class="input-group rounded ms-5 p-5">
                <input type="search" id="search_title" class="form-control rounded" placeholder="Search" name="titles"
                    aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>

            <div class="row" id="search_result">
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
            </div>

            <div class="col text-center mb-5">
                <h2 class="display-4 font-weight-bolder">les Categories</h2>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($categories as $category)
                        
                   
                    <div class="col-lg-4">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <h5 class="card-title">{{$category->name}}</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="widget-49">
                                    <div class="widget-49-title-wrapper">
                                        <div class="widget-49-date-primary">
                                            <span class="widget-49-date-day">{{$category->events->count()}}</span>
                                            <span class="widget-49-date-month"></span>
                                        </div>
                                        <div class="widget-49-meeting-info">
                                            <span class="widget-49-pro-title"><strong>{{$category->name}}</strong></span>
                                        </div>
                                    </div>
                                    <div class="widget-49-meeting-action">
                                        <a href="{{route('show.categoryEvents',$category->id)}}" class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">Découvrir les événements </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                </div>

        </div>
    </section>






    @vite('resources/js/search.js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
</body>

</html>
