@extends('admin.layout.master')
@section('title')
 | create Work Exprience 
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
            <h1 class="m-0">Create Work Exprience</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Create Work Exprience</li>
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
                <h3 class="card-title">Create Work Exprience</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{ route('store_work_exper') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Work Experience Name</label>
                    <input type="text" name="work_experienceName" class="form-control" value="{{old('work_experienceName')}}" id="exampleInputEmail1" placeholder="Enter Work Experience Name" maxlength="45" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 45</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Work Place/Institute Name</label>
                    <input type="text" name="work_place" class="form-control" value="{{old('work_place')}}" id="exampleInputEmail1" placeholder="Enter Work Place/Institute Name" maxlength="15" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 15</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Date From Start To End</label>
                    <input type="text" name="dateFrom_startToend" class="form-control" value="{{old('dateFrom_startToend')}}" id="exampleInputEmail1" placeholder="Enter Date From Start To End" maxlength="30" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i> <strong>Like : APRIL 2013 - FEBRUARY 2014</strong></span>
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
                  <button type="submit" class="btn btn-block btn-outline-primary">Create Work Exprience</button>
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