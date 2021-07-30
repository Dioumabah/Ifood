@extends('layouts.masteradmin', ['title'=>'Detail-Commande'])


@section('content')

   <!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">
                    <div class="content-wrapper container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title">

                                        <h4 class="float-left">Detail de la commande</h4>
                                </div>
                            </div>
                        </div><!-- end .page title-->

                        <div class="row">
                            <div class="col-sm-12">

                                <div class="card p-xl-3">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td colspan="2">Facture de vente N° : <strong>{{$commande->code_commande}}</strong> </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="width: 50%;"><address>
                                                        <strong>Code client: {{$commande->clients->code_client}}</strong><br>
                                                        Adresse {{$commande->clients->localite}} </address>
                                                    <b>Telephone:</b>{{$commande->clients->contact}} <br></td>
                                                <td style="width: 50%;"><b>Client: {{$commande->clients->nom_complet}}</b><br>
                                                    @foreach($plats as $plat)
                                                    <b>{{$plat[0] .' '. getPrice($plat[1]).' '.$plat[2]}} <br>
                                                       </b>

                                                      @endforeach
                                                        <br>
                                                    <b>Restaurant:</b>{{$commande->restaurants->code_restaurant}} <br>
                                                    <b>E-Mail:</b>{{$commande->restaurants->email}} <br>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>



                            </div>
                        </div>


                        <div class="clearfix"></div>
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
