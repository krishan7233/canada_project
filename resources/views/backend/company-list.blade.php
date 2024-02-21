@extends('backend.master')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Company List</h1>
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

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Company List</h3>
                <a href="{{url('admin-add-company')}}"><button class="btn btn-primary float-right">ADD</button></a>

              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SR.NO.</th>
                    <th>COMPANY NAME</th>
                    <th>PHOTO</th>
                    <th>PER POLICY CLAIM</th>
                    <th>PACKAGE</th>
                    <th>VISA TYPE</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i=0;

                  ?>
                  @foreach($company_list as $company_list)
                  <tr>
                  <td>{{++$i}}</td>
                    <td><a href="{{url('admin-update-company-detail?company_id='.$company_list->id)}}">{{$company_list->company_name}}</a></td>
                    <td><img style="height:20px;" src="{{companyPhoto($company_list->id)}}" alt=""></td>
                    <td>{{policyType($company_list->id)}}</td>
                    <td><a href="{{url('admin-package-list/'.$company_list->id)}}">package list</a></td>
                    <td>{{$company_list->visa_type}}</td>
                    <td>
                    <a href="{{url('admin-edit-company/'.$company_list->id)}}"><i class="fa fa-edit"></i></a>
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