@extends('layouts.dash')
@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="white-box">
            <div class="d-md-flex mb-3">
                <h3 class="box-title mb-0">Les Categories</h3>
                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                    <button class="btn" style="color: #4475ca;" data-toggle="modal" data-target="#exampleModalLong">Ajouter categorie</button>
                </div> 
            </div>


                            <!-- Modal add tag -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">ajouter categorie</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        
                            
                            
                            <form method="post" >
                                <div class="form-group">
                                    <label >Le nom de categorie</label>
                                    <input class="form-control" type="text" name="name" required>
                                    
                                </div>
                                <div class="form-group">
                                    <label >description</label>
                                    <input class="form-control" type="text" name="description" required>
                                    
                                </div>
                                
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" value="save" class="btn btn-save">save</button>
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
                            <th class="border-top-0">Categorie Name</th>

                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td class="txt-oflo"></td>
                            <td>
                                
                                {{-- <a href="deleteCategorie?id=" ><i class="fa-solid fa-trash" style="color: #dd5562;"></i></a> --}}
                                {{-- <button data-toggle="modal" data-target="#edit" ><i class="fa-solid fa-pen-to-square" style="color: #4475ca;"></i></button> --}}
                            </td>
                            </td>
                            
                        </tr>


                             <!-- Modal add tag -->
                    <div class="modal fade" id="edit<?php  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modifier Tag</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        
                            
                            
                            <form method="post" >
                                <div class="form-group">
                                    <input type="hidden" name="id" value="">
                                    <label >Tag name</label>
                                    <input class="form-control" type="text" value="" name="name" required>
                                    
                                </div>
                                <div class="form-group">
                                    <label >description</label>
                                    <input class="form-control" type="text" value="" name="description" required>
                                    
                                </div>
                                
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" value="modifier" class="btn btn-save">modifier</button>
                                </div>

                            </form>
                            
                        
                        </div>
                        
                        </div>
                    </div>
                    </div>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection