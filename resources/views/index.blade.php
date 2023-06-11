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

                    <li class="active"> <a href="#"><i class="fa fa-cutlery " aria-hidden="true"></i> Meals</a></li>
                    <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-bag " aria-hidden="true"></i> Cart <span>({{ Cart::count() }})</span></a></li>

                    @if(Auth::check() && Auth::user()->usertype=='0')
                    <li><a href="{{('order')}}"><i class="fa fa-motorcycle " aria-hidden="true"></i> Order</a></li>
                    <li><a href="{{ url('profile') }}"><i class="fa fa-user " aria-hidden="true"></i> Profile</a></li>
                    <li><a href="{{url('logout')}}"><i class="fa fa-sign-out " aria-hidden="true"></i> logout</a></li>
                    @elseif(Auth::check() && Auth::user()->usertype=='1')
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
<div style="margin-top: 2em;"></div><center>
<div class="col-6">
@if(session('success'))
                        <div class="alert alert-success"  >
                            {{ session('success') }}
                        </div>
                        @endif
</div></center>
                        <div class="row">

                        @foreach($meal as $meal)
                            <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                                <div class="single-product-wrapper">

                                    <div class="product-img">
                                        <img src="/foodimage/{{$meal->image2}}" style="height: 313 px; width:313 px" alt="">
                                        <!-- Hover Thumb -->
                                        <img class="hover-img" src="/foodimage/{{$meal->image2}}" alt="">
                                    </div>

                                    <!-- Product Description -->
                                    <div class="product-description d-flex align-items-center justify-content-between">
                                        <!-- Product Meta Data -->
                                        <div class="product-meta-data">
                                            <div class="line"></div>
                                            <p class="product-price">₦ {{$meal->price}}</p>
                                            <a href="#">
                                                <h6>{{$meal->name}}</h6>
                                            </a>
                                        </div>
                                        <!-- Ratings & Cart -->
                                        <div class="ratings-cart text-right">
                                            <div class="ratings">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <div class="cart">
                                                <a href="{{ url('add-to-cart/'.$meal->id) }}"
                                                data-toggle="tooltip" data-placement="left"
                                                    title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!-- Pagination -->
                                <nav aria-label="navigation">
                                    <ul class="pagination justify-content-end mt-50">
                                        <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                                        <li class="page-item"><a class="page-link" href="#">02.</a></li>
                                        <li class="page-item"><a class="page-link" href="#">03.</a></li>
                                        <li class="page-item"><a class="page-link" href="#">04.</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
            <!-- ##### Main Content Wrapper End ##### -->

            <!-- ##### Newsletter Area Start ##### -->
            <section class="newsletter-area section-padding-100-0">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Newsletter Text -->
                        <div class="col-12 col-lg-6 col-xl-7">
                            <div class="newsletter-text mb-100">
                                <h2>Subscribe for a <span>25% Discount</span></h2>
                                <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate
                                    consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
                            </div>
                        </div>
                        <!-- Newsletter Form -->
                        <div class="col-12 col-lg-6 col-xl-5">
                            <div class="newsletter-form mb-100">
                                <form action="#" method="post">
                                    <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                                    <input type="submit" value="Subscribe">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ##### Newsletter Area End ##### -->

            <!-- ##### Footer Area Start ##### -->
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
                    <li class="nav-item"> <a class="nav-link"  href="{{ url('profile') }}"> Profile</a></li>
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

</body>

</html>
