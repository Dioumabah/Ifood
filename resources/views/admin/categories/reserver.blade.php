<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from html.designstream.co.in/absolute/bootstrap-4/table_editable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 13:30:58 GMT -->
<head>
        <meta charset="utf-8" />
        <title>{{page_title($title ?? '')}}</title>
        <meta name="keywords" content="HTML5,CSS3,Admin Template" />
        <meta name="description" content="" />
        <meta name="Author" content="Psd2allconversion [www.psd2allconversion.com]" />

        <!-- mobile settings -->
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

        <!-- WEB FONTS : use %7C instead of | (pipe) -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

        <!-- CORE CSS -->
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/metis-menu/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/simple-line-icons-master/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/c3/c3.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/widget/widget.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/calendar/fullcalendar.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/ui/jquery-ui.css') }}" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/jsgrid/jsgrid.min.css') }}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/jsgrid/jsgrid-theme.min.css') }}" />
        <!-- THEME CSS -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/theme/dark.css') }}" rel="stylesheet" type="text/css" />

        <!-- PAGE LEVEL SCRIPTS -->

    </head>
    <body>

        <!-- wrapper -->
        <div id="wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="index.html">
                            <img src="assets/images/logo.png" alt="absolute admin" class="img-fluid logo-default"/> </a>

                    </div><div class="menu-toggler sidebar-toggler">
                        <a href="javascript:;" class="navbar-minimalize minimalize-styl-2  float-left "><i class="fa fa-bars"></i></a>
                    </div>

                    <div class="search-bar">
                        <form class="sidebar-search  " action="http://html.designstream.co.in/absolute/bootstrap-4/page_general_search_3.html" method="POST">

                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">

                            </div>
                        </form>
                    </div>
                    <!-- END LOGO -->

                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav float-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-bell"></i>
                                    <span class="badge badge-default"> <span class="ring">
                                        </span><span class="ring-point">
                                        </span> </span>
                                </a>
                                <ul class="dropdown-menu animated flipInX">
                                    <li class="external">
                                        <h3>
                                            <span class="bold">12 pending</span> notifications</h3>
                                        <a href="page_user_profile_1.html">view all</a>
                                    </li>

                                </ul>
                            </li>
                            <!-- END NOTIFICATION DROPDOWN -->
                            <!-- BEGIN INBOX DROPDOWN -->
                            <li class="dropdown dropdown-extended dropdown-notification" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-envelope-open"></i>
                                    <span class="badge badge-default"> <span class="ring">
                                        </span><span class="ring-point">
                                        </span> </span>
                                </a>
                                <ul class="dropdown-menu animated flipInX">
                                    <li class="external">
                                        <h3>
                                            <span class="bold">12 New Email</span> </h3>
                                        <a href="page_user_profile_1.html">view all</a>
                                    </li>
                                    <li>
                                    </li>
                                </ul>
                            </li>
                            <!-- END INBOX DROPDOWN -->
                            <!-- BEGIN TODO DROPDOWN -->
                            <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-calendar"></i>
                                    <span class="badge badge-default"> <span class="ring">
                                        </span><span class="ring-point">
                                        </span> </span>
                                </a>
                                <ul class="dropdown-menu extended tasks animated flipInX">
                                    <li class="external">
                                        <h3>You have
                                            <span class="bold">12 pending</span> tasks</h3>
                                        <a href="app_todo.html">view all</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END TODO DROPDOWN -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                                    <img alt="" class="rounded-circle" src="assets/images/avtar-1.jpg">

                                </a>
                                <div class="dropdown-menu dropdown-menu-default">
                                    <a class="dropdown-item" href="#"><i class="icon-user"></i> My Profile </a>
                                     <a class="dropdown-item" href="#"><i class="icon-calendar"></i> My Calendar </a>
                                  <a class="dropdown-item" href="#"><i class="icon-envelope-open"></i> My Inbox
                                            <span class="badge badge-danger"> 3 </span>
                                        </a>
                                    <a class="dropdown-item" href="#"><i class="icon-rocket"></i> My Tasks
                                            <span class="badge badge-success"> 7 </span>
                                        </a>
                                   <a class="dropdown-item" href="#">
                                            <i class="icon-lock"></i> Lock Screen </a>
                                    <a class="dropdown-item" href="#">
                                            <i class="icon-key"></i> Log Out </a>
                                   </div>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-quick-sidebar-toggler">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <i class="icon-logout"></i>
                                </a>
                            </li>
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT dropdown-divider -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT dropdown-divider -->

            <!-- BEGIN CONTAINER -->
            <div class="page-container"> <aside class="sidebar">
                    <nav class="sidebar-nav">
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="#"><i class="icon-grid"></i> <span class="nav-label">Administration</span><span></span></a>
                            </li>
                            <li class="active">
                                <a href="/plat"><i class="fa fa-user"></i> <span class="nav-label">Plats</span><span></span></a>
                            </li>
                            <li>
                                <a href="#"><i class="icon-basket"></i> <span class="nav-label">Tables</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="/table">Ajouter </a></li>
                                    <li><a href="/reserver">Reserver </a></li>
                                    <li><a href="order-detail.html">Lister </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="mailbox.html"><i class="fa fa-cart-plus"></i> <span class="nav-label">Ventes </span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="mailbox.html">Effectuer</a></li>
                                    <li><a href="mail_detail.html">Bilan</a></li>
                                </ul>
                            <li>
                                <a href="#"><i class="fa fa-shopping-basket"></i> <span class="nav-label">Commande</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="flot_charts.html">Ajouter</a></li>
                                    <li><a href="morris_js.html">Livrer</a></li>
                                    <li><a href="chart_js.html">Non livrer</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Bilan</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="form_basic.html">Bilan entrer</a></li>
                                    <li><a href="form_advanced.html">Bilan sortie</a></li>
                                    <li><a href="form_wizard.html">Etat caisse</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Employer</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="lockscreen.html">Ajouter</a></li>
                                    <li><a href="login.html">Lister</a></li>
                                    <li><a href="register.html">Contrat</a></li>
                                    <li><a href="404.html">Licenser</a></li>
                                    <li><a href="price_tables.html">Payer</a></li>
                                    <li><a href="page_contact.html">Suivi employé</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-hourglass-o"></i> <span class="nav-label">Journal/Bilan</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="icons.html">Journal Vente</a></li>
                                    <li><a href="weather-icon.html">Journal Commande</a></li>
                                    <li><a href="themifyicons.html">Journal Caisse</a></li>
                                    <li><a href="linea_arrows.html">Grand Livre</a></li>
                                </ul>
                            </li>


                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </nav>
                    <!-- END SIDEBAR -->
                </aside>

                <!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">
                    <div class="content-wrapper container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title">
                                    
                                        <h4 class="float-left">Inline Editable Tables </h4>


                                        <ol class="breadcrumb float-left float-md-right">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><i class="fa fa-home"></i></a></li>
                                            <li class="breadcrumb-item">Inline Editable Tables  </li>
                                        </ol>

                                   
                                </div>
                            </div>
                        </div><!-- end .page title-->
                        <div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-card recent-activites">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                        Inline Editable Tables
                                        <div class="float-right">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-rounded btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                <div class="dropdown-menu panel-dropdown" role="menu">
                                                   <a  class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                    
                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body  p-xl-3">
                                        <div id="jsGrid"></div>



                                    </div>
                                </div><!-- End .panel --> 


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
            </div>
            <!-- END CONTAINER -->
        </div>
        <!-- /wrapper -->


        <!-- SCROLL TO TOP -->
        <a href="#" id="toTop"></a>


        <!-- PRELOADER -->
        <div id="preloader">
            <div class="inner">
                <span class="loader"></span>
            </div>
        </div><!-- /PRELOADER -->


        <!-- JAVASCRIPT FILES -->

        <script type="text/javascript" src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/metis-menu/metisMenu.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap/js/tether.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/slim-scroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/c3/d3.v3.min.js') }}" charset="utf-8"></script>       
        <script src="{{ asset('assets/plugins/c3/c3.min.js') }}"></script>
        <script type="text/javascript" src="../../../www.gstatic.com/charts/loader.js"></script>
        <script src="{{ asset('assets/plugins/calendar/moment.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/calendar/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/ui/jquery-ui.js') }}"></script>
        <script src="{{ asset('assets/plugins/map/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/map/jquery-jvectormap-world-mill-en.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jsgrid/jsgrid.min.js') }}"></script>

        <!-- PAGE LEVEL FILES -->
        <script src="{{ asset('assets/plugins/data-tables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('assets/plugins/data-tables/dataTables.tableTools.js') }}"></script>
        <script src="{{ asset('assets/plugins/data-tables/dataTables.bootstrap.js') }}"></script>
        <script src="{{ asset('assets/plugins/data-tables/dataTables.responsive.js') }}"></script>
        <script src="{{ asset('assets/plugins/data-tables/tables-data.js') }}"></script>

        <!-- Custom FILES -->
        <script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/edit-table.js') }}"></script>
    </body>

<!-- Mirrored from html.designstream.co.in/absolute/bootstrap-4/table_editable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 13:31:01 GMT -->
</html>