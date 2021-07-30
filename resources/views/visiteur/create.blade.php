
@extends('layouts.mastersite', ['title'=>'S\'inscrire'])


@section('content')



    <div id="reservation" class="reservations-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">
                <div class="form-reservations-box">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <h2 class="block-title text-center">
						Complètez vos informations!
					</h2>
                    <h3 class="block-title text-center"></h3>
                        </div>
                        <h4 class="form-title">{{ ucfirst(strtolower(config('app.name')))}}</h4>
                        <p></p>
                                <!-- col-lg-8 col-md-8 col-sm-8 col-xs-12 -->
                        <div class="">
                                <form method="POST" action="{{ route('register-visit') }}" class="form-horizontal">
                        @csrf
                            </div>
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box {{ $errors->has('nom_complet') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control @error('nom_complet') is-invalid @enderror" name="nom_complet" value="{{ old('nom_complet') }}" autofocus placeholder="Nom complet">
                         @error('nom_complet')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box {{ $errors->has('tel') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" autofocus placeholder="Téléphone">
                         @error('tel')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="reserve-book-btn text-center">
                                    <button type="submit" class="hvr-underline-from-center" id="submit">Enregistrer</button>
                                   </div>
                            </div>
                            <!-- end col -->
                        </form>
                        </div>
                        <!-- end form -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end reservations-box -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end reservations-main -->

@endsection
