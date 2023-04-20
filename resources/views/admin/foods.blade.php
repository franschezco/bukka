@include("admin/header")


    @include("admin/navbar")


      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
        <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Upload Food Menus</h4>

                  <form class="forms-sample" action="{{url('/uploadfood')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Title</label>
                      <input type="text" class="form-control" name="title" id="exampleInputName1" placeholder="Title">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Price</label>
                      <input  class="form-control" id="exampleInputEmail3" name="price" placeholder="Price">
                    </div>

                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="file" class="form-control file-upload-info" name="image"  placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>


              </div>
              <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Template Food List</h4>
                  <p class="card-description">

                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>IMAGE</th>
                          <th>TITLE</th>
                          <th>PRICE</th>
                          <th>DELETE</th>
                          <th>UPDATE</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($meal as $meal)
                        <tr>
                          <td><img src="/foodimage/{{$meal->image}}"></td>
                          <td>{{$meal->title}}</td>
                          <td>₦ {{$meal->price}}</td>
                          <td > <a href="{{url('/deletefood',$meal->id)}}"><button type="button" href="" class="btn-sm btn-inverse-danger btn-fw">Delete <i class="icon-trash"></i></button></a></td>
                          <td > <a href="{{url('/updatefood',$meal->id)}}"><button type="button" href="" class="btn-sm btn-inverse-success btn-fw">Update <i class="icon-paper"></i></button></a></td>

                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>



      @include("admin/footer")

