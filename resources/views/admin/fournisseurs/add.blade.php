@extends('layouts.masteradmin', ['title'=>'Ajout-Fournisseur'])


@section('content')

<!-- BEGIN CONTENT BODY -->
<div class="page-content-wrapper">
    <div class="content-wrapper container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">

                </div>
            </div>
        </div><!-- end .page title-->

        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-card margin-b-30">
                    <!-- Start .panel -->
                    <div class="panel-heading">
                     @if(Session::has('fournisseur_created'))
                     <div class="alert alert-success" role="alert">
                     <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{Session::get('fournisseur_created')}}
                    </div>
                    @endif
                         @if(Session::has('fournisseur_deleted'))
                     <div class="alert alert-success" role="alert">
                     <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{Session::get('fournisseur_deleted')}}
                    </div>
                    @endif
                    </div>
                    <div class="panel-body  p-xl-3">
                        <form method="POST"  action="{{route('fournisseur.create')}}">
                        @csrf
                        <div class="form-group row">
                                <label> Fournisseur</label>
                                <input type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" value="{{ old('libelle') }}" >
                                @error('libelle')<span class="text text-danger">{{$message}}</span>@enderror
                          </div>

                            <div class="form-group row">
                            <label>Contact</label>
                            <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}">
                                @error('contact')<span class="text text-danger">{{$message}}</span>@enderror

                            </div>

                                <div class="form-group row">
                                <label>Bp</label>
                                <input type="text"  class="form-control @error('bp') is-invalid @enderror" name="bp" value="{{ old('bp') }}">
                                @error('bp')<span class="text text-danger">{{$message}}</span>@enderror

                                </div>

                                <div class="form-group row">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                @error('email')<span class="text text-danger">{{$message}}</span>@enderror

                                </div>
                            <div class="form-group row">
                                    <button class="btn btn-primary " type="submit"><strong> <i class="fa fa-plus-circle"></i> Valider</strong></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-card margin-b-30">
                    <!-- Start .panel -->
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body  p-xl-3">
                         <div class="table table-responsive table-commerce">
                                            <table id="dataBmd" class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="w80">
                                                            <strong>ID</strong>
                                                        </th>
                                                        <th>
                                                            <strong>FOURNISSEUR</strong>
                                                        </th>
                                                        <th>
                                                            <strong>CONTACT</strong>
                                                        </th>
                                                        <th>
                                                            <strong>BP</strong>
                                                        </th>
                                                        <th>
                                                            <strong>ACTION</strong>
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $id = 1?>
                                                @foreach($fournisseurs as $fournisseur)
                                                @if($fournisseur->restaurant_id==$restaurant->id)
                                                <tr>
                                                        <td>{{$id++}}</td>
                                                        <td>{{$fournisseur->libelle}}</td>
                                                        <td>{{$fournisseur->contact}}</td>
                                                        <td>{{$fournisseur->bp}}</td>
                                                        <td class="text-xs-center">
                                                            <a href="/edit-fournisseur/{{$fournisseur->id}}" ><span class="btn btn-info btn-sm fa fa-pencil"></span></a>
                                                            <a href="/delete-fournisseur/{{$fournisseur->id}}" class="delBtnFournisseur"><span class="btn btn-danger btn-sm  fa fa-times-circle"></span></a>
                                                            <a href="/detail-fournisseur/{{$fournisseur->id}}" ><span class="btn btn-warning btn-sm  fa fa-eye"></span></a>
                                                        </td>

                                                    </tr>
                                                     @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                    </div>
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


<!-- Modal Delete-->
			<div class="modal fade" id="myModalFournisseurDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h3 class="modal-title" id="myModalLabel"><span class="text text-danger">Suppression</span></h3>
			      </div>
			      <div class="modal-body">
			        	<p class="alert alert-danger">Etes-vous sûre de vouloir supprimer cet employé ?</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default glyphicon glyphicon-remove" data-dismiss="modal"> Quitter</button>
			        <a  class="btn btn-danger glyphicon glyphicon-trash" id="delRefFournisseur"> Supprimer</a>
			      </div>
			    </div>
			  </div>
			</div>
