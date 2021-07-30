@extends('layouts.masteradmin', ['title'=>'Commande-panier'])

@section('extra-meta')
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')

 <!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">
                    <div class="content-wrapper container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title">

                                        <h4 class="float-left">Commande</h4>


                                        <ol class="breadcrumb float-left float-md-right">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><i class="fa fa-home"></i></a></li>
                                            <li class="breadcrumb-item">Mon panier<span class="badge btn btn-success"><a href="{{route('cart.panier')}}">{{Cart::count()}}</a> </span></li>
                                        </ol>


                                </div>
                            </div>
                        </div><!-- end .page title-->

                        @if(Cart::count()>0)
                          <div class="row">
                            <div class="col-sm-12">
                                <form  method="post" enctype="multipart/form-data" id="form-product" class="">
                                    <div class="table-responsive">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td><b>Plat</b></td>
                                                <td class="text-right"><b>QUANTITE</b></td>
                                                <td class="text-right"><b>PRIX</b></td>
                                                <td class="text-right"><b>RETURER</b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach(Cart::content() as $plat)
                                            <tr>
                                            <td>
                                            <img src="{{ asset('/uploads/plats')}}/{{$restaurant->code_restaurant}}/{{$plat->model->photo}}" width="80" height="80" alt="Apple Cinema 30&quot;" class="img-thumbnail">
                                             &nbsp;<i>{{$plat->model->designation}}</i>
                                             {{$plat->model->categories->libelle}}

                                            </td>
                                                <td class="text-right">
                                                <form action="">
                                                    @csrf
                                                    @method('post')
                                                    <select name="qty" id="qty" class="custom-select" data-id="{{$plat->rowId}}" data-stock="{{$plat->model->quantite}}">
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
                                                <a href="/vider-commande/{{$plat->rowId}}" class="btn btn-danger fa fa-trash"></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td class="text-right" colspan="4"><b>Total</b></td>
                                                <td class="text-right"><strong>{{Cart::subtotal(). ' GNF'}}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </form>




                            </div>
                            </div>
                          </div>
                           <div class="col-md-4">
                           <form class="form-inline" role="form" method="POST" action="{{route('commande.panier')}}">
                                @csrf
                                <div class="form-group">
                                    <select name="client_id" class="form-control">
                                    @foreach($client as $c)
                                    @if($c->restaurant_id==Auth::user()->id)
                                        <option value="{{$c->id}}">{{$c->nom_complet}}</option>
                                        @endif
                                    @endforeach
                                    </select>

                                    <button type="submit" class="btn btn-info">
                                <i class="fa fa-cart-plus"></i> Valider la commande
                                </button>
                                </div>

                           </form>
                        </div>

                          @else
                            <div class="col-md-12">
                                <h3>Votre panier de commande est vide.</h3>
                            </div>
                          @endif


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
                `/commande-edit/${rowId}`,
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
