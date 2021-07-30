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
                         @if(Session::has('client_updated'))
                     <div class="alert alert-success" role="alert">
                     <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{Session::get('client_updated')}}
                    </div>
                    @endif
                    </div>
                    <div class="panel-body  p-xl-3">
                        <form method="POST"  action="{{route('client.update')}}">
                        @csrf
                         <input type="hidden" name="id" value="{{$client->id}}">
                        <!-- <div class="form-group row">
                                <label> Code client</label>
                                <input type="text" class="form-control @error('code_client') is-invalid @enderror" name="code_client" value="{{ old('code_client') ?: substr(Auth::user()->code_restaurant, 0, -10).NOW()->format('ydms') }}" readonly >
                                @error('code_client')<span class="text text-danger">{{$message}}</span>@enderror
                          </div> -->

                            <div class="form-group row">
                            <label>Nom complet</label>
                            <input type="text" class="form-control @error('nom_complet') is-invalid @enderror" name="nom_complet" value="{{ old('nom_complet') ? : $client->nom_complet }}">
                                @error('nom_complet')<span class="text text-danger">{{$message}}</span>@enderror

                            </div>

                                <div class="form-group row">
                                <label>Etat</label>
                                <input type="text"  class="form-control @error('etat') is-invalid @enderror" name="etat" value="{{ old('etat') ? : $client->etat }}">
                                @error('etat')<span class="text text-danger">{{$message}}</span>@enderror

                                </div>

                                <div class="form-group row">
                                <label>Contact</label>
                                <input type="text"  class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') ? : $client->contact }}">
                                @error('contact')<span class="text text-danger">{{$message}}</span>@enderror

                                </div>

                                <div class="form-group row">
                                <label>Localité</label>
                                <input type="text" class="form-control @error('localite') is-invalid @enderror" name="localite" value="{{ old('localite') ? : $client->localite }}">
                                @error('localite')<span class="text text-danger">{{$message}}</span>@enderror

                                </div>

                                <div class="form-group row">
                                    <label>Genre</label>
                                    <select  class="form-control" name="genre" >
                                        <option value="Maxculin">Maxculin</option>
                                        <option value="Féminin">Féminin</option>
                                    </select>
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
