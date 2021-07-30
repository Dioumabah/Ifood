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
                         @if(Session::has('fournisseur_updated'))
                     <div class="alert alert-success" role="alert">
                     <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{Session::get('fournisseur_updated')}}
                    </div>
                    @endif
                    </div>
                    <div class="panel-body  p-xl-3">
                        <form method="POST"  action="{{route('fournisseur.update')}}">
                        @csrf
                         <input type="hidden" name="id" value="{{$fournisseur->id}}">
                        <div class="form-group row">
                                <label> Fournisseur</label>
                                <input type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" value="{{ old('libelle') ? : $fournisseur->libelle}}" >
                                @error('libelle')<span class="text text-danger">{{$message}}</span>@enderror
                          </div>

                            <div class="form-group row">
                            <label>Contact</label>
                            <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') ? : $fournisseur->contact }}">
                            </div>

                                <div class="form-group row">
                                <label>Bp</label>
                                <input type="text"  class="form-control @error('bp') is-invalid @enderror" name="bp" value="{{ old('bp') ? : $fournisseur->bp }}">
                                @error('bp')<span class="text text-danger">{{$message}}</span>@enderror

                                </div>

                                <div class="form-group row">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ? : $fournisseur->email }}">
                                @error('email')<span class="text text-danger">{{$message}}</span>@enderror

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
