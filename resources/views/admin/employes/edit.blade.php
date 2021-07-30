@extends('layouts.masteradmin', ['title'=>'Ajout-Eemploye'])


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
            <div class="col-md-6">
                <div class="panel panel-card margin-b-30">
                    <!-- Start .panel -->
                    <div class="panel-heading">
                         @if(Session::has('employe_updated'))
                     <div class="alert alert-success" role="alert">
                     <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{Session::get('employe_updated')}}
                    </div>
                    @endif
                    </div>
                    <div class="panel-body  p-xl-3">
                        <form method="POST"  action="{{route('employe.update')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$employe->id}}">
                        <div class="form-group row">
                                <label>Code employe</label>
                                <input type="text" class="form-control @error('code_em') is-invalid @enderror" name="code_em" value="{{ old('code_em') ? : $employe->code_em }}">
                                @error('code_em')<span class="text text-danger">{{$message}}</span>@enderror
                          </div>

                            <div class="form-group row">
                            <label>Nom complet</label>
                            <input type="text" class="form-control @error('nom_complet') is-invalid @enderror" name="nom_complet" value="{{ old('nom_complet') ? : $employe->nom_complet }}">
                            </div>

                            <div class="form-group row">
                                    <label>Genre</label>
                                    <select  class="form-control" name="genre" >
                                    <option value="{{old('genre') ? : $employe->genre}}">{{$employe->genre ? : "Maxculin"}}  </option>
                                    <option  value="{{old('genre') ? : $employe->genre}}">{{$employe->genre ? : "Féminin"}}</option>
                                    </select>
                            </div>

                                <div class="form-group row">
                                <label>Contact</label>
                                <input type="text"  class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') ? : $employe->contact }}">
                                @error('contact')<span class="text text-danger">{{$message}}</span>@enderror

                                </div>

                                <div class="form-group row">
                                    <label>Role</label>
                                    <select name="role"  class="form-control" value="{{ old('role') ? : $employe->role }}">
                                        <option value="Servant">Servant</option>
                                        <option value="Cuisier">Cuisier</option>
                                        <option value="Comptable">Comptable</option>
                                        <option value="DG">DG</option>

                                    </select>
                            </div>
                                <div class="form-group row">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ? : $employe->email }}">
                                @error('email')<span class="text text-danger">{{$message}}</span>@enderror

                                </div>
                             <div class="form-group row">
                                <label>Adresse</label>
                                <input type="text"  class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') ? : $employe->adresse }}">
                                @error('adresse')<span class="text text-danger">{{$message}}</span>@enderror

                                </div>
                            <div class="form-group row">
                                    <button class="btn btn-primary " type="submit"><strong>Valider</strong></button>
                            </div>
                        </form>
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
