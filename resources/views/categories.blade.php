@extends('layouts.dash')
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="d-md-flex mb-3">
                    <h3 class="box-title mb-0">Les Categories</h3>
                    <button class="btn" style="color: #4475ca;" data-toggle="modal" data-target="#exampleModalLong">Ajouter
                        categorie</button>

                </div>

                <!-- Modal add tag -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">ajouter categorie</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">



                                <form method="post" action={{route('category.store')}}>
                                    @csrf
                                    <div class="form-group">
                                        <label>Le nom de categorie</label>
                                        <input class="form-control" type="text" name="name" required>

                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit"  class="btn btn-save">save</button>
                                    </div>

                                </form>


                            </div>

                        </div>
                    </div>
                </div>







                <div class="table-responsive">
                    <table class="table no-wrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Nom</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td class="txt-oflo">{{ $category->name }}</td>


                                    <td>
                                                <form action="{{ route("category.destroy",  $category) }}" method="post" >
                                                    @csrf
                                                    @method("DELETE")
                                                    <button  type="submit"><i class="fa-solid fa-trash"
                                                        style="color: #dd5562;"></i></button>
                                                </form>
                                        <button data-toggle="modal" data-target="#edit{{$category->id}}"><i
                                                class="fa-solid fa-pen-nib" style="color: #4c9a82;"></i></i></button>

                                    </td>


                                </tr>
                           


                            <!-- Modal add tag -->
                            <div class="modal fade" id="edit{{$category->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Modifier Categorie</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">



                                            <form method="POST" action="{{route('category.edit')}}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{{ $category->id}}">
                                                <label>Nom</label>
                                                <input class="form-control" type="text"
                                                    value=" {{ $category->name }}" name="name" required>




                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit"  value="modifier"
                                                        class="btn btn-save">modifier</button>
                                                </div>

                                            </form>


                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
