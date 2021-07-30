
@extends('layouts.mastersite', ['title'=>'S\'indentifier'])


@section('content')



    <div id="reservation" class="reservations-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">
                <div class="form-reservations-box">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <h2 class="block-title text-center">
						Choisir quel type de compte vous voullez.
					</h2>
                        </div>
                        <h4 class="form-title">{{ ucfirst(strtolower(config('app.name')))}}</h4>
                        <p></p>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="reserve-book-btn text-center">
                                    <button type="submit" class="hvr-underline-from-center" id="submit"><a href="/resto">Restaurant</a></button>
                                </div>
                            </div>
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="reserve-book-btn text-center">
                                    <button type="submit" class="hvr-underline-from-center" id="submit"><a href="/visiteur">Visiteur</a></button>
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
