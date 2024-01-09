@extends('admin.layout.master')
@section('title')
 | Create Education 
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
            <h1 class="m-0">Create Education </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Create Education</li>
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
                <h3 class="card-title">Create Education </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{ route('store_education') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Group / Department Name </label>
                    <input type="text" name="group" class="form-control" value="{{old('group')}}" id="exampleInputEmail1" placeholder="Enter Group / Department Name" maxlength="50" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 50</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Education Institute Name</label>
                    <input type="text" name="institute_name" class="form-control" value="{{old('institute_name')}}" id="exampleInputEmail1" placeholder="Enter Education Institute  Name" maxlength="60" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 60</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Session</label>
                    <input type="text" name="session" class="form-control" value="{{old('session')}}" id="exampleInputEmail1" placeholder="Enter Session" maxlength="20" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 20 <strong>Like : 2013 - 2015</strong></span>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Name of Examination</label>
                    <input type="text" name="name_of_examination" class="form-control" value="{{old('name_of_examination')}}" id="exampleInputEmail1" placeholder="Enter Name of Examination" maxlength="25" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 25</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Short Description </label>
                      <textarea id="summernote" name="short_description" value="{{old('short_description')}}" maxlength="450" required>
                      Place <em>Enter</em> <u>Short Description</u> 
                     </textarea>
                      <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 450</span>
                  </div>
                  
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-outline-primary">Create Education</button>
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