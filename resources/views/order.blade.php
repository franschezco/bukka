<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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
    .text-center {
        text-align: center;
    }

    .card-img-top {
        width: 100%;
    }

    /*Call to Action*/

    .header-line {
        height: 5px;
        width: 100%;
        content: '';
        display: block;
    }

    .gradient-color-1 {
        background: -webkit-linear-gradient(left, #fc636b 0, #ff6d92 60%, #fd9a00 100%);
        background: linear-gradient(to right, #fc636b 0, #ff6d92 60%, #fd9a00 100%);
    }

    .gradient-color-2 {
        background: #3be8b0;
        background: -webkit-linear-gradient(bottom left, #3be8b0 0, #02ceff 100%);
        background: linear-gradient(to top right, #3be8b0 0, #02ceff 100%);
    }

    /**/
    /*Utility Class*/
    .text-white {
        color: white;
    }

    .no-margin {
        margin: 0;
    }

    .no-margin-top {
        margin-top: 0;
    }

    .pad-right {
        margin-right: 0.5em;
    }

    .container--tabs {
        list-style: none;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: stretch;
    }

    .container--tabs .tab {
        min-height: 2em;
        padding: 1em;
        box-sizing: border-box;
        width: 100%;
        text-align: center;
        cursor: pointer;
        background-color: black;
        color: white;
        transition: background-color 0.25s;
    }

    .container--tabs .tab:hover {
        background-color: rgba(0, 0, 0, 0.25);
        transition: background-color 0.25s;
        color: white;
    }

    .container--tabs .tabs--active {
        background-color: #fff;
        color: black;
        pointer-events: none;
    }

    .content {
        display: none;
        padding: 3em;
        text-align: center;
    }

    .content--active {
        display: block;
    }

    h1 {
        margin-bottom: 0.5em;
        font-weight: 700;
    }

    p {
        font-weight: 300;
    }
    .ribbon {
  position: absolute;
  right: -5px;
  top: -5px;
  z-index: 1;
  overflow: hidden;
  width: 93px;
  height: 93px;
  text-align: right;
}
.ribbon span {
  font-size: 0.8rem;
  color: #fff;
  text-transform: uppercase;
  text-align: center;
  font-weight: bold;
  line-height: 32px;
  transform: rotate(45deg);
  width: 125px;
  display: block;
  background: #79a70a;
  background: linear-gradient(#9bc90d 0%, #79a70a 100%);
  box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
  position: absolute;
  top: 17px;
  right: -29px;
}

.ribbon span::before {
   content: '';
   position: absolute;
   left: 0px; top: 100%;
   z-index: -1;
   border-left: 3px solid #79A70A;
   border-right: 3px solid transparent;
   border-bottom: 3px solid transparent;
   border-top: 3px solid #79A70A;
}
.ribbon span::after {
   content: '';
   position: absolute;
   right: 0%; top: 100%;
   z-index: -1;
   border-right: 3px solid #79A70A;
   border-left: 3px solid transparent;
   border-bottom: 3px solid transparent;
   border-top: 3px solid #79A70A;
}

.red span {
  background: linear-gradient(#f70505 0%, #8f0808 100%);
}
.red span::before {
  border-left-color: #8f0808;
  border-top-color: #8f0808;
}
.red span::after {
  border-right-color: #8f0808;
  border-top-color: #8f0808;
}

.blue span {
  background: linear-gradient(#2989d8 0%, #1e5799 100%);
}
.blue span::before {
  border-left-color: #1e5799;
  border-top-color: #1e5799;
}
.blue span::after {
  border-right-color: #1e5799;
  border-top-color: #1e5799;
}

.foo {
  clear: both;
}

.bar {
  content: "";
  left: 0px;
  top: 100%;
  z-index: -1;
  border-left: 3px solid #79a70a;
  border-right: 3px solid transparent;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #79a70a;
}

.baz {
  font-size: 1rem;
  color: #fff;
  text-transform: uppercase;
  text-align: center;
  font-weight: bold;
  line-height: 2em;
  transform: rotate(45deg);
  width: 100px;
  display: block;
  background: #79a70a;
  background: linear-gradient(#9bc90d 0%, #79a70a 100%);
  box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
  position: absolute;
  top: 100px;
  left: 1000px;
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

                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <div class="cart-title mt-50">
                                    <h2> Track Order </h2>
                                </div>

                                <div class="container">
                                    <ul class="container--tabs">
                                        <li class="tab tabs--active">Orders</li>
                                        <li class="tab">Completed Orders</li>
                                    </ul>

                                    <div class="container-content">
                                        <div class="content content--active">

                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                                    @foreach ($mealorder as $mealorder)


                                                    <div class="card influencer-profile-data">
                                                        <div class="user-avatar-info">

                                                            <div class="m-b-20">
                                                            <div style="margin-top: 2em;"></div>

                                                            </div>

                                                            <!--  <div class="float-right"><a href="#" class="user-avatar-email text-secondary">www.henrybarbara.com</a></div> -->
                                                            <div class="user-avatar-address">
                                                                 <div class="ribbon blue"><span>{{ $mealorder -> status }}</span></div>
                                                                <p class="border-bottom pb-3">
                                                                    <span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker mr-2 text-primary "></i> {{ $mealorder -> address }}</span><p></p>
                                                                    <span class="mb-2 ml-xl-4 d-xl-inline-block d-block"><i class="fa fa-clock-o mr-2 text-danger "></i>Ordered date: {{ $mealorder -> created_at }} </span>
                                                                    <span class=" mb-2 d-xl-inline-block d-block ml-xl-4">
                                                                    </span>
                                                                    <form action="{{url('order-tracking')}}" method="post">
                                                                        @csrf
                                                                        <input type="hidden" value="{{ $mealorder -> created_at }}" name="created">

                                                                    <button type="submit" class="btn btn-outline-warning">View Details</button>
                                                                    </form>
                                                                </p>

                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div style="margin-top: 4em;"></div>@endforeach
                                                </div>
                                                <div style="margin-top: 2em;"></div>

                                            </div>

                                        </div>

                                    </div>
                                    <div class="content">

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

@foreach ($mealord as $mealord)


<div class="card influencer-profile-data">
    <div class="user-avatar-info">
        <div class="m-b-20">
        <div style="margin-top: 2em;"></div>

        </div>
        <!--  <div class="float-right"><a href="#" class="user-avatar-email text-secondary">www.henrybarbara.com</a></div> -->
        <div class="user-avatar-address">
        <div class="ribbon"><span>{{ $mealord -> status }}</span></div>
            <p class="border-bottom pb-3">
                <span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker mr-2 text-primary "></i> {{ $mealord -> address }}</span><p></p>
                <span class="mb-2 ml-xl-4 d-xl-inline-block d-block"><i class="fa fa-clock-o mr-2 text-danger "></i>Ordered date: {{ $mealord -> created_at }} </span>
                <span class=" mb-2 d-xl-inline-block d-block ml-xl-4">
                </span>
                <form action="{{url('order-tracking')}}" method="post">
                                                                        @csrf
                                                                        <input type="hidden" value="{{ $mealord -> created_at }}" name="created">

                                                                    <button type="submit" class="btn btn-outline-warning">View Details</button>
                                                                    </form></p>

        </div>


    </div>
</div>
<div style="margin-top: 4em;"></div>@endforeach
</div>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 2em;"></div>

                            <div class="row">

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
    <script>
        const tabs = document.querySelectorAll(".tab");
        const contents = document.querySelectorAll(".content");

        for (let i = 0; i < tabs.length; i++) {
            tabs[i].addEventListener("click", () => {
                for (let j = 0; j < contents.length; j++) {
                    contents[j].classList.remove("content--active");
                }
                for (let jj = 0; jj < tabs.length; jj++) {
                    tabs[jj].classList.remove("tabs--active");
                }
                contents[i].classList.add("content--active");
                tabs[i].classList.add("tabs--active");
            });
        }
    </script>
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
