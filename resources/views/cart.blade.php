<!DOCTYPE html>
<html lang="en">

<head>
<base href="/public">
@livewireStyles
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Meal - | Cart</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
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

                    <li > <a href="{{url('/')}}"><i class="fa fa-cutlery " aria-hidden="true"></i> Meals</a></li>
                    <li class="active"><a href="{{url('/cart')}}"><i class="fa fa-shopping-bag " aria-hidden="true"></i> Cart <span>({{ Cart::count() }})</span></a></li>

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

@endif
<div style="margin-top: 4em;"></div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Meal Cart</h2>
                        </div>
                        @if (Cart::count() > 0)
                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Plates</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach(Cart::content() as $row)
                                    <tr>

                                        <td class="cart_product_desc" >
                                            <h5>{{$row->name}}</h5>
                                        </td>
                                        <td class="price">
                                            <span>₦ {{$row->price}}</span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">

                                            <div class="quantity">
                                            <form action="{{ url('/update') }}" method="POST" id="update">
                                                   <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="{{$row->qty}}">
                                                </div>
                                            </div>
                                        </td>




                                        <td >
                                        <div class="qty-btn d-flex">

                                        @csrf
<input type="hidden" name="id" value="{{$row->rowId}}">
                                        <button type="submit"  style=" color:green; background: none;border:none; padding:0; margin-right:10px;" data-toggle="tooltip" data-placement="left"
                                                    title="Update Cart"><i class="fa fa-refresh"></i></button></form>

                                        <form action="{{ url('/destroy', $row->rowId) }}" method="POST" id="destroy">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                        <button type="submit" style=" color:red; background: none;border:none; padding:0;"><i class="fa fa-trash"></i></button> </form></div></td>
</form>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else
        <div class="spacer"style="margin-top:4em;"></div>
       <center> <h3>No items in Cart!</h3></center>
        <div class="spacer"style="margin-top:2em;"></div>
        <a href="{{ url('/') }}" class="button">Continue Shopping</a>
        <div class="spacer"style="margin-top:2em;"></div>
                </div>
        @endif
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>₦ {{ Cart::subtotal() }}</span></li>
                                <li><span>delivery:</span> <span>₦ {{ Cart::tax() }}</span></li>
                                <li><span>total:</span> <span>₦ {{ Cart::total() }}</span></li>
                            </ul>
                            @if (Cart::count() > 0)
 @if (Auth::check())
                            <div class="cart-btn mt-100">
                                <a href="{{ url('checkout') }}" class="btn amado-btn w-100">Checkout</a>
                            </div>
                           @else



                            <div class="cart-btn mt-100">
                                <a href="{{ route('login') }}" class="btn amado-btn w-100">Login to CheckOut</a>
                            </div>

                            @endif
@endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->

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
                    <li class="nav-item"> <a class="nav-link" href="{{ url('profile') }}"> Profile</a></li>
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
    <!-- ##### Footer Area End ##### -->

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
    @livewireScripts
</body>

</html>
