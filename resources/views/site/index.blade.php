@extends('layouts.mastersite', ['title'=>'Acceuil-ifood'])


@section('content')

    <div id="menu" class="banner full-screen-mode parallax">
        <div class="container"><br><br><br><br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title text-center">
                            Nos plats
                        </h2>

                        <p class="title-caption text-center">La plateforme ifood vous offre des restaurants et leur cuisines
                            bistronomique dans une atmosphère festive et décontractée..
                            Fultrer votre rechercher à votre guise
                        <div class="row">

                            <div class="col-md-6">
                                <form action="{{ route('site.search') }}">
                                    <div class="input-group">
                                        <input type="text" name="query" id="query" class="form-control"
                                            placeholder="Rechercher un restaurant" style="border: dotted;">
                                        <span class="input-group-addon"><i class="fa fa-search"></i></span>

                                    </div>
                                    {{-- <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button> --}}
                                </form>
                            </div>

                            {{-- @livewire('search') --}}

                            <div class="col-md-6">
                                <input type="text" name="search" class="form-control" style="border: dotted;">
                            </div>

                        </div>
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
                                @if (count($plats) > 0)
                                    @foreach ($plats as $plat)
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">

                                            <div class="offer-item">
                                                <img class="img-thumbnail"
                                                    src="{{ asset('/uploads/plats') }}/{{ $plat->code_restaurant }}/{{ $plat->photo }}"
                                                    width="80" height="80">
                                                <div>
                                                    <h3>{{ $plat->designation }}</h3>
                                                    <p>
                                                        {{ $plat->description }}
                                                    </p>
                                                    <p>
                                                        {{ $plat->adresse_restaurant }}
                                                    </p>
                                                    @auth
                                                        @if ($plat->quantite > 0)
                                                            <form action="{{ route('commande.visiteur') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="plat_id" value="{{ $plat->id }}">
                                                                <button type="submit" class="btn btn-warning"><i
                                                                        class="fa fa-shopping-cart"></i> Commande</button>
                                                            </form>

                                                        @else
                                                            <div class="col-md-12">
                                                                <a href="#" class="btn btn-danger"><i>Le stock est à
                                                                        terme.</i></a>
                                                            </div>
                                                        @endif
                                                    @endauth

                                                </div>
                                                <span class="offer-price"
                                                    style="color:black">{{ number_format($plat->prix / 1000, 3, '.', ' ') }}
                                                    GNF</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h3 class="text text-center">
                                        <span>0 résultats pour "{{ request()->input('query') }}"</span>
                                    </h3>
                                @endif
                                <div class="mt-3 col-md-6 mx-auto">
                                    {{ $plats->links() }}
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

@section('extra-js')

    <script>
        $('#query').on('keyup', function() {
            const query=$(this).val();
            $.ajax({
                type:'GET',
                url:'/site',
                data:{
                    query:query,
                }
            });
        });

    </script>

@endsection
