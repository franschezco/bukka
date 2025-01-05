<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Meal - | Users</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

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
                    <li><a href="{{ url('foods')}}">Food</a></li>
                    <li class="active"><a href="{{ url('users') }}">Users</a></li>
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

                <div class="row">
                    <div class="col-12">


                        <div class="container table-responsive py-5">
                            <table class="table table-bordered table-hover">
                                <thead class="thead bg-warning">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                @foreach($data as $data)
                                <tbody>
                                    <tr>
                                        <td>{{ $data-> id}}</td>
                                        <td>{{ $data-> name}}</td>
                                        <td>{{ $data-> email}}</td>

                                        @if( $data-> usertype== 0)
                                        <td> <a href="{{url('/deleteuser',$data ->id)}}"><button type="button" href="" class="btn-sm btn-danger btn-fw">Delete <i class="fa fa-trash"></i></button></a></td>
                                        @else
                                        <td> <button type="button" class="btn-sm btn-dark btn-fw">Not Allowed <i class="fa fa-lock"></i></button></td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    </tr>


                                    </tr>
                                </tbody>
                            </table>
                        </div>



                        <!-- Single Product Area -->

                    </div>
                </div>
            </div>
        </div>
    </div>



    @include("admin.footer")
