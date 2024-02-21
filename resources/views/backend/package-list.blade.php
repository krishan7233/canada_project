@extends('backend.master')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Company Wise Package List</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <?php 
              $id = request()->route('id');
              ?>  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{findCompanyName($id)}}</h3>
                <a href="{{url('admin-add-package/'.$id)}}"><button class="btn btn-primary float-right">ADD</button></a>
              </div>
              <img style="height:20px;width:10%;" src="{{companyPhoto($id)}}" alt="">

              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SR.NO.</th>
                    <th>COMPANY NAME</th>
                    <th>START AGE</th>
                    <th>END AGE</th>
                    <th>RATE</th>
                    <th>DETECTIBLE</th>
                    <th>MEDICAL</th>
                    <th>COVERAGE</th>
                    <th>MULTIPLECATION FACTOR</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i=0;

                  ?>
                  @foreach($package_list as $package)
                  <tr>
                  <td>{{++$i}}</td>
                    <td>{{findCompanyName($package->c_id)}}</td>
                    <td>{{$package->start_age}}</td>
                    <td>{{$package->end_age}}</td>
                    <td>{{$package->rate}}</td>
                    <td>{{$package->detectible}}</td>
                    <td>{{checkMedical($package->medical)}}</td>
                    <td>{{$package->coverage}}</td>
                    <td>{{$package->multiplecation_factor}}</td>
                    <td>
                     <a href="{{url('admin-edit-package?package_id='.$package->id)}}"><i class="fa fa-edit text-primary"></i>
                     <a href="{{url('admin-delete-package?package_id='.$package->id)}}"><i class='fas fa-trash-alt text-danger'></i></a>

                    </a>   
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @stop