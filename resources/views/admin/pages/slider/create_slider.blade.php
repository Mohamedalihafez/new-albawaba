@extends('admin.layout.master')
@section('title')
 | ملفك الشخصي
@endsection
@push('css')
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/codemirror/codemirror.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/codemirror/theme/monokai.css') }}"> 
@endpush

@section('content')
    <!-- Main content -->
    <div class="main-wrapper">
      <!-- Page Wrapper -->
      <div class="page-wrapper">
          <div class="content container-fluid">
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">الملف الشخصي </h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form method="post" enctype="multipart/form-data" action="{{ route('store_slider') }}" class="ajax-form" swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}" redirect="{{ route('manage_slider') }}">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">الاسم بالكامل</label>
                            <input type="text" name="full_name" class="form-control" value="{{old('full_name')}}" id="exampleInputEmail1" placeholder="" maxlength="30" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">المهنه</label>
                            <input type="text" name="experience" class="form-control" value="{{old('experience')}}" id="exampleInputEmail1" placeholder"" maxlength="70" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">صورتك الشخصيه</label>
                            <input type="file" name="image" class="form-control dropify" id="exampleInputEmail1" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">صورة الغلاف </label>
                            <input type="file" name="slider" class="form-control dropify" id="exampleInputEmail1" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">ملف أعمالك (CV) </label>
                            <input type="file" name="cv" class="form-control dropify" id="exampleInputEmail1" >
                          </div>
                          
                        <div class="card-footer ">
                          <button type="submit" class= " col-12 btn btn-block btn-outline-primary">حفظ </button>
                        </div>
                      </form>
                    </div>
                    <!-- /.card -->
                </div>
              </div>
            </div>
          </section>
          </div>
      </div>
    </div>
          
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