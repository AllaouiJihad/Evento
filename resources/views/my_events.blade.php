@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/svg-with-js.min.css" integrity="sha512-W3ZfgmZ5g1rCPFiCbOb+tn7g7sQWOQCB1AkDqrBG1Yp3iDjY9KYFh/k1AWxrt85LX5BRazEAuv+5DV2YZwghag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<section class="team-section py-5">
    <div class="container">
	    <div class="row justify-content-center">

            @foreach ($events as $event)
                
            
		    <div class="col-12 col-md-6">
			    <div class="card border-0 shadow-lg pt-5 my-5 position-relative">
				    <div class="card-body p-4">
					    <div class="member-profile position-absolute w-100 text-center">
					        <img class="rounded-circle mx-auto d-inline-block shadow-sm" src="{{ asset('storage/' . $event->media) }}" alt="">
				        </div>
					    <div class="card-text pt-1">
						    <h5 class="member-name mb-0 text-center text-primary font-weight-bold">{{ $event->title}}</h5>
						    <div class="mb-3 text-center">{{ $event->category->name }}</div>
						
					    </div>
				    </div><!--//card-body-->
				    <div class="card-footer theme-bg-primary border-0 text-center">
					    <ul class="social-list list-inline mb-0 mx-auto">
						    <li class="list-inline-item"><a class="text-dark" href="#">Editer</a></li>
				            <li class="list-inline-item">
                                <form action="{{ route("event.destroy",  $event->id) }}" method="post" >
                                    @csrf
                                    @method("DELETE")
                                    <button  type="submit">Supprimer</button>
                                </form>
                            </li>
			                <li class="list-inline-item"><a class="text-dark" href="{{route('event.tickets',$event->id)}}">Les tickets</a></li>
			                
			            </ul><!--//social-list-->
				    </div><!--//card-footer-->
			    </div><!--//card-->
		    </div><!--//col-->
		    @endforeach
		    
	    </div><!--//row-->
	    
    </div>
    
</section>
@endsection