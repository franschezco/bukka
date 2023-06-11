<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Meal - | Shop</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>
<style>
    .hh-grayBox {
        background-color: #F8F8F8;
        margin-bottom: 20px;
        padding: 35px;
        margin-top: 20px;
    }

    .pt45 {
        padding-top: 45px;
    }

    .order-tracking {
        text-align: center;
        width: 33.33%;
        position: relative;
        display: block;
    }

    .order-tracking .is-complete {
        display: block;
        position: relative;
        border-radius: 50%;
        height: 30px;
        width: 30px;
        border: 0px solid #AFAFAF;
        background-color: #f7be16;
        margin: 0 auto;
        transition: background 0.25s linear;
        -webkit-transition: background 0.25s linear;
        z-index: 2;
    }

    .order-tracking .is-complete:after {
        display: block;
        position: absolute;
        content: '';
        height: 14px;
        width: 7px;
        top: -2px;
        bottom: 0;
        left: 5px;
        margin: auto 0;
        border: 0px solid #AFAFAF;
        border-width: 0px 2px 2px 0;
        transform: rotate(45deg);
        opacity: 0;
    }

    .order-tracking.completed .is-complete {
        border-color: #27aa80;
        border-width: 0px;
        background-color: #27aa80;
    }

    .order-tracking.completed .is-complete:after {
        border-color: #fff;
        border-width: 0px 3px 3px 0;
        width: 7px;
        left: 11px;
        opacity: 1;
    }

    .order-tracking p {
        color: #A4A4A4;
        font-size: 16px;
        margin-top: 8px;
        margin-bottom: 0;
        line-height: 20px;
    }

    .order-tracking p span {
        font-size: 14px;
    }

    .order-tracking.completed p {
        color: #000;
    }

    .order-tracking::before {
        content: '';
        display: block;
        height: 3px;
        width: calc(100% - 40px);
        background-color: #f7be16;
        top: 13px;
        position: absolute;
        left: calc(-50% + 20px);
        z-index: 0;
    }

    .order-tracking:first-child:before {
        display: none;
    }

    .order-tracking.completed:before {
        background-color: #27aa80;
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

                    <li> <a href="#"><i class="fa fa-cutlery " aria-hidden="true"></i> Meals</a></li>
                    <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-bag " aria-hidden="true"></i> Cart <span>({{ Cart::count() }})</span></a></li>

                    @if(Auth::check() && Auth::user()->usertype=='0')
                    <li class="active"><a href="{{('order')}}"><i class="fa fa-motorcycle " aria-hidden="true"></i> Order</a></li>
                    <li><a href="{{ url('profile') }}"><i class="fa fa-user " aria-hidden="true"></i> Profile</a></li>
                    <li><a href="{{url('logout')}}"><i class="fa fa-sign-out " aria-hidden="true"></i> logout</a></li>
                    @elseif(Auth::check() && Auth::user()->usertype =='1')
                    <li><a href="{{ url('/redirects')}}"><i class="fa fa-sitemap " aria-hidden="true"></i> Control Panel</a></li>
                    <li><a href="{{url('logout')}}"><i class="fa fa-sign-out " aria-hidden="true"></i> logout</a></li>
                    @else
                    <li><a href="{{ route('register') }}"><i class="fa fa-user-plus " aria-hidden="true"></i> Register</a></li>
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="{{ route('login') }}" class="btn amado-btn active">LOGIN</a>
            </div>
            @endif



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
                        <div style="margin-top: 2em;"></div>
                        <div class="row">

                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-10 hh-grayBox pt45 pb20">
                                        <div class="row justify-content-between">
                                            @foreach ($meal as $meal)
                                            @if ($meal-> status == 'ORDERED')
                                            <div class="order-tracking completed">
                                                <span class="is-complete"></span>
                                                <p>Ordered<br>
                                            </div>
                                            <div class="order-tracking">
                                                <span class="is-complete"></span>
                                                <p>Shipped<br>
                                            </div>
                                            <div class="order-tracking">
                                                <span class="is-complete"></span>
                                                <p>Delivered</p>
                                            </div>
                                        </div>
                                        @elseif($meal->status == 'SHIPPING')
                                        <div class="order-tracking completed">
                                            <span class="is-complete"></span>
                                            <p>Ordered</p>
                                        </div>
                                        <div class="order-tracking completed">
                                            <span class="is-complete"></span>
                                            <p>Shipped</p>
                                        </div>
                                        <div class="order-tracking">
                                            <span class="is-complete"></span>
                                            <p>Delivered</p>
                                        </div>
                                    </div>
                                    @elseif($meal->status == 'DELIVERED')
                                    <div class="order-tracking completed">
                                        <span class="is-complete"></span>
                                        <p>Ordered</p>
                                    </div>
                                    <div class="order-tracking completed">
                                        <span class="is-complete"></span>
                                        <p>Shipped
                                    </div>
                                    <div class="order-tracking completed">
                                        <span class="is-complete"></span>
                                        <p>Delivered</p>
                                    </div>
                                </div>
                                @endif



                                <div style="margin-top: 4em;"></div>
                                <div class="user-avatar-address">



                                    <p class="border-bottom pb-3">
                                        <span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker mr-2 text-primary "></i>{{ $meal-> address}}</span>
                                        <span class="mb-2 ml-xl-4 d-xl-inline-block d-block"><i class="fa fa-clock-o mr-2 text-danger "></i>Ordered date: {{ $meal-> created_at}} </span>
                                        <span class=" mb-2 d-xl-inline-block d-block ml-xl-4 ">STATUS: {{ $meal-> status}}
                                        </span>
                                        <span class=" mb-2 d-xl-inline-block d-block ml-xl-4"><i class="fa fa-credit-card mr-2 text-primary "></i>Amount Paid : ₦ {{ $meal-> amount}}
                                        </span> <span class=" mb-2 d-xl-inline-block d-block ml-xl-4"><i class="fa fa-truck mr-2 text-primary "></i>Type : {{ $meal-> paymenttype}}
                                        </span>
                                    </p>


                                    @endforeach
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <h6 class="text-muted">Order</h6>
                                            <ul style="text-align: center;">
                                                @foreach ($foods as $foods)
                                                <li> <span>{{$foods->qty}}</span> Plate @if($foods->qty > 1)s @else @endif <span> {{$foods->meal}} </span></li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <div style="margin-top: 4em;"></div>

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
                                        <li class="nav-item"> <a class="nav-link" href="{{ url('profile') }}"> Profile</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="{{url('logout')}}"> logout</a></li>
                                        @elseif(Auth::check() && Auth::user()->usertype=='1')
                                        <li class="nav-item"> <a class="nav-link" href="{{ url('/redirects')}}"> Control Panel</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="{{url('logout')}}"> logout</a></li>
                                        @else
                                        <li class="nav-item"> <a class="nav-link" href="{{ route('register') }}"></i> Register</a></li>
                                        @endif
                                    </ul>
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

</body>

</html>
