@extends('admin.layout.master')
@section('title')
 | Update Slider
@endsection
@push('css')
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/codemirror/codemirror.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/codemirror/theme/monokai.css') }}"> 
@endpush
@section('Content_header')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Slider</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Update Slider</li>
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
                <h3 class="card-title">Update Slider </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{ route('update_slider',$slider->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" name="full_name" class="form-control"
                     value="{{$slider->full_name}}" id="exampleInputEmail1"  maxlength="30" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 30</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Experience</label>
                    <input type="text" name="experience" class="form-control"
                     value="{{$slider->experience}}" id="exampleInputEmail1"  maxlength="70" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 70</span>
                  </div>
                  <div class="">
                    <h6>Old Image</h6>
                    <img src="{{asset('assets/frontend/images/profile/'.$slider->image)}}" class="img-fluid img-thumbnail" alt="img" width="150" height="150">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">New Image</label>
                    <input type="file" name="image" class="form-control" id="exampleInputEmail1" >
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Image Size 250 x 250</span>
                  </div>
                  <div class="">
                    <h6>Old Slider</h6>
                    <img src="{{asset('assets/frontend/images/slider/'.$slider->slider)}}" class="img-fluid img-thumbnail" alt="img" width="150" height="150">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">New Slider</label>
                    <input type="file" name="slider" class="form-control" id="exampleInputEmail1" >
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Image Size 1350 x 600</span>
                  </div>
                  <div class="">
                    <h6>Old CV</h6>
                    <iframe src="{{asset('assets/frontend/images/cv/'.$slider->cv)}}" frameborder="0" class="img-fluid img-thumbnail" alt="img" width="150" height="150"></iframe>    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">New Cv</label>
                    <input type="file" name="cv" class="form-control" id="exampleInputEmail1" >
                  </div>
                  
                  
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-outline-primary">Update Slider</button>
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

<!-- Summernote -->
<script src="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- CodeMirror -->
<script src="{{ asset('assets/backend/plugins/codemirror/codemirror.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/codemirror/mode/css/css.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/codemirror/mode/xml/xml.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});

$(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
@endpush