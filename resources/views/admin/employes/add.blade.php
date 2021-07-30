@extends('layouts.masteradmin', ['title'=>'Ajout-Employe'])


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
                     @if(Session::has('em_created'))
                     <div class="alert alert-success" role="alert">
                     <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{Session::get('em_created')}}
                    </div>
                    @endif
                         @if(Session::has('employe_deleted'))
                     <div class="alert alert-success" role="alert">
                     <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{Session::get('employe_deleted')}}
                    </div>
                    @endif
                    </div>
                    <div class="panel-body  p-xl-3">
                        <form method="POST"  action="{{route('employe.create')}}">
                        @csrf
                        <div class="form-group row">
                                <label>Code employe</label>
                                <input type="text" class="form-control @error('code_em') is-invalid @enderror" name="code_em" value="{{ old('code_em') ?: 'ABS'.NOW()->format('ydms') }}" readonly>
                                @error('code_em')<span class="text text-danger">{{$message}}</span>@enderror
                          </div>

                            <div class="form-group row">
                            <label>Nom complet</label>
                            <input type="text" class="form-control @error('nom_complet') is-invalid @enderror" name="nom_complet" value="{{ old('nom_complet') }}">
                            </div>

                            <div class="form-group row">
                                    <label>Genre</label>
                                    <select  class="form-control" name="genre" >
                                        <option value="Maxculin">Maxculin</option>
                                        <option value="Féminin">Féminin</option>
                                    </select>
                            </div>

                                <div class="form-group row">
                                <label>Contact</label>
                                <input type="text"  class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}">
                                @error('contact')<span class="text text-danger">{{$message}}</span>@enderror

                                </div>

                                <div class="form-group row">
                                    <label>Role</label>
                                    <select name="role"  class="form-control">
                                        <option value="Servant">Servant</option>
                                        <option value="Cuisier">Cuisier</option>
                                        <option value="Comptable">Comptable</option>
                                        <option value="DG">DG</option>

                                    </select>
                            </div>
                                <div class="form-group row">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                @error('email')<span class="text text-danger">{{$message}}</span>@enderror

                                </div>
                             <div class="form-group row">
                                <label>Adresse</label>
                                <input type="text"  class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}">
                                @error('adresse')<span class="text text-danger">{{$message}}</span>@enderror

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
                                                            <strong>NOM</strong>
                                                        </th>
                                                        <th>
                                                            <strong>ROLE</strong>
                                                        </th>
                                                        <th>
                                                            <strong>CONTACT</strong>
                                                        </th>
                                                        <th>
                                                            <strong>ACTION</strong>
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $id = 1?>
                                                @foreach($employes as $em)
                                                @if($em->restaurant_id==$restaurant->id)
                                                <tr>
                                                        <td>{{$id++}}</td>
                                                        <td>{{$em->nom_complet}}</td>
                                                        <td>{{$em->role}}</td>
                                                        <td>{{$em->contact}}</td>
                                                        <td class="text-xs-center">
                                                            <a href="/edit-employe/{{$em->id}}" ><span class="btn btn-info btn-sm fa fa-pencil"></span></a>
                                                            <a href="/delete-employe/{{$em->id}}" class="delBtnEm"><span class="btn btn-danger btn-sm  fa fa-times-circle"></span></a>
                                                            <a href="/detail-employe/{{$em->id}}" ><span class="btn btn-warning btn-sm  fa fa-eye"></span></a>
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
			<div class="modal fade" id="myModalEmDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
			        <a  class="btn btn-danger glyphicon glyphicon-trash" id="delRefEm"> Supprimer</a>
			      </div>
			    </div>
			  </div>
			</div>
