
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
                                <form method="POST" action="{{ route('register-resto') }}" class="form-horizontal">
                        @csrf
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box {{ $errors->has('code_restaurant') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control @error('code_restaurant') is-invalid @enderror" name="code_restaurant" value="{{ old('code_restaurant') ?: 'ABS'.NOW()->format('dmyhs')}}" autofocus placeholder="Code restaurant" readonly>
                         @error('code_restaurant')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                                </div>
                            </div>
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box {{ $errors->has('immatriculation') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control @error('immatriculation') is-invalid @enderror" name="immatriculation" value="{{ old('immatriculation') }}" autofocus placeholder="Code restaurant">
                         @error('immatriculation')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                                </div>
                            </div>
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box {{ $errors->has('adresse_restaurant') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control @error('adresse_restaurant') is-invalid @enderror" name="adresse_restaurant" value="{{ old('adresse_restaurant') }}" autofocus placeholder="Adresse">
                         @error('adresse_restaurant')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                                </div>
                            </div>
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box {{ $errors->has('bp') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control @error('bp') is-invalid @enderror" name="bp" value="{{ old('bp') }}" autofocus placeholder="Bp">
                         @error('bp')
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
