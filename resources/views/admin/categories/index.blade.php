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
                                    @if(Session::has('categorie_created'))
                                        <div class="alert alert-success" role="alert">
                                            {{Session::get('categorie_created')}}
                                        </div>
                                        @endif

                                     @if(Session::has('categorie_deleted'))
                                        <div class="alert alert-success" role="alert">
                                            {{Session::get('categorie_deleted')}}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="panel-body  p-xl-3">
                                        <form class="form-horizontal group-border stripped" method="POST"  action="{{route('categorie.create')}}">
                                         @csrf
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Designation</label>
                                                <div class="col-lg-10 col-md-9 {{ $errors->has('designation') ? 'has-error' : '' }}">
                                                    <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" id="designation" value="{{ old('designation') }}">
                                                 @error('designation')<span class="text text-danger">{{$message}}</span>@enderror

                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Libellé</label>
                                                <div class="col-lg-10 col-md-9 {{ $errors->has('libelle') ? 'has-error' : '' }}">
                                                    <input type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" id="libelle" value="{{ old('libelle') }}">
                                                 @error('libelle')<span class="text text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-10 col-md-9 offset-2">
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Valider</button>
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
                                                            <strong>DESIGNATION</strong>
                                                        </th>
                                                        <th>
                                                            <strong>LIBELLE</strong>
                                                        </th>
                                                        <th class="text-xs-center">
                                                            <strong>STATUS</strong>
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $ids = 1?>
                                                @foreach($categories as $categorie)
                                                @if($categorie->restaurant_id==$restaurant->id)
                                                    <tr>
                                                        <td>{{$ids++}}</td>
                                                        <td>{{$categorie->designation}}</td>
                                                        <td>{{$categorie->libelle}}</td>
                                                        <td class="text-xs-center">
                                                            <a href="/edit-categorie/{{$categorie->id}}" ><span class="btn btn-info fa fa-pencil"></span></a>
                                                            <a href="/delete-categorie/{{$categorie->id}}" class="delBtnCategorie"><span class="btn btn-danger fa fa-times-circle"></span></a>
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


<!-- Modal Delete-->
			<div class="modal fade" id="myModalCategorieDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h3 class="modal-title" id="myModalLabel"><span class="text text-danger">Suppression</span></h3>
			      </div>
			      <div class="modal-body">
			        	<p class="alert alert-danger">Etes-vous sûre de vouloir supprimer cette catégorie ?</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default glyphicon glyphicon-remove" data-dismiss="modal"> Quitter</button>
			        <a  class="btn btn-danger glyphicon glyphicon-trash" id="delRefCategorie"> Supprimer</a>
			      </div>
			    </div>
			  </div>
			</div>
