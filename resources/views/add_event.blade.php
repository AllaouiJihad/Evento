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
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ Auth::user()->name }}
                                                <svg class="bi bi-caret-down-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M8 11.293l5.646-5.647a.5.5 0 01.708.708l-6 6a.5.5 0 01-.708 0l-6-6a.5.5 0 11.708-.708L8 11.293z"/>
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

    <div class="container mt-5">
        <div class="row">
            <div class="col text-center mb-5">
                <h2 class="display-4 font-weight-bolder">Ajouter Événement</h2>
            </div>
        </div>
        <form method="POST" action="{{route('event.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-2">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1">
            </div>

            <div class="form-group mt-2">
                <label for="exampleFormControlTextarea1">description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group mt-2">
                <label for="exampleFormControlTextarea1">date</label>
                <input name="date" class="form-control" id="exampleFormControlTextarea1" type="date"></input>
            </div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Acceptation</label>
                <select name="acceptation" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Choisissez...</option>
                    <option value="1">acceptation automatique</option>
                    <option value="0">validation manuelle</option>
                </select>
            </div>
            <div class="border p-5 mb-4">
                <label class="form-label">Categories: Choisissez une catégorie pour votre événement.</label>
    
                @foreach($categories as $category)
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{ $category->id }}" name="category_id" id="category{{ $category->id }}">
                    <label class="form-check-label" for="category{{ $category->id }}">
                        {{ $category->name }}
                    </label>
                </div>
                @endforeach
    
            </div>
            <div>
                <label for="exampleFormControlTextarea1">localisation</label>
                <input name="location" class="form-control" id="exampleFormControlTextarea1" type="text"></input>
            </div>
            <div class="mb-3">
                <label for="media" class="form-label">Choose an image</label>
                <input type="file" class="form-control" id="media" name="media" aria-label="file example" required>
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
