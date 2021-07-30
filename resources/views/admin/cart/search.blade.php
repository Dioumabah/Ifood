@extends('layouts.masteradmin', ['title'=>'Vente'])


@section('content')

 <!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">
                    <div class="content-wrapper container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title">

                                        <h4 class="float-left">Cart</h4>


                                        <ol class="breadcrumb float-left float-md-right">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><i class="fa fa-home"></i></a></li>
                                            <li class="breadcrumb-item">panier<span class="badge btn btn-success"><a href="{{route('cart.panier')}}">{{Cart::count()}}</a> </span></li>
                                        </ol>
                                        <div class="col-md-3">
                                            <form action="{{route('plat.search')}}" method="get">
                                                <div class="form-group">
                                                    <input type="text" name="q" id="" class="form-control">
                                                </div>
                                                <button type="submit" class="btn btn-info">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </div>


                                </div>
                            </div>
                        </div><!-- end .page title-->

                        <div class="row">
                            <div class="col-sm-12">
                             <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <td  class="text-center"><input type="checkbox" onClick="$('input[name*=\'selected\']').prop('checked', this.checked);"></td>
                                                    <td class="text-center">Image</td>
                                                    <td class="text-left">                    <a href="#" class="asc">Designation</a>
                                                    </td>
                                                    <td class="text-left">                    <a href="#">Catégorie</a>
                                                    </td>
                                                    <td class="text-left">                    <a href="#">Prix</a>
                                                    </td>
                                                    <td class="text-right">                    <a href="#">Quantité</a>
                                                    </td>
                                                    <td class="text-left">                    <a href="#">Status</a>
                                                    </td>
                                                    <td class="text-right">Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             @foreach($plats as $plat)
                                            @if($plat->restaurant_id==Auth::user()->id)
                                                <tr>
                                                    <td class="text-center"><input type="checkbox" name="selected[]" value="42">
                                                    </td>
                                                    <td class="text-center"><img src="{{ asset('/uploads/plats')}}/{{Auth::user()->code_restaurant}}/{{$plat->photo}}" width="80" height="80" alt="Apple Cinema 30&quot;" class="img-thumbnail">
                                                    </td>
                                                    <td class="text-left">{{$plat->designation}}"</td>
                                                    <td class="text-left">{{$plat->categories->libelle}}</td>
                                                    <td class="text-left"><span class=" line-through">100.0000</span><br>
                                                        <div class="text-danger">{{$plat->getPrix()}}</div>
                                                    </td>
                                                    <td class="text-right"><span class="label label-success">{{$plat->quantite}}</span>
                                                    </td>
                                                    <td class="text-left">
                                                        <form action="{{route('cart.store')}}" method="POST" >
                                                            @csrf
                                                            <input type="hidden" name="plat_id" value="{{$plat->id}}">
                                                            <!-- <input type="hidden" name="designation" value="{{$plat->designation}}">
                                                            <input type="hidden" name="quantite" value="{{$plat->quantite}}">
                                                            <input type="hidden" name="prix" value="{{$plat->prix}}"> -->
                                                            <button type="submit" class="btn btn-dark">Ajouter au panier</button>
                                                        </form>
                                                    </td>
                                                    <td class="text-right"><a href="#" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
                                                </tr>
                                                 @endif
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>

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
