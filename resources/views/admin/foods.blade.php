<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Meal - | Food</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
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

                    <li><a href="{{ url('/redirects') }}">Orders</a></li>
                    <li class="active"><a href="{{ url('foods') }}">Food</a></li>
                    <li><a href="{{ url('/users') }}">Users</a></li>
                    <li><a href="cart.html">Manage Payment</a></li>
                    <li><a href="{{ url('logout') }}">Logout</a></li>

                </ul>
            </nav>
            <!-- Button Group -->
            <div style="margin-top: 3em;"></div>

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
                        <div style="margin-top: 3em;"></div>
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
                        <div style="margin-top: 4em;"></div>
                        <form class="forms-sample" action="{{url('/uploadfood')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Price</label>
                                <input class="form-control" id="exampleInputEmail3" name="price" placeholder="Price">
                            </div>

                            <div class="form-group">
                                <label>File upload</label>

                                <div class="input-group col-xs-8">
                                    <input type="file" class="form-control file-upload-info" multiple name="image" placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-dark" type="button">Upload</button>
                                    </span>
                                </div>
                                <div style="margin-top: 1em;"></div>
                                <div class="input-group col-xs-8">
                                    <input type="file" class="form-control file-upload-info" multiple name="image2" placeholder="Hover Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-dark" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-dark mr-2">Upload Meal</button>

                        </form>
                        <div style="margin-top: 4em;"></div>
                        <hr class="solid">
                    </div><!-- modal -->

                </div>

                <div class="container table-responsive py-5">
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
                            @foreach($meal as $meal)
                            <tr>

                                <td style="height:90px; width:90px;border-radius:50%;"><img src="/foodimage/{{$meal->image}}"></td>
                                <td>{{$meal->name}}</td>
                                <td>₦ {{$meal->price}}</td>
                                <td> <a href="{{url('/deletefood',$meal->id)}}"><button type="button" href="" class="btn-sm btn-danger btn-fw">Delete <i class="fa fa-trash"></i></button></a> <span style="margin-left:1em"></span> <a href="{{url('/updatefood',$meal->id)}}"><button type="button" href="" class="btn-sm btn-success btn-fw">Update <i class="fa fa-edit"></i></button></a></td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



                <!-- Single Product Area -->

            </div>
        </div>
    </div>
    </div>
    </div>



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
                                      <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/') }}">Shop</a>
                                        </li>
                                        <li  class="nav-item"><a class="nav-link" href="{{ url('/redirects') }}">Orders</a></li>
                                        <li  class="nav-item"><a class="nav-link" href="{{ url('foods') }}">Food</a></li>
                                        <li  class="nav-item"><a class="nav-link" href="{{ url('/users') }}">Users</a></li>
                                        <li  class="nav-item"><a class="nav-link" href="cart.html">Manage Payment</a></li>
                                    </ul>
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
    <script src="js/modal.js"></script>

</body>

</html>
