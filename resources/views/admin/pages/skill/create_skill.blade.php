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
                            <h3 class="card-title">انشأ مهاراتك</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form method="post" enctype="multipart/form-data" action="{{ route('store_skill') }}" class="ajax-form" swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}" redirect="{{ route('manage_skill') }}">
                            @csrf
                            <div class="row">
                              <div class="card-body col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">مهاره1</label>
                                <input type="text" name="skill_1" class="form-control" id="exampleInputEmail1"  value="{{old('skill_1')}}"  maxlength="25" max >
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">مهاره2</label>
                                <input type="text" name="skill_2" class="form-control" id="exampleInputEmail1" text="Enter Skill_2" value="{{old('skill_2')}}"  maxlength="25" max >
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">مهاره3</label>
                                <input type="text" name="skill_3" class="form-control" id="exampleInputEmail1" text="Enter Skill_3" value="{{old('skill_3')}}"  maxlength="25" max >
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">مهاره4</label>
                                <input type="text" name="skill_4" class="form-control" id="exampleInputEmail1" text="Enter Skill_4" value="{{old('skill_4')}}"  maxlength="25" max >
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">مهاره5</label>
                                <input type="text" name="skill_5" class="form-control" id="exampleInputEmail1" text="Enter Skill_5" value="{{old('skill_5')}}"  maxlength="25" max >
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">مهاره6</label>
                                <input type="text" name="skill_6" class="form-control" id="exampleInputEmail1" text="Enter Skill_6" value="{{old('skill_6')}}"  maxlength="25" max >
                              </div>

                            
                            </div>
                            <div class="card-body col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">نسبه مهاره1_ </label>
                                <input type="number" name="skill_1_percentage" class="form-control" id="exampleInputEmail1" text="Enter skill_1_percentage" value="{{old('skill_1_percentage')}}" >
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">نسبه مهاره2_ </label>
                                <input type="number" name="skill_2_percentage" class="form-control" id="exampleInputEmail1" text="Enter skill_2_percentage" value="{{old('skill_2_percentage')}}" >
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">نسبه مهاره3_</label>
                                <input type="number" name="skill_3_percentage" class="form-control" id="exampleInputEmail1" text="Enter skill_3_percentage" value="{{old('skill_3_percentage')}}" >
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">نسبه مهاره 4_</label>
                                <input type="number" name="skill_4_percentage" class="form-control" id="exampleInputEmail1" text="Enter skill_4_percentage" value="{{old('skill_4_percentage')}}" >
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">نسبه مهاره5_</label>
                                <input type="number" name="skill_5_percentage" class="form-control" id="exampleInputEmail1" text="Enter skill_5_percentage" value="{{old('skill_1_percentage')}}" >
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1"> نسبه مهاره6_</label>
                                <input type="number" name="skill_6_percentage" class="form-control" id="exampleInputEmail1" text="Enter skill_6_percentage" value="{{old('skill_6_percentage')}}" >
                              </div>
                            
                            </div>
                              
                            </div>
                            
                              
                            <!-- /.card-body -->

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