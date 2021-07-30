
@extends('layouts.mastersite', ['title'=>'Acceuil'])


@section('content')

  <div id="menu" class="banner full-screen-mode parallax">
        <div class="container"><br><br><br><br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title text-center">
						Nos plats à  {{$plat->restaurants->adresse_restaurant}}
					</h2>

                        <p class="title-caption text-center">La plateforme ifood vous offre des restaurants et leur cuisines bistronomique dans une atmosphère festive et décontractée..
                         Fultrer votre rechercher à votre guise
                        </p>
                    </div><br><br>
                    <div class="tab-menu">
                        <div class="slider slider-nav">
                            <div class="tab-title-menu">
                                <h2>ENTREES</h2>
                                <p> <i class="flaticon-canape"></i> </p>
                            </div>
                            <div class="tab-title-menu">
                                <h2>PLATS PRINCIPAUX</h2>
                                <p> <i class="flaticon-dinner"></i> </p>
                            </div>
                            <div class="tab-title-menu">
                                <h2>DESERTS</h2>
                                <p> <i class="flaticon-desert"></i> </p>
                            </div>
                            <div class="tab-title-menu">
                                <h2>BOISSONS</h2>
                                <p> <i class="flaticon-coffee"></i> </p>
                            </div>
                        </div>
                        <div class="slider slider-single">
                            <div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">

                                    <div class="offer-item">
                                        <img class="img-thumbnail" src="{{ asset('/uploads/plats')}}/{{$plat->restaurants->code_restaurant}}/{{$plat->photo}}" width="80" height="80">
                                        <div>
                                            <h3>{{$plat->designation}}</h3>
                                            <p>
                                                {{$plat->description}}
                                            </p>
                                            <p>
                                                {{$plat->restaurants->code_restaurant}}
                                            </p>
                                            @auth
                                        @if($plat->quantite>0)
                                            <form action="{{route('commande.visiteur')}}" method="POST" >
                                            @csrf
                                            <input type="hidden" name="plat_id" value="{{$plat->id}}">
                                            <button type="submit" class="btn btn-warning" ><i class="fa fa-shopping-cart"></i> Commande</button>
                                            </form>

                                        @else
                                        <div class="col-md-12">
                                            <a href="#" class="btn btn-danger"><i>Le stock est à terme.</i></a>
                                        </div>
                                        @endif
                                    @endauth

                                        </div>
                                        <span class="offer-price" style="color:black">{{$plat->getPrix()}}</span>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- end tab-menu -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
</div>
    <!-- end menu -->

@endsection
