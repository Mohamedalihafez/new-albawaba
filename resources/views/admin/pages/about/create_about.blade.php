@extends('admin.layout.master')


<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">

@section('content')
    <!-- Main content -->
    <div class="main-wrapper">
      <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">إنشاء المعلومات الأساسية</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form method="post" enctype="multipart/form-data" action="{{ route('store_about') }}" class="ajax-form" swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}" redirect="{{ route('manage_about') }}">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">العمر</label>
                            <input type="number" name="age" class="form-control" value="{{old('age')}}" id="exampleInputEmail1"  required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">البريد الالكتروني</label>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}" id="exampleInputEmail1" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">الجوال</label>
                            <input type="tel" name="phone" class="form-control"  value="{{old('phone')}}"  id="exampleInputEmail1"  maxlength="15" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">العنوان</label>
                            <input type="text" name="address" class="form-control" id="exampleInputEmail1"  value="{{old('address')}}"  maxlength="45" >
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">اللغات</label>
                            <input type="text" name="language" value="{{old('language')}}" class="form-control" id="exampleInputEmail1"   maxlength="35" >
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">نبذة مختصرة</label>
                              <textarea maxlength="50" id="summernote" name="short_about" value="{{old('short_about')}}" required >
                               <em>اكتب</em> <u>نبذة مختصرة</u> 
                            </textarea>
                          </div>
                          
                        <!-- /.card-body -->

                        <div class="card-footer">
                          <button type="submit" class="btn btn-block btn-outline-primary col-12">حفظ  </button>
                        </div>
                      </form>
                    </div>
                    <!-- /.card -->
          </div>
            </div>
            </div>
            </section>
@endsection
@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
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
@endsection