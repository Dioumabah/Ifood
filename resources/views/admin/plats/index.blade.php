@extends('layouts.masteradmin', ['title'=>'Plat'])


@section('content')

<!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">
                    <div class="content-wrapper container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title">


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
                                 @if(Session::has('plat_delete'))
                                        <div class="alert alert-success" role="alert">
                                            {{Session::get('plat_delete')}}
                                        </div>
                                        @endif
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                       <button type="button" class="btn btn-primary">Statistique</button>
                                       <button type="button" class="btn btn-success">Commande</button>
                                    </div>
                                    <div class="panel-body  p-xl-3">
                                        <form class="form-horizontal group-border stripped" method="POST"  action="{{route('plat.create')}}" enctype="multipart/form-data">
                                         @csrf
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Designation</label>
                                                <div class="col-lg-10 col-md-9 {{ $errors->has('designation') ? 'has-error' : '' }}">
                                                    <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" id="designation" value="{{ old('designation') }}">
                                                 @error('designation')<span class="text text-danger">{{$message}}</span>@enderror

                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Description</label>
                                                <div class="col-lg-10 col-md-9 {{ $errors->has('description') ? 'has-error' : '' }}">
                                                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ old('description') }}">
                                                 @error('description')<span class="text text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Quantité</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <input type="number" class="form-control @error('quantite') is-invalid @enderror" name="quantite" id="quantite" value="{{ old('quantite') }}">
                                                    @error('quantite')<span class="text text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Prix</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <input type="number" class="form-control @error('prix') is-invalid @enderror" name="prix" id="prix" value="{{ old('prix') }}">
                                                    @error('prix')<span class="text text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Photo</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" onchange="previewFile(this)">
                                                    <img id="previewImg" alt="plat image" style="max-width: 130px; margin-top: 20px;">
                                                    @error('photo')<span class="text text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Catégorie</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <select class="fancy-select form-control" name="categorie_id">
                                                        @foreach($categorie as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->libelle}}</option>
                                                        @endforeach
                                                    </select>
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
                                        Status des Plats
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
                                                            <strong>PHOTO</strong>
                                                        </th>
                                                        <th>
                                                            <strong>ACTION</strong>
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $id = 1?>

                                                @foreach($plats as $plat)
                                                @if($plat->restaurant_id==$restaurant->id)
                                                    <tr>
                                                        <td>{{$id++}}</td>
                                                        <td>{{$plat->designation}}</td>
                                                        <td>{{$plat->description}}</td>
                                                        <td>{{$plat->quantite}}</td>
                                                        <td>{{$plat->prix}}</td>
                                                        <td>{{$plat->categories->libelle}}</td>
                                                        <td><img class="img-thumbnail" src="{{ asset('/uploads/plats')}}/{{$restaurant->code_restaurant}}/{{$plat->photo}}" width="80" height="80">
                                                        </td>
                                                        <td class="text-xs-center">
                                                            <a href="/edit-plat/{{$plat->id}}" ><span class="btn btn-info fa fa-pencil"></span></a>
                                                            <a href="/delete-plat/{{$plat->id}}"><span class="btn btn-danger fa fa-times-circle"></span></a>
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
