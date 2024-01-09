@extends('admin.layout.master')
@section('title')
 | Create Reference
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
            <h1 class="m-0">Create Reference </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Create Reference</li>
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
                <h3 class="card-title">Create Reference </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{ route('store_reference') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nick Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" id="exampleInputEmail1" placeholder="Enter Nick Name" maxlength="20" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 20</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Occupation Name</label>
                    <input type="text" name="occupation" class="form-control" value="{{old('occupation')}}" id="exampleInputEmail1" placeholder="Enter Occupation  Name" maxlength="25" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 25</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" name="image" class="form-control" id="exampleInputEmail1" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max Size 150 x 150</span>
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
                  <button type="submit" class="btn btn-block btn-outline-primary">Create Reference</button>
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