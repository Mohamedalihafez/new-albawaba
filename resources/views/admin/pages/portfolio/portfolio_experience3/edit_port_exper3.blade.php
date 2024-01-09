@extends('admin.layout.master')
@section('title')
 | Update portfolio experience3
@endsection

@section('Content_header')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Portfolio Experience3</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Update Portfolio Experience3</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Portfolio Experience3</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{ route('update_port_exp3',$port_exper3->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Project Name</label>
                    <input type="text"  name="project_name" class="form-control" id="exampleInputEmail1" value="{{ $port_exper3->project_name }}" maxlength="60" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 60</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Experience Name</label>
                    <input type="text" name="experience_name" class="form-control" id="exampleInputEmail1" value="{{ $port_exper3->experience_name }}" maxlength="35" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 35</span>
                  </div>
                   <div class="">
                    <h6>old Picture</h6>
                    <img src="{{asset('assets/frontend/images/Portfolio/port_exper3/'. $port_exper3->picture)}}" class="img-fluid img-thumbnail" alt="img" width="200" height="200">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">New Picture</label>
                    <input type="file" value="{{ $port_exper3->picture }}" name="picture" class="form-control" id="exampleInputEmail1" >
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-outline-primary">Update Portfolio Experience3</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
   </div>
    </div>
    </div>
    </section>
@endsection
@push('js')
<!-- bs-custom-file-input -->

<script src="{{ asset('assets/backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endpush