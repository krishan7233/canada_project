@extends('backend.master')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Company</h1>
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
                <h3 class="card-title"> Add Company</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
              <form action="{{url('admin-company-post')}}" method="post" enctype="multipart/form-data">
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
                <div class="form-group">
                <label for="company_name">Company Name:</label>
                <input type="text" class="form-control" id="company_name" placeholder="Company Name" name="company_name" required>
                </div>
                <div class="form-group">
                <label for="per_plicy_claim">Policy:</label>
                <select name="per_plicy_claim" id="per_plicy_claim" class="form-control" required>
                    <option value="">-- select policy --</option>
                    <option value="1">per policy</option>
                    <option value="2">per claim</option>
                </select>
                </div>
                <div class="form-group">
                <label for="per_month">Per Month:</label>
                <select name="per_month" id="per_month" class="form-control" required>
                    <option value="">-- select per month --</option>
                    <option value="1">yes</option>
                    <option value="2">no</option>
                </select>
                </div>
                <div class="form-group">
                <label for="visa_type">Visa Type:</label>
                <select name="visa_type" id="" class="form-control" required>
                    <option value="">-- select visa type --</option>
                    <option value="1">All</option>
                    <option value="2">super visa</option>
                    <option value="3">visitor to canada</option>
                </select>
                </div>
                <div class="form-group">
                    <input type="file" name="photo" class="form-control" accept=".jpg, .jpeg, .png" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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
  @stop