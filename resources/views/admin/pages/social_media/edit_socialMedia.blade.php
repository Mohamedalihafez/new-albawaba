@extends('admin.layout.master')




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
                      <h3 class="card-title">ؤوابط التواصل الاجتماعي</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" enctype="multipart/form-data"  action="{{ route('update_socialMedia', $social_media->id) }}" class="ajax-form" swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}" redirect="{{ route('show_socialMedia') }}">
                      @method('put')
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">رابط Facebook </label>
                          <input type="text" name="facebook" class="form-control" id="exampleInputEmail1" value="{{ $social_media->facebook }}" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1"> رابط Twitter </label>
                          <input type="text" name="twitter" class="form-control" id="exampleInputEmail1" value="{{ $social_media->twitter }}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">رابط Snapchat  </label>
                          <input type="text" name="google" class="form-control" id="exampleInputEmail1" value="{{ $social_media->google }}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">رابط Instagram </label>
                          <input type="text" name="intagram" class="form-control" id="exampleInputEmail1" value="{{ $social_media->intagram }}">
                        </div>
                        
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-outline-primary col-12">حقظ</button>
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
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endpush