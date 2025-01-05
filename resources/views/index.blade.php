<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Meal - | Shop</title>

    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Toast Notification Styles -->
   
</head>

<body>
    <!-- Toast Container -->
    <div class="toast-container" id="toast-container"></div>

    <div class="main-content-wrapper d-flex clearfix">
        <!-- Mobile Nav -->
        <div class="mobile-nav">
            <div class="amado-navbar-brand">
                <a href="index.html"><img src="img/core-img/logo.png" alt="Logo"></a>
            </div>
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area -->
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
                    <li class="active"><a href="#"><i class="fa fa-cutlery " aria-hidden="true"></i> Meals</a></li>
                    <li>
                        <a href="{{url('/cart')}}">
                            <i class="fa fa-shopping-bag " aria-hidden="true"></i> Cart 
                            <span id="cart-count">(0)</span>
                        </a>
                    </li>
                    @auth
                        @if(Auth::user()->usertype=='0')
                            <li><a href="{{('order')}}"><i class="fa fa-motorcycle " aria-hidden="true"></i> Order</a></li>
                           
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

        <!-- Products Section -->
        <div class="products-catagories-area clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            @if($meal && $meal->count() > 0)
                                @foreach($meal as $mealItem)
                                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                                        <div class="single-product-wrapper">
                                            <div class="product-img">
                                                @if($mealItem->image2)
                                                    <img src="/foodimage/{{$mealItem->image2}}" style="height: 313px; width:313px" alt="">
                                                    <img class="hover-img" src="/foodimage/{{$mealItem->image2}}" alt="">
                                                @else
                                                    <img src="/foodimage/default.jpg" style="height: 313px; width:313px" alt="No Image">
                                                    <img class="hover-img" src="/foodimage/default.jpg" alt="No Image">
                                                @endif
                                            </div>
                                            <div class="product-description d-flex align-items-center justify-content-between">
                                                <div class="product-meta-data">
                                                    <p class="product-price">£ {{$mealItem->price}}</p>
                                                    <a href="#"><h6>{{$mealItem->name}}</h6></a>
                                                </div>
                                                <div class="cart">
                                                    <button class="add-to-cart-btn" data-id="{{$mealItem->id}}">
                                                        <img src="img/core-img/cart.png" alt="Add to Cart">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12 text-center">
                                    <h4>No meals available!</h4>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Toast JavaScript -->
    <script>
        function showToast(message, type = 'success') {
            const toastContainer = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.classList.add('toast', type);
            toast.innerHTML = `<span>${message}</span><span class="close-btn" onclick="this.parentElement.remove()">×</span>`;
            toastContainer.appendChild(toast);
            setTimeout(() => toast.remove(), 3000);
        }

        document.querySelectorAll('.add-to-cart-btn').forEach(button => {
            button.addEventListener('click', function () {
                fetch(`/add-to-cart/${this.dataset.id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ quantity: 1 })
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('cart-count').innerText = `(${data.count || 0})`;
                    showToast('Item added to cart!', 'success');
                })
                .catch(() => showToast('Failed to add item.', 'error'));
            });
        });
    </script>
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/active.js"></script>

</body>

</html>
