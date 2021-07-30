@extends('layouts.masteradmin', ['title'=>'Vente'])


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
                                            <li class="breadcrumb-item">Commande<span class="badge btn btn-success"><a href="/commande-afficher">{{Cart::count()}}</a> </span></li>
                                        </ol>


                                </div>
                            </div>
                        </div><!-- end .page title-->

                        <div class="row">
                            <div class="col-sm-12">
                             @foreach($plats as $plat)
                            @if($plat->restaurant_id==$restaurant->id)

                            <ul  class="nav navbar-nav navbar-left mu-main-nav"  style="display: inline-block;">
                             <div class="badge badge-pill badge-info">{{$plat->stock}}</div>
                             <img src="{{ asset('/uploads/plats')}}/{{$restaurant->code_restaurant}}/{{$plat->photo}}" width="150" height="150" alt="" class="img-thumbnail img-responsive">
                                <li>
                                <h3>{{$plat->designation}}</h3>
                                <p>
                                {{$plat->categories->libelle}}
                                </p>
                                <span class="" style="color: #000000">{{$plat->getPrix()}}</span><br>
                                @if($plat->quantite>0)
                                     <form action="{{route('commande.store')}}" method="POST" >
                                    @csrf
                                    <input type="hidden" name="plat_id" value="{{$plat->id}}">
                                    <button type="submit" class="btn btn-primary" ><i class="fa fa-shopping-cart"></i> Ajouter à la commande</button>
                                    </form>

                                @else
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-danger"><i>Le stock est à terme.</i></a>
                                </div>
                                @endif

                                    </li>
                            </ul>
                            @endif
                            @endforeach

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
