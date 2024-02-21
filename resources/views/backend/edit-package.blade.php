@extends('backend.master')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Package</h1>
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
                <h3 class="card-title"> Edit Package</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="{{url('admin-package-post')}}" method="post">
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
                <label for="company_name">Start Age</label>
                <input type="hidden" class="form-control" id="package_id"  name="package_id" value="{{$package->id}}" required>
                <input type="hidden" class="form-control" id="c_id"  name="c_id" value="{{$package->c_id}}" required>
                <input type="text" class="form-control" id="start_age" placeholder="Start Age" value="{{$package->start_age}}" name="start_age" required>
                </div>
                <div class="form-group">
                <label for="end age">Start Age</label>
                <input type="text" class="form-control" id="end_age" placeholder="End Age" name="end_age" value="{{$package->end_age}}" required>
                </div>
                <div class="form-group">
                <label for="end age">Rate</label>
                <input type="text" class="form-control" id="rate" placeholder="Rate" name="rate" value="{{$package->rate}}" required>
                </div>
                <div class="form-group">
                <label for="end age">Detectible Amount</label>
                <input type="text" class="form-control" id="detectible" placeholder="Detectible Amount" name="detectible" value="{{$package->detectible}}"  required>
                </div>
                <div class="form-group">
                <label for="end age">Coverage Amount</label>
                <input type="text" class="form-control" id="coverage" placeholder="Coverage Amount" name="coverage" value="{{$package->coverage}}" required>
                </div>
                <div class="form-group">
                <label for="medical">Medical:</label>
                <select name="medical" id="" class="form-control" required>
                    <option value="">-- select medical --</option>
                    <option value="1" <?php if($package->medical==1){echo"selected";}?>>yes</option>
                    <option value="2" <?php if($package->medical==2){echo"selected";}?>>no</option>
                </select>
                </div>
                <div class="form-group">
                <label for="end age">Multiplecation Factor</label>
                <input type="text" class="form-control" id="multiplecation_factor" value="{{$package->multiplecation_factor}}" placeholder="Multiplecation Factor" name="multiplecation_factor" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
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