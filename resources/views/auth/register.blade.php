<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title  -->
    <title>Meal - | Register</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <!-- Custom Style -->
  
</head>

<body>
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav -->
        <div class="mobile-nav">
            <div class="amado-navbar-brand">
                <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <div class="logo">
                <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <nav class="amado-nav">
                <ul>
                    <li><a href="{{ url('/') }}"><i class="fa fa-cutlery"></i> Meals</a></li>
                    <li class='active'>
                        <!-- Cart count dynamically -->
                        <a href="{{ url('/cart') }}">
                            <i class="fa fa-shopping-bag"></i> Cart 
                            <span id="cart-count">
                                <!-- Cart count will dynamically load here -->
                               ( {{ \Cart::getTotalQuantity() }} )
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="amado-btn-group mt-30 mb-100">
                <a href="{{url('login')}}" class="btn amado-btn active">LOGIN</a>
            </div>

            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <!-- Register Form -->
        <div class="products-catagories-area clearfix">
            <div class="container">
                <div class="row justify-content-center" style="margin-top: 6em;">
                    <div class="col-md-6 col-lg-4">

                        <!-- Error Display -->
                        @if ($errors->any())
                            <div class="mb-4 text-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="login-wrap p-2">
                            <h3 class="mb-4 text-center text-warning">Don't Have an account?</h3>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="name" class="form-control" placeholder="Full Name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input id="email" class="form-control" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group">
                                    <input id="password" class="form-control" placeholder="Password" type="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <input id="password_confirmation" class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" required>
                                </div>
                                <div class="form-group">
                                    <a href="{{ url('login') }}"><p>Have an account?</p></a>
                                    <button type="submit" class="form-control btn btn-dark submit px-5">REGISTER</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    

        <!-- Scripts -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/active.js"></script>
    </body>
</html>
