@include("admin/header")


    @include("admin/navbar")


      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

       <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Users</h4>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th> NAME </th>
                          <th> MAIL </th>
                          <th>ACTION</th>

                        </tr>
                      </thead>

                      @foreach($data as $data)
                      <tbody>
                        <tr>
                          <td>{{ $data-> name}}</td>
                          <td>{{ $data-> email}}</td>

                          @if( $data-> usertype== 0)
                          <td > <a href="{{url('/deleteuser',$data ->id)}}"><button type="button" href="" class="btn-sm btn-inverse-danger btn-fw">Delete <i class="icon-trash"></i></button></a></td>
@else
<td > <button type="button"  class="btn-sm btn-inverse-dark btn-fw">Not Allowed <i class="icon-lock"></i></button></td>
@endif
                        </tr>
@endforeach
 </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>



      @include("admin/footer")

