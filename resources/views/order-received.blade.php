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
<style>.card {
    border: none
}
.totals tr td {
    font-size: 13px
}

.footer {
    background-color: #eeeeeea8
}

.footer span {
    font-size: 12px
}

.product-qty span {
    font-size: 12px;
    color: #dedbdb
}</style>
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
                    <li class="active"><a href="{{url('/cart')}}"><i class="fa fa-shopping-bag " aria-hidden="true"></i> Cart <span>({{ Cart::getContent()->count() }})</span></a></li>

                    @if(Auth::check() && Auth::user()->usertype=='0')
                    <li><a href="{{('order')}}"><i class="fa fa-motorcycle " aria-hidden="true"></i> Order</a></li>
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
<div style="margin-top: 3em;"></div>
            <!-- Social Button -->
            
        </header>





        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">

    <div class="row d-flex justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="invoice p-5">
                    <h5>Your order has been Placed!</h5> <span class="font-weight-bold d-block mt-4">Hello, {{Auth::user()->name }}</span> <span>Your  meal order has been placed and would be delivered in the next couple of hours!</span>


                    <p>You can as well track your order, Go to the order's page!</p>
                    <p class="font-weight-bold mb-0">Thanks for shopping with us!</p> <span>Meal Team</span>
                </div>
                <div class="d-flex justify-content-between footer p-3"> <span>Need Help? visit our <a href="#"> help center</a></span>  </div>
            </div>
        </div>
    </div>

            </div>
        </div>
    </div>


    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
   
</body>
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
<script>
    // Clear the cart when the page is loaded
    $(document).ready(function () {
    // Clear the cart via AJAX
    $.ajax({
        url: "{{ url('/clear-cart') }}", // Route to clear the cart
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}" // Include CSRF token for security
        },
        success: function (response) {
            if (response.status === 'success') {
                console.log('Cart cleared successfully');
            } else {
                console.log('Failed to clear cart');
            }
        },
        error: function (error) {
            console.log('Error clearing cart:', error);
        }
    });

    // Prevent going back to the previous page
    window.history.pushState(null, "", window.location.href);
    window.onpopstate = function () {
        alert('You cannot go back to the previous page!');
        window.history.pushState(null, "", window.location.href); // Push state again
    };
});

</script>
</html>
