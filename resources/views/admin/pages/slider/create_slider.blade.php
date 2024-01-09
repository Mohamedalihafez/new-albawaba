@extends('admin.layout.master')
@section('title')
 | Create Slider
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
            <h1 class="m-0">Create Slider</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Create Slider</li>
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
                <h3 class="card-title">Create Slider </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{ route('store_slider') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" name="full_name" class="form-control" value="{{old('full_name')}}" id="exampleInputEmail1" placeholder="Enter Full Name" maxlength="30" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 30</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Experience</label>
                    <input type="text" name="experience" class="form-control" value="{{old('experience')}}" id="exampleInputEmail1" placeholder="Enter Experience" maxlength="70" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 70</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" name="image" class="form-control" id="exampleInputEmail1" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Image Size 250 x 250</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slider</label>
                    <input type="file" name="slider" class="form-control" id="exampleInputEmail1" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Image Size 1350 x 600</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cv</label>
                    <input type="file" name="cv" class="form-control" id="exampleInputEmail1" required>
                  </div>
                  
                  
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-outline-primary">Create Slider</button>
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