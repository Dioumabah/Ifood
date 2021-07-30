

<!DOCTYPE html>
<html lang="fr">

<!-- Mirrored from html.designstream.co.in/absolute/bootstrap-4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 13:27:49 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Login</title>

        <!-- WEB FONTS : use %7C instead of | (pipe) -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

        <!-- CORE CSS -->
        <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/metis-menu/metisMenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/simple-line-icons-master/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/c3/c3.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/widget/widget.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/calendar/fullcalendar.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/ui/jquery-ui.css')}}" rel="stylesheet">

        <!-- THEME CSS -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/theme/dark.css')}}" rel="stylesheet" type="text/css" />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="account">
        <div class="container">
            <div class="row">
                <div class="account-col text-center">
                    <h1>{{config('app.name')}}</h1>
                    <h3>Log into your account</h3>
                     <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus placeholder="E-mail">
                         @error('email')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Mot de passe">
                            @error('password')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block ">S'identifier</button>
                        <a href="#"><small>Mot de passe oublié?</small></a>
                        <p class=" text-center"><small>Si vous n'avez pas de compte?</small></p>
                        <a class="btn  btn-secondary btn-block" href="/register">Créer votre compte</a>
                        <p>{{ ucfirst(strtolower(config('app.name')))}} &copy; {{date('yy')}} </p>

                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
         <script type="text/javascript" src="{{asset('assets/plugins/bootstrap/js/tether.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    </body>

<!-- Mirrored from html.designstream.co.in/absolute/bootstrap-4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 13:27:49 GMT -->
</html>
