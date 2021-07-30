
@extends('layouts.app', ['title'=>'S\'inscrire'])


@section('content')



    <div id="reservation" class="reservations-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">
                <div class="form-reservations-box">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <h2 class="block-title text-center">
						S'inscrire
					</h2>
                        </div>
                        <h4 class="form-title">{{ ucfirst(strtolower(config('app.name')))}}</h4>
                        <p></p>
                                <!-- col-lg-8 col-md-8 col-sm-8 col-xs-12 -->
                        <div class="">
                                <form method="POST" action="{{ route('register') }}" class="form-horizontal">
                        @csrf
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus placeholder="Nom d'utilisateur">
                         @error('name')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                                </div>
                            </div>
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus placeholder="E-mail">
                         @error('email')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 offset-md-2">
                                <div class="form-box {{ $errors->has('password') ? 'has-error' : '' }}">
                                   <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Mot de passe">
                            @error('password')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 offset-md-2">
                                <div class="form-box {{ $errors->has('password') ? 'has-error' : '' }}">
                                   <input type="password" class="form-control" name="password_confirmation"  placeholder="Confirmation mot de passe">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="reserve-book-btn text-center">
                                    <button type="submit" class="hvr-underline-from-center" id="submit">S'inscrire</button>
                                    <a href="#"><small>Mot de passe oublié?</small></a>
                                    <p class=" text-center"><small>Si vous avez déjà un compte?</small></p>
                                    <a class="btn  btn-secondary btn-block" href="/login"><h5 class="block-title text-center">Déjà un compte</h5></a>
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
