@extends('layouts.main')
@section('content')
    
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
@endsection


