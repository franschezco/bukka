<!DOCTYPE html>
<html lang="en">

<head>
<base href="/public">
@include("admin/metalink")


</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
        <x-app-layout>

</x-app-layout>
            </div>
          </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
    @include("admin/navbar")


      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Food</h4>
                  <form class="forms-sample" action="{{url('/updatemeal',$meal->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control form-control-lg" name="title" value="{{$meal-> title}}" placeholder="Title" aria-label="Title">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" placeholder="price" name="price" value="{{$meal-> price}}" aria-label="Price">
                  </div>
                  <div class="form-group">
                    <label>Change Food Image </label>
                    <input type="file" class="form-control form-control-sm" name="image" value="/foodimage/{{$meal->image}}" placeholder="Username" aria-label="Username">
                  </div>
                  <button type="submit"  class="btn-sm btn-inverse-success btn-fw">Update <i class="icon-paper"></i></button>
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
              </div> </div>




      @include("admin/footer")
