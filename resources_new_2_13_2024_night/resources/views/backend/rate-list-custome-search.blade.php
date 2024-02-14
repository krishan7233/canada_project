<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>visa-insurance.greenberrysignature</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{url('admin-dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin-registration-list')}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Registration List</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin-logout')}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>  
        </nav>      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
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
                <h3 class="card-title">Registration List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form>
                <div class="row">
                  <div class="col">
                    <select name="" id="" class="form-control">
                      <option value="">--select company--</option>
                      @foreach(allCompany() as $company)
                      <option value="">{{$company->company_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col">
                    <select name="" id="" class="form-control">
                      <option value="">--select type--</option>
                      <option value="1">Basic</option>
                      <option value="2">Standard</option>
                      <option value="3">Enhanched</option>
                    </select>
                  </div>
                  <div class="col">
                    <select name="" id="" class="form-control">
                      <option value="">-- select medical --</option>
                      <option value="0">Yes</option>
                      <option value="1">No</option>
                    </select>
                  </div>
                  <div class="col">
                    <input type="submit" class="btn btn-primary" value="Search">
                  </div>
                </div>
              </form></br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SR.NO.</th>
                    <th>COMPANY 
                      NAME</th>
                    <th>PHOTO</th>
                    <th>AGGREGATE 
                      PRICE</th>
                    <th>AGE</th>
                    <th>
                      EXIT
                      WITHOUT</th>
                    <th>PRICE</th>
                    <th>PLAN TYPE</th>
                    <th>FORMULA</th>
                    <th>DAY DISCOUNT</th>
                    <th>PER 
                      POLICY
                       CLAIM</th>
                    <th>DISPLAY 
                      PERMISION</th>

                    <th>ACTION</th>


                  </tr>
                  </thead>
                  <tbody>


                  @foreach($registers as $register)

                  <?php 
                  $photo = "";
                  $companyData= companyName($register->c_id);
                  if($register->plan_type==1){
                    $photo=$companyData->basic;
                  }
                  else if($register->plan_type==2){
                    $photo=$companyData->standard;
                  }else{
                    $photo=$companyData->enhanced;
                  }
                  ?>
                  <tr>
                    <td>{{$register->id}}</td>
                    <td><a href="{{url('admin-detectible-list/'.$companyData->id)}}" target="_blank">{{$companyData->company_name}}</a></td>
                    <td><img style="height:20px;" src="{{$photo}}" alt=""></td>
                    <td>{{findAggregate($register->aggregate_id)->price}}</td>
                    <td>{{findAge($register->age_id)->start_age}} - {{findAge($register->age_id)->end_age}}</td>
                    <td>{{$register->pre_exit}}</td>
                    <td>{{$register->rate}}</td>
                    <td>{{planType($register->plan_type)}}</td>
                    <td>{{$companyData->formula}}</td>
                    <td>{{$companyData->day_discount}}</td>
                    <td>{{$companyData->per_plicy_claim}}</td>
                    <td>{{$companyData->visa_type_permission}}</td>
                    
                    <td>
                    <i style="color:blue;"class="fa fa-eye"></i>
                    <i class="fa fa-edit"></i>



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
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('backend/dist/js/demo.js')}}"></script> -->
<!-- Page specific script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>


    @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
    @endif
  
  
    @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
    @endif
  
  
    @if(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
    @endif
  
  
    @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
    @endif
  
  
  </script>
<script>
  $(function () {
  // DataTable for example1 with buttons
  $('#example1').DataTable({
    "paging": true,
    "lengthChange": true,
    "lengthMenu": [10, 25, 50, 100, 500,1000,10000], // Customize the options in the dropdown
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
});
</script>
<script>
  function handleApprovalChange(selectElement) {
    var id = selectElement.dataset.registerId;
    var approval = selectElement.value;
    var url = "{{ url('admin-registration-update-status') }}";
        $.ajax({
              url: url,
              type: "POST",
              data: {
                  _token: "{{ csrf_token() }}",
                  id: id,
                  approval: approval,
              },
              success: function(response) {
                location.reload();
              },
              error: function(error) {
                  console.log(error);
                  // Handle the error here
              }
          });
  }
</script>
</body>
</html>
