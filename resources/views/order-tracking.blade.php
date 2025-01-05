@include("admin.sidebar")

<div class="products-catagories-area clearfix">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <div style="margin-top: 2em;"></div>
                        <div class="row">

                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-10 hh-grayBox pt45 pb20">
                                        <div class="row justify-content-between">
                                            @foreach ($meal as $meal)
                                            @if ($meal-> status == 'ORDERED')
                                            <div class="order-tracking completed">
                                                <span class="is-complete"></span>
                                                <p>Ordered<br>
                                            </div>
                                            <div class="order-tracking">
                                                <span class="is-complete"></span>
                                                <p>Shipped<br>
                                            </div>
                                            <div class="order-tracking">
                                                <span class="is-complete"></span>
                                                <p>Delivered</p>
                                            </div>
                                        </div>
                                        @elseif($meal->status == 'SHIPPING')
                                        <div class="order-tracking completed">
                                            <span class="is-complete"></span>
                                            <p>Ordered</p>
                                        </div>
                                        <div class="order-tracking completed">
                                            <span class="is-complete"></span>
                                            <p>Shipped</p>
                                        </div>
                                        <div class="order-tracking">
                                            <span class="is-complete"></span>
                                            <p>Delivered</p>
                                        </div>
                                    </div>
                                    @elseif($meal->status == 'DELIVERED')
                                    <div class="order-tracking completed">
                                        <span class="is-complete"></span>
                                        <p>Ordered</p>
                                    </div>
                                    <div class="order-tracking completed">
                                        <span class="is-complete"></span>
                                        <p>Shipped
                                    </div>
                                    <div class="order-tracking completed">
                                        <span class="is-complete"></span>
                                        <p>Delivered</p>
                                    </div>
                                </div>
                                @endif



                                <div style="margin-top: 4em;"></div>
                                <div class="user-avatar-address">



                                    <p class="border-bottom pb-3">
                                        <span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker mr-2 text-primary "></i>{{ $meal-> address}}</span>
                                        <span class="mb-2 ml-xl-4 d-xl-inline-block d-block"><i class="fa fa-clock-o mr-2 text-danger "></i>Ordered date: {{ $meal-> created_at}} </span>
                                        <span class=" mb-2 d-xl-inline-block d-block ml-xl-4 ">STATUS: {{ $meal-> status}}
                                        </span>
                                        <span class=" mb-2 d-xl-inline-block d-block ml-xl-4"><i class="fa fa-credit-card mr-2 text-primary "></i>Amount Paid : £ {{ $meal-> price}}
                                        </span> <span class=" mb-2 d-xl-inline-block d-block ml-xl-4"><i class="fa fa-truck mr-2 text-primary "></i>Type : {{ $meal-> paymenttype}}
                                        </span>
                                    </p>


                                    @endforeach
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <h6 class="text-muted">Order</h6>
                                            <ul style="text-align: center;">
                                                @foreach ($foods as $foods)
                                                <li> <span>{{$foods->qty}}</span> Plate @if($foods->qty > 1)s @else @endif <span> {{$foods->meal}} </span></li>
                                                @endforeach

                                            </ul>
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
    </div>
    </div>
    </div>

    <div style="margin-top: 4em;"></div>

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
