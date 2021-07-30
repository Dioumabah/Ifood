@extends('layouts.masteradmin', ['title'=>'Table-Edit'])


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
                                 @if(Session::has('table_updated'))
                                        <div class="alert alert-success" role="alert">
                                            {{Session::get('table_updated')}}
                                        </div>
                                        @endif
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                    </div>
                                    <div class="panel-body  p-xl-3">
                                        <form class="form-horizontal group-border stripped" method="POST"  action="{{route('table.update')}}">
                                         @csrf
                                         <input type="hidden" name="id" value="{{$table->id}}">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Libellé</label>
                                                <div class="col-lg-10 col-md-9 {{ $errors->has('libelle') ? 'has-error' : '' }}">
                                                    <input type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" id="libelle" value="{{ old('libelle') ? : $table->libelle }}">
                                                 @error('libelle')<span class="text text-danger">{{$message}}</span>@enderror

                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Code Table</label>
                                                <div class="col-lg-10 col-md-9 {{ $errors->has('code_table') ? 'has-error' : '' }}">
                                                    <input type="text" class="form-control @error('code_table') is-invalid @enderror" name="code_table" id="code_table" value="{{ old('code_table') ? : $table->code_table }}" readonly>
                                                 @error('code_table')<span class="text text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Nombre plat</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <input type="number" class="form-control @error('nombre_plat') is-invalid @enderror" name="nombre_plat" id="nombre_plat" value="{{ old('nombre_plat') ? : $table->nombre_plat }}">
                                                 @error('nombre_plat')<span class="text text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-10 col-md-9 offset-2">
                                                    <button type="submit" class="btn btn-primary">Valider</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
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
