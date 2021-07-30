<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
    <!-- Site Metas -->
    <title>ifood</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

     @yield('extra-meta')
    <!-- Site Icons -->
      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assetssite/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('assetssite/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assetssite/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assetssite/css/theme-default.css') }}">
    <!-- color -->
    <link id="changeable-colors" rel="stylesheet" href="{{ asset('assetssite/css/colors/orange.css') }}" />
    <!-- Modernizer -->
    <script src="{{ asset('assetssite/js/modernizer.js') }}"></script>
      


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
 @livewireStyles
</head>

<body class="banner full-screen-mode parallax">
    <div id="loader">
        <div id="status"></div>
    </div>
    <div id="site-header">
        <header id="header" class="header-block-top">
            <div class="container">
                <div class="row">
                    <div class="main-menu">
                        <!-- navbar -->
                        <nav class="navbar navbar-default" id="mainNav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <div class="logo">
                                    <a class="navbar-brand js-scroll-trigger logo-header" href="#">
                                        <img src="{{ asset('assetssite/site/images/logo.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="active"><a href="/site">Acueil</a></li>
                                    <li><a href="/site">Reservation</a></li>
                                    <li><a href="#gallery">Apropos</a></li>
                                    <li><a href="#footer">Contact us</a></li>
                                    @guest
                                    <li><a href="/login" class="btn btn-warning btn-xs">Se connectez</a></li>
                                    @endguest

                                    @auth
                                    <li>

                                    <a class="btn btn-warning btn-xs" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="icon-key"></i> Se deconnectez </a>
                                    <form id="logout-form" action="{{route('logout')}}" method="post">
                                    @csrf
                                    </form>
                                    </li>
                                    <li>
                                         <a href="/visiteur-panier" class="btn btn-warning btn-xs" href=""><i class="fa fa-cart-plus">Panier {{Cart::count()}}</i></a>
                                    </li>
                                    @endauth
                                </ul>
                            </div>
                            <!-- end nav-collapse -->
                        </nav>
                        <!-- end navbar -->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </header>
        <!-- end header -->
    </div>
	<!-- end site-header -->
    @yield('content')


    <a href="#" class="scrollup" style="display: none;">Scroll</a>

    <section id="color-panel" class="close-color-panel">
        <a class="panel-button gray2"><i class="fa fa-cog fa-spin fa-2x"></i></a>
        <!-- Colors -->
        <div class="segment">
            <h4 class="gray2 normal no-padding">Color Scheme</h4>
            <a title="orange" class="switcher orange-bg"></a>
            <a title="strong-blue" class="switcher strong-blue-bg"></a>
            <a title="moderate-green" class="switcher moderate-green-bg"></a>
            <a title="vivid-yellow" class="switcher vivid-yellow-bg"></a>
        </div>
    </section>

    <!-- ALL JS FILES -->
    <script src="{{ asset('assetssite/js/all.js') }}"></script>
    <script src="{{ asset('assetssite/js/bootstrap.min.js') }}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('assetssite/js/custom.js') }}"></script>
    <script  src="{{ asset('assetssite/js/bootstrap-select.js') }}"></script>

     @include('flashy::message')

     @yield('extra-js')


    @livewireScripts

     <script>
        window.livewire.on('studentAdded', ()=>{
            $('#addSearchModal').modal('hide');
        });


    </script>
</body>

</html>
