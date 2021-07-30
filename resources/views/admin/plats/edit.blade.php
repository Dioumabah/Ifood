@extends('layouts.masteradmin', ['title'=>'Plat'])


@section('content')

<!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">
                    <div class="content-wrapper container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title">


                                        <h4 class="float-left">Plats  </h4>


                                </div>
                            </div>
                        </div><!-- end .page title-->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-card margin-b-30">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                    @if(Session::has('plat_update'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('plat_update')}}
                                    </div>
                                    @endif

                                    </div>
                                    <div class="panel-body  p-xl-3">
                                        <form class="form-horizontal group-border stripped" method="POST"  action="{{route('plat.update')}}" enctype="multipart/form-data">
                                         @csrf
                                         <input type="hidden" name="id" value="{{$plat->id}}">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Designation</label>
                                                <div class="col-lg-10 col-md-9 {{ $errors->has('designation') ? 'has-error' : '' }}">
                                                    <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" id="designation" value="{{ old('designation') ? : $plat->designation }}">
                                                 @error('designation')<span class="text text-danger">{{$message}}</span>@enderror

                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Description</label>
                                                <div class="col-lg-10 col-md-9 {{ $errors->has('description') ? 'has-error' : '' }}">
                                                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ old('description') ? : $plat->description}}">
                                                 @error('description')<span class="text text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Quantité</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <input type="number" class="form-control @error('quantite') is-invalid @enderror" name="quantite" id="quantite" value="{{ old('quantite') ? : $plat->quantite }}">
                                                    @error('quantite')<span class="text text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Prix</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <input type="number" class="form-control @error('prix') is-invalid @enderror" name="prix" id="prix" value="{{ old('prix') ? : $plat->prix }}">
                                                    @error('prix')<span class="text text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Photo</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" onchange="previewFile(this)">
                                                    <img id="previewImg" alt="plat image" class="img-thumbnail" src="{{ asset('/uploads/plats')}}/{{Auth::user()->code_restaurant}}/{{$plat->photo}}" width="80" height="80" style="max-width: 130px; margin-top: 20px;">
                                                    @error('photo')<span class="text text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Catégorie</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <select class="fancy-select form-control" name="categorie_id">
                                                        @foreach($categorie as $cat)
                                                        <option value="{{$cat->id}}" >{{$cat->libelle}}</option>
                                                        @endforeach
                                                    </select>
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
