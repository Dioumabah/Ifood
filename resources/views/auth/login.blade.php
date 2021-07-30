
@extends('layouts.app', ['title'=>'S\'indentifier'])


@section('content')



    <div id="reservation" class="reservations-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">
                <div class="form-reservations-box">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <h2 class="block-title text-center">
						S'identifier
					</h2>
                        </div>
                        <h4 class="form-title">{{ ucfirst(strtolower(config('app.name')))}}</h4>
                        <p></p>
                                <!-- col-lg-8 col-md-8 col-sm-8 col-xs-12 -->
                        <div class="">
                                <form method="POST" action="{{ route('login') }}" class="form-horizontal">
                        @csrf
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus placeholder="E-mail">
                         @error('email')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 offset-md-2">
                                <div class="form-box">
                                   <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Mot de passe">
                            @error('password')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="reserve-book-btn text-center">
                                    <button type="submit" class="hvr-underline-from-center" id="submit">S'identifier</button>
                                    <a href="#"><small>Mot de passe oublié?</small></a>
                                    <p class=" text-center"><small>Si vous n'avez pas de compte?</small></p>
                                    <a class="btn  btn-secondary btn-block" href="/register"><h5 class="block-title text-center">Créer votre compte</h5></a>
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
