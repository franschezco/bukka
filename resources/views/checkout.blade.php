<!DOCTYPE html>
<html lang="en">

<head>
<base href="/public">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title  -->
    <title>Meal - Checkout</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Logo -->
            <div class="logo">
                <a href="{{ url('/') }}"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Navigation -->
            <nav class="amado-nav">
                <ul>
                    <li><a href="{{ url('/') }}"><i class="fa fa-cutlery"></i> Meals</a></li>
                    <li class="active">
                        <a href="{{ url('/cart') }}">
                            <i class="fa fa-shopping-bag"></i> Cart 
                            <span>({{ Cart::getContent()->count() }})</span>
                        </a>
                    </li>
                    @if(Auth::check())
                        @if(Auth::user()->usertype == '0')
                            <li><a href="{{ url('profile') }}"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                        @elseif(Auth::user()->usertype == '1')
                            <li><a href="{{ url('/redirects') }}"><i class="fa fa-sitemap"></i> Control Panel</a></li>
                            <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                        @endif
                    @else
                        <li><a href="{{ route('register') }}"><i class="fa fa-user-plus"></i> Register</a></li>
                    @endif
                </ul>
            </nav>
        </header>

        <!-- Cart Table Area -->
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <!-- Checkout Form -->
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">
                            <div class="cart-title">
                                <h2>Shipping Details</h2>
                            </div>

                            <!-- Checkout Form -->
                            <form id="checkout-form" method="POST" onsubmit="return validateAndSetAction();">

                                @csrf
                                <div class= "row">
                                    <!-- Full Name -->
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled required>
                                    </div>
                                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">

                                    <!-- Phone -->
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                                    </div>

                                    <!-- Location -->
                                    
                                    <div class="col-12 mb-3">
                                        <input type="text" name="location" class="form-control" placeholder="Postcode" required>
                                    </div>

                                    <!-- Address -->
                                    <div class="col-12 mb-3">
                                        <input type="text" name="address" class="form-control" placeholder="Shipping Address" required>
                                    </div>

                                    <!-- Hidden Inputs for Cart Items -->
                                    @foreach(Cart::getContent() as $row)
                                        <input type="hidden" name="meal[]" value="{{ $row->name }}">
                                        <input type="hidden" name="qty[]" value="{{ $row->quantity }}">
                                        <input type="hidden" name="price[]" value="{{ $row->price }}">
                                    @endforeach
                                </div>
                        </div>
                    </div>

                    <!-- Cart Summary -->
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>Subtotal:</span> <span>£ {{ number_format(Cart::getSubTotal(), 2) }}</span></li>
                                <li><span>Tax:</span> <span>£ {{ number_format(Cart::getCondition('tax') ?? 0, 2) }}</span></li>
                                <li><span>Total:</span> <span>£ {{ number_format(Cart::getTotal(), 2) }}</span></li>
                            </ul>

                            <!-- Payment Method -->
                            <div class="payment-method">
                                <!-- Cash on Delivery -->
                                <div class="custom-control custom-radio mr-sm-2">
                                    <input type="radio" name="payment_method" value="COD" id="cod" class="custom-control-input" required>
                                    <label class="custom-control-label" for="cod">Cash on Delivery</label>
                                </div>
                                <!-- Card Payment -->
                                <div class="custom-control custom-radio mr-sm-2">
                                    <input type="radio" name="payment_method" value="Card" id="card" class="custom-control-input" required>
                                    <label class="custom-control-label" for="card">Pay with PayPal</label>
                                </div>
                            </div>

                            <!-- Checkout Button -->
                            <div class="cart-btn mt-30">
    <button type="submit" class="btn amado-btn w-100">Checkout</button>
</div>
                        </div>
                    </div>
                    <!-- End of Cart Summary -->
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    

    <!-- JavaScript -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>

</body>
<script>
   function validateAndSetAction() {
    let form = document.getElementById('checkout-form'); // Get form
    let paymentMethod = document.querySelector('input[name="payment_method"]:checked'); // Get selected method

    // Validate payment method
    if (!paymentMethod) {
        alert('Please select a payment method.');
        return false; // Prevent form submission
    }

    // Dynamically set the action based on the selected method
    if (paymentMethod.value === 'COD') {
        form.action = "{{ url('/checkouts/cod') }}"; // COD route
    } else if (paymentMethod.value === 'Card') {
        form.action = "{{ url('/checkouts/card') }}"; // PayPal route
    }

    return true; // Allow form submission
}

</script>
</html>
