<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.designstream.co.in/absolute/bootstrap-4/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 13:22:33 GMT -->
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
        @yield('extra-meta')

    <link type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/jsgrid/jsgrid.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/jsgrid/jsgrid-theme.min.css') }}" />
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/metis-menu/metisMenu.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/simple-line-icons-master/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/widget/widget.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/calendar/fullcalendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/ui/jquery-ui.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}"/>
    <!-- THEME CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/theme/dark.css')}}" rel="stylesheet" type="text/css" />

        <!-- PAGE LEVEL SCRIPTS -->


        @livewireStyles

        <style>
                .logo{
                    letter-spacing: 0;
                    font-weight: normal;
                    position: relative;
                    padding: 0 0 20px 0;
                    line-height: 120% !important;
                    margin-left: -10px;
                    color: #FFF;
                    margin: 0;
                    font-family: 'Elephant', Georgia, 'Times New Roman', serif;
                    font-style: italic;
                }
                .logo a{
                    text-decoration: none !important;
                    opacity: 1;
                }

                .logo a:hover{
                    opacity: 0.8;
                }
        </style>

    </head>
    <body>

       <div id="wrapper">
            <!-- BEGIN HEADER -->
           <div class="page-header navbar fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="/">
                        <h1 class="logo">{{ucfirst(strtolower(config('app.name')))}}</h1>
                        </a>
                    </div>
                    <div class="menu-toggler sidebar-toggler">
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
                            @if(Route::has('login'))

                            @auth

                            @if(Auth::user()->utype==="ADMIN")
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                                    <img alt="" class="rounded-circle" src="assets/images/avtar-1.jpg">

                                </a>
                                <div class="dropdown-menu dropdown-menu-default">
                                    <a class="dropdown-item" href="#"><i class="icon-user"></i> {{Auth::user()->name}} </a>
                                     <a class="dropdown-item" href="#"><i class="icon-calendar"></i> My Calendar </a>
                                  <a class="dropdown-item" href="#"><i class="icon-envelope-open"></i> My Inbox
                                            <span class="badge badge-danger"> 3 </span>
                                        </a>
                                    <a class="dropdown-item" href="#"><i class="icon-rocket"></i> My Tasks
                                            <span class="badge badge-success"> 7 </span>
                                        </a>
                                   <a class="dropdown-item" href="#">
                                            <i class="icon-lock"></i> Lock Screen </a>
                                    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="icon-key"></i> Log Out </a>
                                    <form id="logout-form" action="{{route('logout')}}" method="post">
                                    @csrf
                                    </form>

                                   </div>
                            </li>
                            @else
                             <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                                    <img alt="" class="rounded-circle" src="assets/images/avtar-1.jpg">

                                </a>
                                <div class="dropdown-menu dropdown-menu-default">
                                    <a class="dropdown-item" href="#"><i class="icon-user"></i> {{Auth::user()->name}} </a>
                                     <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="icon-key"></i> Log Out </a>
                                    <form id="logout-form" action="{{route('logout')}}" method="post">
                                    @csrf
                                    </form>
                                </div>
                            </li>
                            @endif

                            @else
                            <!-- <a class="dropdown-item" href="#">
                                            <i class="icon-key"></i> Log Out </a> -->
                            @endauth

                            @endif
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
            <div class="page-container">

                <aside class="sidebar">
                    <nav class="sidebar-nav">
                        <ul class="metismenu" id="menu">
                        @auth
                            @if(Auth::user()->utype==="RESTO")
                            <li class="active">
                                <a href="#"><i class="icon-grid"></i> <span class="nav-label">Administration</span><span></span></a>
                            </li>
                             <li>
                                <a href="#"><i class="fa fa-ship"></i> <span class="nav-label">Catégorie</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="/categorie">Ajouter</a></li>
                                    <li><a href="login.html">Lister</a></li>
                                </ul>
                            </li>
                            <li class="active">
                                <a href="/plat"><i class="fa fa-birthday-cake"></i> <span class="nav-label">Plats</span><span></span></a>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Tables</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="/table">Ajouter </a></li>
                                    <li><a href="/listes">Liste </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-cart-plus"></i> <span class="nav-label">Ventes </span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="/vente">Ajouter</a></li>
                                    <li><a href="/liste-vente">Effectuer</a></li>
                                    <li><a href="/bilan">Bilan</a></li>
                                </ul>
                            <li>
                                <a href="#"><i class="fa fa-shopping-basket"></i> <span class="nav-label">Commande</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="/commande">Ajouter</a></li>
                                    <li><a href="/liste-commande">Listes</a></li>
                                    <li><a href="/liste-livrer">Livrer</a></li>
                                    <li><a href="/liste-nonlivrer">Non livrer</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Client</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="/client">Ajouter</a></li>
                                    <li><a href="/commande-livrer">Liste</a></li>
                                    <li><a href="/commande-nonlivrer">Bloqué</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bus"></i> <span class="nav-label">Fournisseur</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="/fournisseur">Ajouter</a></li>
                                    <li><a href="/fournisseur-list">Liste</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-motorcycle"></i> <span class="nav-label">Livreur</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="/livreur">Ajouter</a></li>
                                    <li><a href="/livreur-list">Liste</a></li>
                                    <li><a href="/livreur-zone">Livreur Zone</a></li>
                                </ul>
                            </li>
                             <li>
                                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Employer</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="/employe">Ajouter</a></li>
                                    <li><a href="login.html">Lister</a></li>
                                    <li><a href="register.html">Contrat</a></li>
                                    <li><a href="404.html">Licenser</a></li>
                                    <li><a href="price_tables.html">Payer</a></li>
                                    <li><a href="page_contact.html">Suivi employé</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-building-o"></i> <span class="nav-label">Bilan</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="/bilan-commande">Bilan commande</a></li>
                                    <li><a href="form_advanced.html">Bilan sortie</a></li>
                                    <li><a href="form_wizard.html">Etat caisse</a></li>

                                </ul>
                            </li>


                            @endif

                            @if(Auth::user()->utype==="ADMIN")
                            <li>
                                <a href="#"><i class="fa fa-cart-plus"></i> <span class="nav-label">Ventes </span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="/vente">Statistique par restaurant</a></li>
                                    <li><a href="/bilan">Bilan par restaurant</a></li>
                                </ul>
                            <li>
                                <a href="#"><i class="fa fa-shopping-basket"></i> <span class="nav-label">Commande</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="/commande">Commande par restau</a></li>
                                    <li><a href="/commande-livrer">Commande effectué</a></li>
                                    <li><a href="/commande-nonlivrer">Commande ne entente</a></li>
                                    <li><a href="/commande-nonlivrer">Rendement</a></li>
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
                                <a href="#"><i class="fa fa-hourglass-o"></i> <span class="nav-label">Journal/Bilan</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="icons.html">Journal Vente</a></li>
                                    <li><a href="weather-icon.html">Journal Commande</a></li>
                                    <li><a href="themifyicons.html">Journal Caisse</a></li>
                                    <li><a href="linea_arrows.html">Grand Livre</a></li>
                                </ul>
                            </li>

                            @endif
                        @endauth
                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </nav>
                    <!-- END SIDEBAR -->
                </aside>


                @yield('content')
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



    @livewireScripts



        <!-- JAVASCRIPT FILES -->

       <script type="text/javascript" src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
       <script type="text/javascript" src="{{asset('assets/plugins/metis-menu/metisMenu.min.js')}}"></script>
       <script type="text/javascript" src="{{asset('assets/plugins/bootstrap/js/tether.min.js')}}"></script>
       <script type="text/javascript" src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
       <script type="text/javascript" src="{{asset('assets/plugins/slim-scroll/jquery.slimscroll.min.js')}}"></script>
       <script src="{{asset('assets/plugins/c3/d3.v3.min.js')}}" charset="utf-8"></script>
       <script src="{{asset('assets/plugins/c3/c3.min.js')}}"></script>
       <script src="{{asset('assets/plugins/calendar/moment.min.js')}}"></script>
       <script src="{{asset('assets/plugins/calendar/fullcalendar.min.js')}}"></script>
       <script src="{{asset('assets/plugins/ui/jquery-ui.js')}}"></script>
       <script src="{{asset('assets/plugins/map/jquery-jvectormap-1.2.2.min.js')}}"></script>
       <script src="{{asset('assets/plugins/map/jquery-jvectormap-world-mill-en.js')}}"></script>
       <!-- <script src="{{asset('assets/plugins/morris_chart/morris.js')}}"></script> -->
       <script src="{{asset('assets/plugins/morris_chart/raphael-2.1.0.min.js')}}"></script>
       <!-- PAGE LEVEL FILES -->
       <script src="{{asset('assets/plugins/data-tables/jquery.dataTables.js')}}"></script>
       <script src="{{asset('assets/plugins/data-tables/dataTables.tableTools.js')}}"></script>
       <script src="{{asset('assets/plugins/data-tables/dataTables.bootstrap4.min.js')}}"></script>
       <script src="{{asset('assets/plugins/data-tables/dataTables.responsive.js')}}"></script>
       <script src="{{asset('assets/plugins/data-tables/tables-data.js')}}"></script>
       <script src="{{asset('assets/js/bmd.dataTables.js')}}"></script>
       <script src="{{asset('assets/js/bmd.js')}}"></script>
       <!-- Custom FILES -->
       <script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
       <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
       <!-- <script src="{{asset('assets/js/index.js')}}"></script> -->


        <script>
        window.livewire.on('platAdded', ()=>{
            $('#addPlatModal').modal('hide');
        });

         window.livewire.on('platUpdated', ()=>{
            $('#editPlatModal').modal('hide');
        });

    </script>

       <script>

           function previewFile(input){
               var file=$("input[type=file]").get(0).files[0];
               if (file) {
                   var reader=new FileReader();
                   reader.onload=function(){
                       $('#previewImg').attr("src", reader.result);
                   }
                   reader.readAsDataURL(file);
               }
           }

       </script>

     @include('flashy::message')

    @yield('extra-js')
    </body>

</html>
