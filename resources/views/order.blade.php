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


    .container {
        padding: 20px;
    }

    h2, h4 {
        color: #333;
        margin-bottom: 20px;
    }

    .order-card {
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Reduced shadow size */
        padding: 15px; /* Reduced padding */
        margin-bottom: 15px; /* Reduced margin */
        transition: all 0.3s ease;
    }

    .order-card:hover {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px; /* Reduced margin */
    }

    .order-header h5 {
        margin: 0;
        font-size: 16px; /* Smaller font size */
        font-weight: 600;
    }

    .status-badge {
        padding: 3px 8px; /* Smaller padding */
        border-radius: 12px; /* Smaller badge size */
        font-size: 10px; /* Smaller font size */
        font-weight: bold;
        text-transform: uppercase;
    }

    .status-received {
        background-color: #17a2b8;
        color: #ffffff;
    }

    .status-shipping {
        background-color: #ffc107;
        color: #212529;
    }

    .status-delivered {
        background-color: #28a745;
        color: #ffffff;
    }

    .order-details {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 10px; /* Reduced margin */
        font-size: 14px; /* Smaller text */
    }

    .order-details p {
        flex: 1 1 50%;
        margin: 3px 0; /* Smaller spacing */
    }

    .order-actions {
        display: flex;
        justify-content: flex-end;
    }

    .btn-outline-warning {
        padding: 5px 12px; /* Smaller button */
        border: 1px solid #ffc107;
        color: #ffc107;
        border-radius: 5px;
        font-size: 12px; /* Smaller font */
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-outline-warning:hover {
        background-color: #ffc107;
        color: #ffffff;
    }

    .no-orders {
        text-align: center;
        color: #6c757d;
        font-size: 14px;
        padding: 15px 0;
    }


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

                    <li> <a href="{{url('/redirects')}}"><i class="fa fa-cutlery " aria-hidden="true"></i> Meals</a></li>
                    <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-bag " aria-hidden="true"></i> Cart <span>({{ Cart::getContent()->count() }})</span></a></li>

                    @if(Auth::check() && Auth::user()->usertype=='0')
                    <li class="active"><a href="{{('order')}}"><i class="fa fa-motorcycle " aria-hidden="true"></i> Order</a></li>
   
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
           
        </header>
        <!-- Header Area End -->


        <div class="products-catagories-area clearfix">
        <div class="container">
    <h2>Track Orders</h2>

    <!-- Active Orders Section -->
    <h4>Active Orders</h4>
    @forelse ($mealorder as $order)
        <div class="order-card">
            <div class="order-header">
                <h5>{{ $order->meal }}</h5>
                <!-- Status Badge -->
                <span class="status-badge 
                    {{ strtolower($order->status) == 'received' ? 'status-received' : 
                    (strtolower($order->status) == 'shipping' ? 'status-shipping' : 'status-delivered') }}">
                    {{ strtoupper($order->status) }}
                </span>
            </div>

            <!-- Order Details -->
            <div class="order-details">
                <p><strong>Address:</strong> {{ $order->address }}</p>
                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}</p>
                <p><strong>Quantity:</strong> {{ $order->qty }}</p>
                <p><strong>Price:</strong> £{{ $order->price }}</p>
            </div>

            <!-- Actions -->
            <div class="order-actions">
                <form action="{{ url('order-tracking') }}" method="post">
                    @csrf
                    <input type="hidden" name="created" value="{{ $order->created_at }}">
                    <button type="submit" class="btn-outline-warning">View Details</button>
                </form>
            </div>
        </div>
    @empty
        <p class="no-orders">No active orders found.</p>
    @endforelse

    <!-- Completed Orders Section -->
    <h4>Completed Orders</h4>
    @forelse ($mealord as $completedOrder)
        <div class="order-card">
            <div class="order-header">
                <h5>{{ $completedOrder->meal }}</h5>
                <span class="status-badge status-delivered">Delivered</span>
            </div>

            <div class="order-details">
                <p><strong>Address:</strong> {{ $completedOrder->address }}</p>
                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($completedOrder->created_at)->format('Y-m-d') }}</p>
                <p><strong>Quantity:</strong> {{ $completedOrder->qty }}</p>
                <p><strong>Price:</strong> £{{ $completedOrder->price }}</p>
            </div>

            <div class="order-actions">
                <form action="{{ url('order-tracking') }}" method="post">
                    @csrf
                    <input type="hidden" name="created" value="{{ $completedOrder->created_at }}">
                    <button type="submit" class="btn-outline-warning">View Details</button>
                </form>
            </div>
        </div>
    @empty
        <p class="no-orders">No completed orders found.</p>
    @endforelse
</div>

    </div>
</div>
   <div style="margin-top: 4em;"></div>
   
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
