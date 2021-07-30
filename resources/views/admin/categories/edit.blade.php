@extends('layouts.masteradmin', ['title'=>'Catégorie'])


@section('content')

<!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">
                    <div class="content-wrapper container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title">


                                        <h4 class="float-left">Categorie  </h4>


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
                                    @if(Session::has('categorie_updated'))
                                        <div class="alert alert-success" role="alert">
                                            {{Session::get('categorie_updated')}}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="panel-body  p-xl-3">
                                        <form class="form-horizontal group-border stripped" method="POST"  action="{{route('categorie.update')}}">
                                         @csrf
                                         <input type="hidden" name="id" value="{{$categorie->id}}">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Designation</label>
                                                <div class="col-lg-10 col-md-9 {{ $errors->has('designation') ? 'has-error' : '' }}">
                                                    <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" id="designation" value="{{ old('designation') ? : $categorie->designation }}">
                                                 @error('designation')<span class="text text-danger">{{$message}}</span>@enderror

                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Libellé</label>
                                                <div class="col-lg-10 col-md-9 {{ $errors->has('libelle') ? 'has-error' : '' }}">
                                                    <input type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" id="libelle" value="{{ old('libelle') ? : $categorie->libelle }}">
                                                 @error('libelle')<span class="text text-danger">{{$message}}</span>@enderror
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
