@extends('admin.layout.master')
@section('css')


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
                          <h3 class="card-title">إنشاء  روابط وسائل التواصل الاجتماعي
                          </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" enctype="multipart/form-data" action="{{ route('store_socialMedia') }}" class="ajax-form" swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}" redirect="{{ route('show_socialMedia') }}">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1"> رابط فيس بوك </label>
                              <input type="text" name="facebook" class="form-control" id="exampleInputEmail1"  required>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1"> رابط تويتر</label>
                              <input type="text" name="twitter" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1"> رابط السناب شات </label>
                              <input type="text" name="google" class="form-control" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1"> رابط الإنستجرام</label>
                              <input type="text" name="intagram" class="form-control" id="exampleInputEmail1" >
                            </div>
                            
                          <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-outline-primary col-12">حفظ</button>
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