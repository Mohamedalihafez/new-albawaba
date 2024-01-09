@extends('admin.layout.master')
@section('title')
 | Update About
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
            <h1 class="m-0">Update About</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Update About</li>
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
                <h3 class="card-title">Update Basic Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{ route('update_about', $about->id) }}" method="get" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">AGE</label>
                    <input type="number" name="age" class="form-control" value="{{old('age', $about->age)}}" id="exampleInputEmail1" placeholder="Enter Age" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">EMAIL</label>
                    <input type="email" name="email" class="form-control" value="{{old('email', $about->email)}}" id="exampleInputEmail1" placeholder="Enter Email" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">PHONE</label>
                    <input type="tel" name="phone" class="form-control"  value="{{old('phone',$about->phone)}}"  id="exampleInputEmail1" placeholder="Enter Phone Number" maxlength="15" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">ADDRESS</label>
                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter Address" value="{{old('address',$about->address)}}"  maxlength="45" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 45</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">LANGUAGE</label>
                    <input type="text" name="language" value="{{old('language',$about->language)}}" class="form-control" id="exampleInputEmail1" placeholder="Enter language"  maxlength="35" required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 35</span>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Short About</label>
                      <textarea id="summernote" name="short_about" value="{{old('short_about')}}" maxlength="500" required>
                      {{old('short_about',$about->short_about)}}
                     </textarea>
                      <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 500</span>
                  </div>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-outline-primary">Update About</button>
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