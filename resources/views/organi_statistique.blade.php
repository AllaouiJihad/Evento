@extends('layouts.main')
@section('content')
<style>
    .p-xl {
  padding: 40px;
}

.lazur-bg {
  background-color: #23c6c8;
  color: #ffffff;
}

.red-bg {
  background-color: #ed5565;
  color: #ffffff;
}

.navy-bg {
  background-color: #1ab394;
  color: #ffffff;
}

.yellow-bg {
  background-color: #f8ac59;
  color: #ffffff;
}

.widget {
  border-radius: 5px;
  padding: 15px 20px;
  margin-bottom: 10px;
  margin-top: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.16), 0 2px 10px rgba(0, 0, 0, 0.12);
}

.widget h2, .widget h3 {
  margin-top: 5px;
  margin-bottom: 0;
  border-bottom:1px dotted white;
}

.m-t-md {
  margin-top: 20px;
}
</style>
<div class="container bootstrap snippets bootdey">
    <div class="row">
		<div class="col-md-4">
            <div class="widget lazur-bg p-xl">
                <h2>Les Reservations confirmé</h2>
                <ul class="list-unstyled m-t-md">
                    <h3>
                        <span class="fa-solid fa-calendar-days"></span>
                        <label>{{$reservation_confirme}}</label>
                    </h3>
                    
                </ul>
            </div>   
		</div>
		<div class="col-md-4">
            <div class="widget red-bg p-xl">
                <h2>Les evenements</h2>
                <ul class="list-unstyled m-t-md">
                    <h3>
                        <span class="fa-solid fa-calendar-days"></span>
                        <label> {{$event}} </label>
                        
                    </h3>
                    
                </ul>
            </div>   
		</div>
		<div class="col-md-4">
            <div class="widget navy-bg p-xl">
                <h2>Reservations Nonconfirmé</h2>
                <ul class="list-unstyled m-t-md">
                    <h3>
                        <span class="fa-solid fa-calendar-days"></span>
                        <label> {{$reservations}} </label>
                       
                    </h3>
                    
                </ul>
            </div>   
		</div>
	</div>
    <div class="row">
		<div class="col-md-4">
            <div class="widget yellow-bg p-xl">
                <h2>Les evenements non publié</h2>
                <ul class="list-unstyled m-t-md">
                    <h3>
                        <span class="fa-solid fa-calendar-days"></span>
                        <label>{{$event_non}}</label>
                    </h3>
                    
                </ul>
            </div>   
		</div>
        </div>
    
</div>
@endsection