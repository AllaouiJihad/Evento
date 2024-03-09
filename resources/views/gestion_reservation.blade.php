@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">

                                <h3 class="user-name">{{ $tickets->title }}</h3>
                                <h6 class="user-email"></h6>
                            </div>





                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">

                        <div class="container bootstrap snippets bootdey">
                            <div class="row">
                                <div class="col-md-5">
                                    @foreach ($tickets->tickets as $ticket)
                                        <div class="alert alert-success alert-coupon">
                                            <h4>{{ $ticket->type }}</h4>
                                            <p>Le Prix : <strong>{{ $ticket->price }}</strong></p>
                                            <p>Le nombre de places restantes : <strong>{{ $ticket->places_nbr }}</strong>
                                            </p>
                                            <button data-toggle="modal" data-target="#edit{{ $ticket->id }}"><i class="fa-solid fa-pen-nib" style="color: #4c9a82;"></i></i></button>

                                            <a class="text-dark ms-5" href="{{route('event.reservation',$ticket->id)}}"><i class="fa-solid fa-rectangle-list" style="color: #68ad01;"></i> Les Reservations</a>
                                        </div>

                                        <!-- Modal add tag -->
                                        <div class="modal fade" id="edit{{ $ticket->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Modifier Ticket</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">



                                                        <form method="POST" action="{{ route('ticket.edit',$tickets->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="ticket_id"
                                                                value="{{ $ticket->id }}">
                                                            <label>Type</label>
                                                            <input class="form-control" type="text"
                                                                value=" {{ $ticket->type }}" name="type" required>
                                                                <label>Prix</label>
                                                                <input class="form-control" type="text"
                                                                value=" {{ $ticket->price }}" name="price" required>


                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" value="modifier"
                                                                    class="btn btn-save">modifier</button>
                                                            </div>

                                                        </form>

                                                        


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
