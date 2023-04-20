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

                  <form class="forms-sample" action="{{url('/uploadchefs')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Full Name</label>
                      <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Description</label>
                      <input  class="form-control" id="exampleInputEmail3" name="description" placeholder="description">
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
                          <th>NAME</th>
                          <th>DESCRIPTION</th>
                          <th>DELETE</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($cooks as $cooks)
                        <tr>
                          <td><img src="/chefimage/{{$cooks->image}}"></td>
                          <td>{{$cooks->name}}</td>
                          <td>{{$cooks->description}}</td>
                          <td > <a href="{{url('/deletechef',$cooks->id)}}"><button type="button" href="" class="btn-sm btn-inverse-danger btn-fw">Delete <i class="icon-trash"></i></button></a></td>

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
