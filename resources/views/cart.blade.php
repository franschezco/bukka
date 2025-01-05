<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">

    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title  -->
    <title>Meal - | Cart</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom Styles for Buttons -->
    <style>
      /* Container for quantity buttons and delete icon */
.quantity-container {
    display: flex;             /* Use flexbox for alignment */
    align-items: center;       /* Vertically align content */
    justify-content: space-between; /* Add space between elements */
    gap: 10px;                 /* Add spacing between buttons */
    flex-wrap: nowrap;         /* Prevent wrapping */
}

/* Quantity buttons */
.quantity {
    display: flex;
    align-items: center;
    gap: 5px;
}

.quantity button {
    padding: 5px 10px;
    font-size: 18px;
    cursor: pointer;
    border: 1px solid #ddd;
    background-color: #f8f8f8;
}

.quantity button:hover {
    background-color: #e0e0e0;
}

/* Input field for quantity */
.qty-text {
    text-align: center;
    width: 50px;
    height: 35px;
    border: 1px solid #ddd;
    background-color: #f8f8f8;
}

/* Delete button (Trash icon) */
.delete-btn {
    font-size: 18px;         /* Set size of the icon */
    color: red;              /* Set color to red */
    cursor: pointer;         /* Make it clickable */
    background: none;        /* No background */
    border: none;            /* Remove borders */
    display: flex;           /* Align content */
    align-items: center;
    justify-content: center;
    padding: 5px;            /* Add padding for touch targets */
}

/* Adjust layout on small screens */
@media (max-width: 768px) {
    .quantity-container {
        flex-direction: row; /* Keep row layout for smaller screens */
        gap: 5px;            /* Adjust spacing */
    }

    .delete-btn {
        font-size: 20px;     /* Slightly increase size for touch targets */
        padding: 8px;        /* Add padding for easier clicking */
    }

    .quantity button {
        padding: 8px 12px;   /* Increase button size slightly */
        font-size: 16px;     /* Adjust font size */
    }

    .qty-text {
        width: 40px;         /* Make input field narrower */
        height: 30px;        /* Adjust height */
    }
}

    </style>
</head>

<body>
    <!-- Main Content Wrapper Start -->
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
                <a href="index.html"><img src="img/core-img/logo.png" alt="Logo"></a>
            </div>
            <nav class="amado-nav">
                <ul>
                    <li><a href="{{url('/')}}"><i class="fa fa-cutlery "></i> Meals</a></li>
                    <li class="active"><a href="{{url('/cart')}}"><i class="fa fa-shopping-bag"></i> Cart <span>({{ \Cart::getContent()->count() }})</span></a></li>
                    @if(Auth::check() && Auth::user()->usertype=='0')
                        <li><a href="{{('order')}}"><i class="fa fa-motorcycle"></i> Order</a></li>
                        <li><a href="{{url('logout')}}"><i class="fa fa-sign-out"></i> logout</a></li>
                    @elseif(Auth::check() && Auth::user()->usertype=='1')
                        <li><a href="{{ url('/redirects')}}"><i class="fa fa-sitemap"></i> Control Panel</a></li>
                        <li><a href="{{url('logout')}}"><i class="fa fa-sign-out"></i> logout</a></li>
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
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Meal Cart</h2>
                        </div>
                        @if (\Cart::getContent()->count() > 0)
                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Plates</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach(\Cart::getContent() as $row)
                                    <tr>
                                        <td><h5>{{$row->name}}</h5></td>
                                        <td><span>£ {{$row->price}}</span></td>
                                        <td>
    <div class="quantity-container">
        <!-- Update Form -->
        <form action="{{ url('/update') }}" method="POST" id="update-{{$row->id}}">
            @csrf
            <input type="hidden" name="id" value="{{$row->id}}">
            <input type="hidden" name="quantity" id="hidden-qty-{{$row->id}}" value="{{$row->quantity}}">
            <div class="quantity">
                <button type="button" class="qty-minus" data-id="{{$row->id}}">-</button>
                <input type="number" id="qty-{{$row->id}}" value="{{$row->quantity}}" disabled class="qty-text">
                <button type="button" class="qty-plus" data-id="{{$row->id}}">+</button>
            </div>
        </form>

        <!-- Delete Button -->
        <form action="{{ url('/destroy/' . $row->id) }}" method="POST" id="delete-form-{{$row->id}}">
            @csrf
            @method('DELETE')
            <button type="submit" id="delete-btn-{{$row->id}}" class="delete-btn" style="display: {{ $row->quantity == 1 ? 'inline-block' : 'none' }};">
                <i class="fa fa-trash"></i>
            </button>
        </form>
    </div>
</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <center><h3>No items in Cart!</h3></center>
                        @endif
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span id="subtotal">£ {{ \Cart::getSubTotal() }}</span></li>
                                <li><span>delivery:</span> <span id="delivery">£ {{ \Cart::getConditions()->sum('value') }}</span></li>
                                <li><span>total:</span> <span id="total">£ {{ \Cart::getTotal() }}</span></li>
                            </ul>
                            
                            @if (\Cart::getContent()->count() > 0)
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

    <!-- Scripts -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/active.js"></script>
 <!-- JavaScript for Quantity and Totals -->
    <script>
  

  document.addEventListener('DOMContentLoaded', function () {
    // Event Listener for Plus and Minus Buttons
    document.querySelectorAll('.qty-plus, .qty-minus').forEach(button => {
        button.addEventListener('click', async function () {
            // Get required data attributes and elements
            const id = this.getAttribute('data-id');
            const inputField = document.getElementById(`qty-${id}`);
            const hiddenInput = document.getElementById(`hidden-qty-${id}`);
            const form = document.getElementById(`update-${id}`);
            const deleteBtn = document.getElementById(`delete-btn-${id}`); // Bin icon
            let value = parseInt(inputField.value);

            // Update quantity based on button clicked (+ or -)
            value = this.classList.contains('qty-plus') ? value + 1 : value - 1;

            // Ensure value is within a valid range
            if (value > 0 && value <= 300) {
                // Update visible and hidden fields
                inputField.value = value;
                hiddenInput.value = value;

                // Show bin icon only when quantity is 1
                deleteBtn.style.display = value === 1 ? 'inline-block' : 'none';

                try {
                    // Prepare form data for submission
                    const formData = new FormData(form);

                    // Send an AJAX request to update the cart
                    const response = await fetch("/update-cart", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        },
                        body: formData,
                    });

                    // Parse the response as JSON
                    const data = await response.json();

                    // Update totals dynamically if successful
                    if (data.success) {
                        document.getElementById('subtotal').innerText = `£ ${data.subtotal}`;
                        document.getElementById('delivery').innerText = `£ ${data.delivery}`;
                        document.getElementById('total').innerText = `£ ${data.total}`;
                    } else {
                        alert('Failed to update totals: ' + data.error);
                    }
                } catch (error) {
                    console.error('Error updating totals:', error);
                }
            }
        });
    });

    // Delete button action
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            if (confirm('Are you sure you want to remove this item?')) {
                // Redirect to delete route or perform AJAX request for deletion
                window.location.href = `/destroy/${id}`;
            }
        });
    });
});



    </script>
</body>
</html>
