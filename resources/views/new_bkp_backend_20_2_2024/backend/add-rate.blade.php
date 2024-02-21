<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

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
                <h3 class="card-title">Add Rate</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="{{url('admmin-add-rate-post')}}" method="post" class="p-3">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            <div class="row">
                
                <div class="col-sm-6">
                <div class="form-group">
                    <label for="email">Company Name:</label>
                    <select name="company_id" id="" class="form-control company" required>
                        <option value="">--select company--</option>
                        @foreach(allCompany() as $company)
                        <option value="{{$company->id}}" <?php if(request('company_id')==$company->id){echo"selected";}?>>{{$company->company_name}}</option>
                        @endforeach
                    </select>
                    <!-- <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"> -->
                    </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                    <label for="Aggregate">Aggregate Price:</label>
                    <select name="aggregate_price" id="" class="form-control aggregate_price" required>
                    </select>
                    </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                    <label for="Age">Age:</label>
                    <select name="age" id="" class="form-control age_group age_change" required>
                    </select>
                    </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                    <label for="Medical">Medical:</label>
                    <select name="medical" id="" class="form-control medical" required>
                        <option value="">--select medical--</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                    <label for="Plan Type">Plan Type:</label>
                    <select name="plan_type" id="" class="form-control" required>
                        <option value="">-- select plan type --</option>
                        <option value="1" selected >Basic</option>
                        <option value="2">Standard</option>
                        <option value="3">Enhanced</option>
                    </select>
                    </div>
                </div>
                <!-- <div class="col-sm-6">
                <div class="form-group">
                    <label for="Age">Detectible Amount:</label>
                    <select name="detectible_amt" id="" class="form-control detectible_amt">
                    </select>
                    </div>
                </div> -->
                <div class="col-sm-6">
                <div class="form-group">
                    <label for="Age">Day Rate:</label>
                    <input type="text" class="form-control" name="rate" placeholder="Day Rate" required>
                    </div>
                </div>
                <!-- <div class="col-sm-6">
                <div class="form-group">
                    <label for="Age">Extra Price :</label>
                    <input type="text" class="form-control" name="extra_price" placeholder="Extra Price" required>
                    </div>
                </div> -->
            </div>    
 
            <button type="submit" class="btn btn-primary">Add Price</button>
        </form>
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
  $(document).ready(function() {
    $(".company").change(function() {
        var company = $('.company').val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type: 'POST',
          url: 'admin-rate-price-post',  // Replace with your controller URL
          data: {
            company: company,
          },
          headers: {
            'X-CSRF-TOKEN': csrfToken
          },
          success: function(response) {
            var price = response.price;
            var age = response.age;

            // console.log(price);
            $('.aggregate_price').html(price);
            $('.age_group').html(age);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            // console.error('AJAX request failed:', textStatus, errorThrown);
          }
        });
    });
    // $(".age_change,.medical").change(function(){
    //   var age_id = $('.age_group').val();
    //   var company = $('.company').val();
    //   var csrfToken = $('meta[name="csrf-token"]').attr('content');
    //     $.ajax({
    //       type: 'POST',
    //       url: 'admin-get-detectible',  // Replace with your controller URL
    //       data: {
    //         age_id: age_id,
    //         company: company,
    //       },
    //       headers: {
    //         'X-CSRF-TOKEN': csrfToken
    //       },
    //       success: function(response) {

    //         $('.detectible_amt').html(response);
    //       },
    //       error: function(jqXHR, textStatus, errorThrown) {
    //         // console.error('AJAX request failed:', textStatus, errorThrown);
    //       }
    //     });
    // });
});

</script>
</body>
</html>
