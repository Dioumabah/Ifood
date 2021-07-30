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
                                <div class="panel panel-card margin-b-30">
                                 @if(Session::has('table_created'))
                                        <div class="alert alert-success" role="alert">
                                            {{Session::get('table_created')}}
                                        </div>
                                        @endif

                                     @if(Session::has('table_deleted'))
                                        <div class="alert alert-success" role="alert">
                                            {{Session::get('table_deleted')}}
                                        </div>
                                        @endif
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                    </div>
                                    <div class="panel-body  p-xl-3">
                                        <form class="form-horizontal group-border stripped" method="POST"  action="{{route('table.create')}}">
                                         @csrf
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Libellé</label>
                                                <div class="col-lg-10 col-md-9 {{ $errors->has('libelle') ? 'has-error' : '' }}">
                                                    <input type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" id="libelle" value="{{ old('libelle') }}">
                                                 @error('libelle')<span class="text text-danger">{{$message}}</span>@enderror

                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Code Table</label>
                                                <div class="col-lg-10 col-md-9 {{ $errors->has('code_table') ? 'has-error' : '' }}">
                                                    <input type="text" class="form-control @error('code_table') is-invalid @enderror" name="code_table" id="code_table" value="{{ old('code_table') }}">
                                                 @error('code_table')<span class="text text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Nombre plat</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <input type="number" class="form-control @error('nombre_plat') is-invalid @enderror" name="nombre_plat" id="nombre_plat" value="{{ old('nombre_plat') }}">
                                                 @error('nombre_plat')<span class="text text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-10 col-md-9 offset-2">
                                                    <button type="submit" class="btn btn-primary"> <i class="fa fa-plus-circle"></i> Valider</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                    </div>

                     <div class="row">
                            <div class="col-md-12">
                                <div class="card panel-card recent-activites">
                                    <!-- Start .panel -->
                                    <div class="card-header">
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
                                                <?php $ids = 1?>
                                                @foreach($tables as $table)
                                                @if($table->restaurant_id==$restaurant->id)
                                                    <tr>
                                                        <td>{{$ids}}</td>
                                                        <td>{{$table->libelle}}</td>
                                                        <td>{{$table->code_table}}</td>
                                                        <td>{{$table->nombre_plat}}</td>
                                                        <td>{{$table->status}}</td>
                                                        <td class="text-xs-center">
                                                            <a href="/edit-table/{{$table->id}}" ><span class="btn btn-info fa fa-pencil"></span></a>
                                                            <a href="/delete-table/{{$table->id}}"><span class="btn btn-danger fa fa-times-circle"></span></a>
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
