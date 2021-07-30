@extends('layouts.masteradmin', ['title'=>'Vente'])


@section('content')

 <!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">
                    <div class="content-wrapper container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title">

                                        <h4 class="float-left">VENTE</h4>


                                        <ol class="breadcrumb float-left float-md-right">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><i class="fa fa-home"></i></a></li>
                                            <li class="breadcrumb-item">Product List</li>
                                        </ol>


                                </div>
                            </div>
                        </div><!-- end .page title-->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card p-xl-3">
                                    <div class="row">
                                        <div class="col-sm-4">
                                           <div class="form-group row">
                                                <label class="form-control-label" for="input-status">Plat</label>
                                                <select name="filter_status" id="input-status" class="form-control">
                                                    <option value="*">???</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group row">
                                                <label class="form-control-label" for="input-price">Prix</label>
                                                <input type="text" name="filter_price" value="" placeholder="Price" id="input-price" class="form-control">
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                           <div class="form-group row">
                                                <label class="form-control-label" for="input-quantity">Quantité</label>
                                                <input type="text" name="filter_quantity" value="" placeholder="Quantity" id="input-quantity" class="form-control">
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group row">
                                                <button type="button" id="button-filter" class="btn btn-primary float-right"><i class="fa fa-plus-circle"></i> Ajouter au panier</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <form  method="post" enctype="multipart/form-data" id="form-product" class="">
                                    <div class="table-responsive">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td><b>Product</b></td>
                                                <td><b>Model</b></td>
                                                <td class="text-right"><b>Quantity</b></td>
                                                <td class="text-right"><b>Unit Price</b></td>
                                                <td class="text-right"><b>Total</b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>HP LP3065 <br>
                                                    &nbsp;<small> - Delivery Date: 2011-04-22</small>
                                                </td>
                                                <td>Product 21</td>
                                                <td class="text-right">1</td>
                                                <td class="text-right">$122.00</td>
                                                <td class="text-right">$122.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right" colspan="4"><b>Total</b></td>
                                                <td class="text-right">$130.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>


                            <div class="card p-xl-3">
                                    <div class="row">
                                        <div class="col-sm-4">
                                           <div class="form-group row">
                                                <label class="form-control-label" for="input-status">Client</label>
                                                <select name="filter_status" id="input-status" class="form-control">
                                                    <option value="*">???</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">

                                            <button type="button" id="button-filter" class="btn btn-success float-right"><i class="fa fa-cart-plus"></i> Valider la vente</button>
                                        </div>
                                        <div class="col-sm-4">

                                        </div>

                                          <div class="col-sm-4">

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
