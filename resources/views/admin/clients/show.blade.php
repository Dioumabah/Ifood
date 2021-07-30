@extends('layouts.masteradmin', ['title'=>'Detail-Employe'])


@section('content')

   <!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">
                    <div class="content-wrapper container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title">


                                        <h4 class="float-left">Detail de l'employé</h4>



                                </div>
                            </div>
                        </div><!-- end .page title-->

                        <div class="row">
                            <div class="col-sm-12">

                                <div class="card p-xl-3">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td colspan="2">Detail</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="width: 50%;"><address>
                                                        <strong>Code employé: {{$employe->code_em}}</strong><br>
                                                        Adresse {{$employe->adresse}} </address>
                                                    <b>Telephone:</b> {{$employe->contact}}<br>
                                                    <b>E-Mail:</b> {{$employe->email}}<br></td>
                                                <td style="width: 50%;"><b>Nom: {{$employe->nom_complet}}</b><br>
                                                    <b>Fontcion:</b> {{$employe->role}}<br>
                                                    <b>Genre:</b> {{$employe->genre}}<br>
                                                    <b>Restaurant:</b> <br>
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
