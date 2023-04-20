<section id="menu" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Our Menus</h2>
                              <h4>Tea Time &amp; Dining</h4>
                         </div>
                    </div>
@foreach($meal as $meal)
                    <div class="col-md-4 col-sm-6">
                         <!-- MENU THUMB -->
                         <form action="{{url('/addtocart',$meal->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="menu-thumb">
                              <a href= class="image-popup" >
                              <img src="/foodimage/{{$meal->image}}" class="img-responsive" alt="">

                                   <div class="menu-info">
                                        <div class="menu-item">
                                             <h3 style="color:white;">{{$meal->title}} </h3>
<input hidden value="1" name="quantity"/>
<input hidden value="/foodimage/{{$meal->image}}" name="image"/>
<input hidden value="{{$meal->title}}" name="title"/>
<input hidden value="{{$meal->price}}" name="price"/>




                                          <button class="btn btn-success" type="submit" style="margin-top: 10px; color:beige;"> Add to Cart</button>

                        <input type="hidden" value="1" name="quantity">
                                        </div>
                                        <div class="menu-price">
                                             <span>₦ {{$meal->price}}
                                            </span>
                                        </div>
                                   </div>
                              </a>
                         </div>
                         </form>
                    </div>

                    @endforeach
               </div>
          </div>
     </section>
