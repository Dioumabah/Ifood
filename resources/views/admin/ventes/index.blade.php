@extends('layouts.masteradmin', ['title'=>'List des ventes'])


@section('content')

<!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">
                    <div class="content-wrapper container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title">


                                        <h4 class="float-left">Vente  </h4>


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
                                    </div>
                                </div>
                            </div>
                    </div>

                     <div class="row">
                            <div class="col-md-12">
                                <div class="card panel-card recent-activites">
                                    <!-- Start .panel -->
                                    <div class="card-header">
                                        Status des ventes
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
                                                            <strong>NUMERO</strong>
                                                        </th>
                                                        <th>
                                                            <strong>DATE VENTE</strong>
                                                        </th>
                                                        <th>
                                                            <strong>CLIENT</strong>
                                                        </th>
                                                        <th>
                                                            <strong>ACTION</strong>
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $id = 1?>

                                                @foreach($ventes as $vente)
                                                @if($vente->restaurant_id==$restaurant->id)
                                                    <tr>
                                                        <td>{{$id++}}</td>
                                                        <td>{{$vente->numero}}</td>
                                                        <td>{{$vente->date_vente}}</td>
                                                        <td>{{$vente->clients->nom_complet}}</td>
                                                        <td class="text-xs-center">
                                                            <a href="/detail-vente/{{$vente->id}}" ><span class="btn btn-warning btn-sm  fa fa-eye"></span></a>
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
