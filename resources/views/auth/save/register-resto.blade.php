

<!DOCTYPE html>
<html lang="fr">

<!-- Mirrored from html.designstream.co.in/absolute/bootstrap-4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 13:27:49 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Register</title>

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
                    <h3>Create New account</h3>
                     <form method="POST" action="{{ route('register-resto') }}">
                        @csrf

                        <div class="form-group row {{ $errors->has('code_restaurant') ? 'has-error' : '' }}">
                            <input type="text" class="form-control @error('code_restaurant') is-invalid @enderror" name="code_restaurant" value="{{ old('matricule') ?: 'ABS'.NOW()->format('dmyhs')}}" autofocus placeholder="Code restaurant" readonly>
                         @error('code_restaurant')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus placeholder="Nom d'utilisateur">
                         @error('name')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group row {{ $errors->has('immatriculation') ? 'has-error' : '' }}">
                            <input type="text" class="form-control @error('immatriculation') is-invalid @enderror" name="immatriculation" value="{{ old('immatriculation') }}" autofocus placeholder="Immatriculation">
                         @error('immatriculation')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus placeholder="email">
                         @error('email')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group row {{ $errors->has('adresse_restaurant') ? 'has-error' : '' }}">
                            <input type="text" class="form-control @error('adresse_restaurant') is-invalid @enderror" name="adresse_restaurant" value="{{ old('adresse_restaurant') }}" autofocus placeholder="Adresse restaurant">
                         @error('adresse_restaurant')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group row {{ $errors->has('bp') ? 'has-error' : '' }}">
                            <input type="text" class="form-control @error('bp') is-invalid @enderror" name="bp" value="{{ old('bp') }}" placeholder="Bp">
                         @error('bp')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group row {{ $errors->has('tel') ? 'has-error' : '' }}">
                            <input type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" placeholder="Téléphone">
                         @error('tel')
                                    <span class="text text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Mot de passe">
                            @error('password')
                                    <span class="text text-danger help-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <input type="password" class="form-control" name="password_confirmation"  placeholder="Confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block ">S'inscrire</button>
                        <a href="#"><small></small></a>
                        <p class=" text-center"><small>Si vous déjà un compte?</small></p>
                        <a class="btn  btn-secondary btn-block" href="/login">Connectez-vous</a>
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
