<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Meal - | Login </title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <script>$(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });</script>
</head>
<style>.field-icon {
    float: right;
    margin-left: -35px;
    margin-top: -25px;
    position: relative;
    z-index: 2;padding-right: 5px;
  }
  .google-btn {
	 width: 184px;
	 height: 42px;
	 background-color: black;
	 border-radius: 2px;
	 box-shadow: 0 3px 4px 0 rgba(0, 0, 0, .25);
}
 .google-btn .google-icon-wrapper {
	 position: absolute;
	 margin-top: 1px;
	 margin-left: 1px;
	 width: 40px;
	 height: 40px;
	 border-radius: 2px;
	 background-color: #fff;
}
 .google-btn .google-icon {
	 position: absolute;
	 margin-top: 11px;
	 margin-left: -7px;
	 width: 18px;
	 height: 18px;
}
 .google-btn .btn-text {
	 float: right;
	 margin: 11px 11px 0 0;
	 color: #fff;
	 font-size: 14px;
	 letter-spacing: 0.2px;
	 font-family: "Roboto";
}
 .google-btn:hover {
	 box-shadow: 0 0 6px #4285f4;
}
 .google-btn:active {
	 background: #1669f2;
}

  </style>
<body>

    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>

                <li > <a href="{{ url('/') }}"><i class="fa fa-cutlery " aria-hidden="true"></i> Meals</a></li>
                    <li><a href="{{ url('/cart') }}"><i class="fa fa-shopping-bag " aria-hidden="true"></i> Cart <span>(0)</span></a></li>

                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="{{ url('login') }}" class="btn amado-btn active">LOGIN</a>
            </div>

            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->


        <div class="products-catagories-area clearfix">
            <div class="container">

                <div class="row">
                    <div class="col-12">


@if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif

                        <div class="row justify-content-center"style="margin-top: 9em;">
                            <div class="col-md-6 col-lg-4" >
                                <div class="login-wrap p-2">
                              <h3 class="mb-4 text-center text-warning">Have an Account?</h3>
                              <x-jet-validation-errors class="mb-4" />
                              <form method="POST" action="{{ route('login') }}">
            @csrf
                                  <div class="form-group">
                                      <input id="email" class="form-control" type="email" placeholder="Email" name="email" :value="old('email')" required autofocus >
                                  </div>
                            <div class="form-group">
                              <input id="password"  class="form-control" type="password" placeholder="Password" name="password" required autocomplete="current-password">
                              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-dark submit px-3">Sign In</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <a href="{{ url('register') }}"><p class="checkbox-wrap checkbox-primary" >Don't Have an account ?
                                    </p></a>
                                            </div>
                                            <div class="w-50 text-md-right">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" >Forgot Password</a>
                                                @endif
                                            </div>
                            </div>
                          </form>
                          <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                          <div class="social d-flex text-center">
                            <div class="google-btn">
                               <center> <div class="google-icon-wrapper">
                                  <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
                                </div>
                                <p class="btn-text"><b>Sign in with google</b></p>
                              </div></div></center>
                          </div>
                            </div>
                        </div>
                            <!-- Single Product Area -->

                    </div>
                </div>
            </div>
        </div>
        </div>




        <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="index.html"><img src="img/core-img/logo.png" alt="" height="150em" width="150em"></a>
                        </div>
                        <!-- Copywrite Text -->
                        <p class="copywrite">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved |
                              by Franko.Tech
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">


                                        <li class="nav-item"> <a class="nav-link" href="{{url('/')}}">Meals</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="{{url('/cart')}}"> Cart <span>({{ Cart::count() }})</span></a></li>

                    @if(Auth::check() && Auth::user()->usertype=='0')
                    <li class="nav-item"> <a class="nav-link" href="#"></i> Order</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#"> Profile</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('logout')}}"> logout</a></li>
                    @elseif(Auth::check() && Auth::user()->usertype=='1')
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/redirects')}}"> Control Panel</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('logout')}}"> logout</a></li>
                    @else
                    <li class="nav-item"> <a class="nav-link" href="{{ route('register') }}"></i> Register</a></li>
                         @endif           </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <script src="js/modal.js"></script>
    @livewireScripts

</body>

</html>
