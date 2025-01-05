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
    <script>$(".toggle-password").click(function () {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });</script>
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

                    <li><a href="{{url('redirects')}}">Orders</a></li>
                    <li class="active"><a href="{{ url('foods')}}">Food</a></li>
                    <li ><a href="{{ url('users') }}">Users</a></li>
                    <li><a href="{{url('logout')}}">Logout</a></li>

                </ul>
            </nav>
            <!-- Button Group -->
            <div style="margin-top: 3em;"></div>

            <!-- Social Button -->
            
        </header>
        <!-- Header Area End -->


        <div class="products-catagories-area clearfix">
            <div class="container">
            <div style="margin-top: 5em;"></div>
                <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Food</h4>
                  @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                  <form class="forms-sample" action="{{url('/updatemeal',$meal->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control form-control-lg" name="name" value="{{$meal-> name}}" placeholder="Name" aria-label="Name">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" placeholder="price" name="price" value="{{$meal-> price}}" aria-label="Price">
                  </div>
                  <div class="form-group">
                    <label>Change Food Image </label>
                    <input type="file" class="form-control form-control-sm" name="image" value="/foodimage/{{$meal->image}}" placeholder="Image" aria-label="Image">
                  </div>
                  <button type="submit"  class="btn btn- btn-dark">Update <i class="icon-paper"></i></button>
                  </form>
                </div>
              </div>
            </div> <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <div class="menu-thumb">
                  <img src="/foodimage/{{$meal->image}}" class="img-responsive" alt="">


                  </div>
              </div>
            </div>
              </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




   

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
