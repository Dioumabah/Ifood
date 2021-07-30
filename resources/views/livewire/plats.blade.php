@extends('layouts.masteradmin', ['title'=>'Plat'])


@section('content')

<!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">

                @include('livewire.create')
                @include('livewire.update')
                    <div class="content-wrapper container">
                        <div class="row">
                            <div class="col-sm-12">
                            @if(session()->has('message'))
                                <div class="alert alert-success">{{session('message')}}</div>
                            @endif
                                <div class="page-title">
                                 <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPlatModal">
                                    Add New Plat
                                    </button>
                                    </a>
                                    <a href="#" class="btn btn-danger" id="deleteAllSelectRecord" >Supprimer tous</a>
                                </div>

                                        <h4 class="float-left">Plats  </h4>


                                        <ol class="breadcrumb float-left float-md-right">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><i class="fa fa-home"></i></a></li>
                                            <li class="breadcrumb-item">Advanced Forms </li>
                                        </ol>


                                </div>
                            </div>
                        </div><!-- end .page title-->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-card margin-b-30">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                       <button type="button" class="btn btn-primary">Statistique</button>
                                       <button type="button" class="btn btn-success">Commande</button>
                                        <div class="float-right">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-rounded btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                <div class="dropdown-menu panel-dropdown" role="menu">
                                                   <a  class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>

                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body  p-xl-3">


                                    </div>
                                </div>
                            </div>
                    </div>

                     <div class="row">
                            <div class="col-md-12">
                                <div class="card panel-card recent-activites">
                                    <!-- Start .panel -->
                                    <div class="card-header">
                                        Status des Plats
                                        <div class="float-right">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-rounded btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                               <div class="dropdown-menu panel-dropdown" role="menu">
                                                   <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>

                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block text-xs-center">
                                        <div class="table-responsive table-commerce">
                                            <table id="dataBmd" class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="w80">
                                                            <strong>ID</strong>
                                                        </th>
                                                        <th>
                                                            <strong>DESIGNATION</strong>
                                                        </th>
                                                        <th>
                                                            <strong>DESCRIPTION</strong>
                                                        </th>
                                                        <th>
                                                            <strong>QUANTITE</strong>
                                                        </th>
                                                        <th>
                                                            <strong>PRIX</strong>
                                                        </th>
                                                        <th>
                                                            <strong>CATEGORIE</strong>
                                                        </th>
                                                        <th>
                                                            <strong>RESTAURANT</strong>
                                                        </th>
                                                        <th class="text-xs-center">
                                                            <strong>PHOTO</strong>
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $id = 1?>

                                                @foreach($plats as $plat)
                                                @if($plat->restaurant_id==Auth::user()->id)
                                                    <tr>
                                                        <td>{{$id++}}</td>
                                                        <td>{{$plat->designation}}</td>
                                                        <td>{{$plat->description}}</td>
                                                        <td>{{$plat->quantite}}</td>
                                                        <td>{{$plat->prix}}</td>
                                                        <td>{{$plat->categories->libelle}}</td>
                                                        <td>{{$plat->users->name}}</td>
                                                        <td><img class="img-thumbnail" src="{{ asset('/uploads/plats')}}/{{Auth::user()->code_restaurant}}/{{$plat->photo}}" width="80" height="80">
                                                        </td>
                                                        <td class="text-xs-center">
                                                            <span class="tag label-info">En attente</span>
                                                        </td>

                                                    </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><!-- End .panel -->


                            </div>
                        </div>
                    <div class="clearfix"></div>
                    <div class="footer">
                        <div class="float-right">
                            10GB of <strong>250GB</strong> Free.
                        </div>
                        <div>
                            <strong>Copyright</strong> Example Company © 2017
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->

@endsection
