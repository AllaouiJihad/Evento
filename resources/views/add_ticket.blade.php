@extends('layouts.main')
@section('content')
        <div class="row">
            <div class="col text-center mb-5">
                <h2 class="display-4 font-weight-bolder">Ajouter les tickets de votre Événement</h2>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" id="alert">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('ticket.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-2">
                <label for="exampleFormControlInput1">prix (DH) :</label>
                <input type="number" name="price" step="0.01" class="form-control" id="exampleFormControlInput1">
            </div>
            <input type="hidden" name="event_id" value="{{ $id }}">
            <div class="form-group mt-2">
                <label for="exampleFormControlTextarea1">Nombre de tickets :</label>
                <input name="places_nbr" type="number" class="form-control" id="exampleFormControlTextarea1">
            </div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Type :</label>
                <select name="type" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Choisissez...</option>
                    <option value="vip">VIP</option>
                    <option value="Standard">Standard</option>
                </select>
            </div>
            <a class="btn border mt-2" href="/">Acceuil</a>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
@endsection
