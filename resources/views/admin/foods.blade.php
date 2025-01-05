<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Meal - Food Management</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
</head>

<style>
    hr.solid {
        border-top: 3px solid goldenrod;
    }
</style>

<body>
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Header Area -->
        <header class="header-area clearfix">
            <div class="logo">
                <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <nav class="amado-nav">
                <ul>
                    <li><a href="{{ url('/redirects') }}">Orders</a></li>
                    <li class="active"><a href="{{ url('foods') }}">Food</a></li>
                    <li><a href="{{ url('/users') }}">Users</a></li>
                    <li><a href="{{ url('logout') }}">Logout</a></li>
                </ul>
            </nav>
        </header>

        <!-- Main Content -->
        <div class="products-catagories-area clearfix">
            <div class="container">

                <!-- Flash Messages -->
                @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                @if(session('deleted'))
                <div class="alert alert-danger">
                    {{ session('deleted') }}
                </div>
                @endif

                <!-- Upload Food Form -->
                <form action="{{url('/uploadfood')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price" placeholder="Price">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <label>Hover Image</label>
                        <input type="file" class="form-control" name="image2">
                    </div>
                    <button type="submit" class="btn btn-dark">Upload Meal</button>
                </form>

                <hr class="solid">

                <!-- Food Table -->
                <div class="table-responsive py-5">
                    <table class="table table-bordered table-hover">
                        <thead class="thead bg-warning">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($meals as $meal)
                            <tr>
                                <td style="height:90px; width:90px; border-radius:50%;">
                                    <img src="/foodimage/{{$meal->image}}" alt="Meal Image">
                                </td>
                                <td>{{$meal->name}}</td>
                                <td>£ {{$meal->price}}</td>
                                <td>
                                    <a href="{{url('/deletefood', $meal->id)}}">
                                        <button type="button" class="btn-sm btn-danger">Delete <i class="fa fa-trash"></i></button>
                                    </a>
                                    <a href="{{url('/updatefood', $meal->id)}}" style="margin-left:1em;">
                                        <button type="button" class="btn-sm btn-success">Update <i class="fa fa-edit"></i></button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-4">
                    <div class="footer-logo">
                        <a href="index.html"><img src="img/core-img/logo.png" alt="Logo" height="150" width="150"></a>
                    </div>
                    <p class="copywrite">&copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | Franko.Tech</p>
                </div>
                <div class="col-12 col-lg-8">
                    <nav class="navbar navbar-expand-lg justify-content-end">
                        <ul class="navbar-nav ml-auto">
                            <li><a class="nav-link" href="{{ url('/') }}">Shop</a></li>
                            <li><a class="nav-link" href="{{ url('/redirects') }}">Orders</a></li>
                            <li><a class="nav-link" href="{{ url('foods') }}">Food</a></li>
                            <li><a class="nav-link" href="{{ url('/users') }}">Users</a></li>
                            <li><a class="nav-link" href="cart.html">Manage Payment</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>
</body>

</html>
