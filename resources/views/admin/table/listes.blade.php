@extends('layouts.masteradmin', ['title'=>'Table'])


@section('content')

<!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">
                    <div class="content-wrapper container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title">


                                        <h4 class="float-left">Table  </h4>


                                        <ol class="breadcrumb float-left float-md-right">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><i class="fa fa-home"></i></a></li>
                                            <li class="breadcrumb-item">Advanced Forms </li>
                                        </ol>


                                </div>
                            </div>
                        </div><!-- end .page title-->
                        <div class="row">
                            <div class="col-md-12">


                                <div class="card panel-card recent-activites">
                                    <!-- Start .panel -->
                                    <div class="card-header">
                                        Liste tables
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
                                                            <strong>LIBELLE</strong>
                                                        </th>
                                                        <th>
                                                            <strong>CODE TABLE</strong>
                                                        </th>
                                                        <th>
                                                            <strong>NOMBRE PLAT</strong>
                                                        </th>
                                                        <th>
                                                            <strong>STATUS</strong>
                                                        </th>
                                                        <th class="text-xs-center">
                                                            <strong>ACTION</strong>
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $id = 1?>

                                                @foreach($tables as $table)
                                                @if($table->restaurant_id==$restaurant->id)
                                                    <tr>
                                                        <td>{{$id++}}</td>
                                                        <td>{{$table->libelle}}</td>
                                                        <td>{{$table->code_table}}</td>
                                                        <td>{{$table->nombre_plat}}</td>
                                                        <td>{{$table->status}}</td>
                                                        <td class="text-xs-center">
                                                         @if($table->status!="Occupé")
                                                            <a href="/table-occupe/{{$table->id}}" title="Cliquez pour réserver" data-toggle="tooltip"><span class="btn btn-info ">Libre</span></a>
                                                        @else
                                                            <a href="/table-libre/{{$table->id}}" title="Cliquez pour liberer" data-toggle="tooltip"><span class="btn btn-warning ">Occupé</span></a>
                                                        @endif
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
