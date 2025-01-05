<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title  -->
    <title>Meal - | Login</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <!-- Custom Styles for Animation -->
    <style>
        /* Fade-in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Apply animations with delay */
        body {
            animation: fadeIn 0.8s ease-in-out;
        }

        .header-area {
            animation: fadeIn 1s ease-in-out 0.2s;
            animation-fill-mode: both;
        }

        .products-catagories-area {
            animation: fadeIn 1s ease-in-out 0.4s;
            animation-fill-mode: both;
        }

        .login-wrap {
            animation: fadeIn 1s ease-in-out 0.6s;
            animation-fill-mode: both;
        }

        .form-group {
            animation: fadeIn 1s ease-in-out 0.8s;
            animation-fill-mode: both;
        }

        .social {
            animation: fadeIn 1s ease-in-out 1s;
            animation-fill-mode: both;
        }

        .field-icon {
            float: right;
            margin-left: -35px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
            padding-right: 5px;
        }

        .google-btn {
            width: 184px;
            height: 42px;
            background-color: black;
            border-radius: 2px;
            box-shadow: 0 3px 4px 0 rgba(0, 0, 0, .25);
        }

        .google-btn:hover {
            box-shadow: 0 0 6px #4285f4;
        }

        .google-icon-wrapper {
            position: absolute;
            margin-top: 1px;
            margin-left: 1px;
            width: 40px;
            height: 40px;
            border-radius: 2px;
            background-color: #fff;
        }

        .google-icon {
            position: absolute;
            margin-top: 11px;
            margin-left: -7px;
            width: 18px;
            height: 18px;
        }

        .btn-text {
            float: right;
            margin: 11px 11px 0 0;
            color: #fff;
            font-size: 14px;
            font-family: "Roboto";
        }
    </style>
</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-content-wrapper d-flex clearfix">
        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <div class="logo">
                <a href="{{url('/')}}"><img src="img/core-img/logo.png" alt="Logo"></a>
            </div>
            <nav class="amado-nav">
                <ul>
                    <li>Welcome, {{ Auth::user()->name ?? 'Guest' }}</li>
                    <li ><a href="{{('/')}}"><i class="fa fa-cutlery " aria-hidden="true"></i> Meals</a></li>
                    
                    @auth
                        @if(Auth::user()->usertype=='0')
                            <li><a href="{{('order')}}"><i class="fa fa-motorcycle " aria-hidden="true"></i> Order</a></li>
                            <li><a href="{{ url('profile') }}"><i class="fa fa-user " aria-hidden="true"></i> Profile</a></li>
                            <li><a href="{{url('logout')}}"><i class="fa fa-sign-out " aria-hidden="true"></i> logout</a></li>
                        @elseif(Auth::user()->usertype=='1')
                            <li><a href="{{ url('/redirects')}}"><i class="fa fa-sitemap " aria-hidden="true"></i> Control Panel</a></li>
                            <li><a href="{{url('logout')}}"><i class="fa fa-sign-out " aria-hidden="true"></i> logout</a></li>
                        @endif
                    @else
                        <li><a href="{{ route('register') }}"><i class="fa fa-user-plus " aria-hidden="true"></i> Register</a></li>
                    @endauth
                </ul>
            </nav>
        </header>
        <!-- Header Area End -->

        <!-- Login Form -->
        <div class="products-catagories-area clearfix">
            <div class="container">
                <div class="row justify-content-center" style="margin-top: 6em;">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-2">
                            <h3 class="mb-4 text-center text-warning">Have an Account?</h3>

                            <!-- Display Validation Errors -->
                            @if ($errors->any())
                                <div class="mb-4 text-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Login Form -->
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="email" class="form-control" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input id="password" class="form-control" type="password" placeholder="Password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-dark submit px-3">Sign In</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50">
                                        <a href="{{ url('register') }}"><p class="checkbox-wrap">Don't have an account?</p></a>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
    </div>

    <!-- Scripts -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>
</body>
</html>
