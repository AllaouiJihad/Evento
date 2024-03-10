@extends('layouts.dash')
@section('content')


    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="d-md-flex mb-3">
                    <h3 class="box-title mb-0">Les demandes d'ajout d'événements</h3>

                </div>




                <div class="table-responsive">
                    <table class="table no-wrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Nom</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Role</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($users as $user)
                                
                            
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td class="txt-oflo">{{ $user->name }}</td>
                                    <td class="txt-oflo">{{ $user->email}}</td>
                                    @if ($user->role_id == 2) 
                                    <td class="txt-oflo" style="color: #B197FC;">Organisateur</td>
                                    @endif
                                    
                                    <td>
                                        <form method="POST" action="{{ route('user.ban',$user) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"><i class="fa-solid fa-ban" style="color: #db002c;"></i></button>

                                        </form>
                                    </td>


                                </tr>
                            @endforeach

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
