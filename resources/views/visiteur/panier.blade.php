@extends('layouts.mastersite', ['title'=>'Commande'])

@section('extra-meta')
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')

 <div id="menu" class="banner full-screen-mode parallax">
        <div class="container"><br><br><br><br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title text-center">
						Votre panier
					</h2>

                        <p class="title-caption text-center">La plateforme ifood vous offre des restaurants et leur cuisines bistronomique dans une atmosphère festive et décontractée..
                         Fultrer votre rechercher à votre guise

                        </p>
                    </div><br><br>

                    <div class="tab-menu">
                        <div class="slider slider-single">
                            @if(Cart::count()>0)
                            <form  method="post" enctype="multipart/form-data" id="form-product" class="">
                                    <div class="table-responsive">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th><b>PLAT</b></th>
                                                <th class="text-right"><b>QUANTITE</b></th>
                                                <th class="text-right"><b>PRIX</b></th>
                                                <th class="text-right"><b>RETURER</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach(Cart::content() as $plat)
                                            <tr>
                                            <td>
                                            <img src="{{ asset('/uploads/plats')}}/{{$plat->model->restaurants->code_restaurant}}/{{$plat->photo}}" width="100" height="100" alt="Apple Cinema 30&quot;" class="img-thumbnail">
                                             &nbsp;<i>{{$plat->model->designation}}</i>
                                             {{$plat->model->categories->libelle}}

                                            </td>
                                                <td class="text-right">
                                                <form action="">
                                                    @csrf
                                                    @method('post')
                                                    <select name="qty" id="qty" class=" custom-select" data-id="{{$plat->rowId}}" data-stock="{{$plat->model->quantite}}">
                                                        @for($i=1; $i<=10; $i++)
                                                            <option value="{{ $i }}" {{ $i == $plat->qty ? 'selected' : '' }}>
                                                                 {{$i}}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </form>
                                                </td>
                                                <td class="text-right">{{$plat->subtotal()}}</td>
                                                <td class="text-right">
                                                <a href="/vvider-panier/{{$plat->rowId}}" class="btn btn-danger fa fa-trash"></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td class="text-right" colspan="3"><b>Total</b></td>
                                                <td class="text-right"><strong>{{Cart::subtotal(). ' GNF'}}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </form>




                        </div>
                           <div class="col-md-4">
                           <form class="form-inline" role="form" method="POST" action="{{route('visiteur.panier')}}">
                                @csrf
                                <div class="reserve-book-btn text-center">
                                    <button type="submit" class="hvr-underline-from-center">
                                <i class="fa fa-cart-plus"></i> Valider la commande
                                </button>
                                </div>
                                </div>

                           </form>

                        </div>

                          @else
                            <div class="col-md-12">
                                <h3 class="alert alert-info text center">Votre panier de commande est vide.</h3>
                            </div>
                          @endif

                            <br><br>
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


@endsection

@section('extra-js')

    <script>
    function changer(){

    }
      var selects = document.querySelectorAll('#qty');
      Array.from(selects).forEach((element)=>{
          element.addEventListener('change', function(){
              var rowId = element.getAttribute('data-id');
              var quantite = element.getAttribute('data-stock');
              var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(
                `/vpanier-edit/${rowId}`,
                {
                    headers:{
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN": token
                    },
                    method: 'post',
                    body: JSON.stringify({
                        qty: this.value,
                        quantite: quantite
                    })
                }
            ).then((data) => {
                console.log(data);
                location.reload();
            }).catch((error) => {
                console.log(error);
            })
          });
      });
    </script>
@endsection
