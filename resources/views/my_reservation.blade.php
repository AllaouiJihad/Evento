@extends('layouts.main')
@section('content')

<section class="pt-5 pb-5">
    <div class="container">
      <div class="row w-100">
          <div class="col-lg-12 col-md-12 col-12">
              <h3 class="display-5 mb-2 text-center">Mes Reservations</h3>
              <p class="mb-5 text-center">
                  <i class="text-info font-weight-bold">{{$reservations->count()}}</i> evenements dans votre cart</p>
              <table id="shoppingCart" class="table table-condensed table-responsive">
                  <thead>
                      <tr>
                          <th style="width:60%">Evenement</th>
                          <th style="width:12%">prix</th>
                          <th style="width:10%">Ticket</th>
                          <th style="width:10%">status</th>
                          <th style="width:16%"></th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($reservations as $reservation)
                        
                   
                      <tr>
                          <td data-th="Product">
                              <div class="row">
                                  <div class="col-md-3 text-left">
                                      <img src="{{ asset('storage/' . $reservation->media) }}" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                  </div>
                                  <div class="col-md-9 text-left mt-sm-2">
                                      <h4>{{$reservation->title}}</h4>
                                      <p class="font-weight-light">Brand &amp; Name</p>
                                  </div>
                              </div>
                          </td>
                          <td data-th="Price">{{$reservation->price}} DH</td>
                          <td data-th="Quantity">
                              {{$reservation->type}}
                          </td>
                          <td data-th="Quantity">
                            @if ($reservation->status == 1)
                            <span class="type" style="color: #80af4e">Confirmé</span>
                            @else
                            <span class="type" style="color: #316ec2">en-cours</span>
                            @endif
                            
                          </td>
                          <td class="actions" data-th="">
                              <div class="text-right">
                                  <form action="{{route('reservation.destroy',$reservation->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                  <button type="submit" class="btn btn-white border-secondary bg-white btn-md mb-2">
                                      <i class="fas fa-trash"></i>
                                  </button>
                                </form>
                                <a href="{{route('generatePDF',$reservation->ticket_id)}}">telecharger</a>
                              </div>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              <div class="float-right text-right">
                  <h4>total:</h4>
                  <h1>{{$reservations->sum('price')}} DH</h1>
              </div>
          </div>
      </div>
      <div class="row mt-4 d-flex align-items-center">
          <div class="col-sm-6 order-md-2 text-right">
              <a href="catalog.html" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Checkout</a>
          </div>
          <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
              <a href="catalog.html">
                  <i class="fas fa-arrow-left mr-2"></i> Consulter autres evenements</a>
          </div>
      </div>
  </div>
  </section>
  @endsection