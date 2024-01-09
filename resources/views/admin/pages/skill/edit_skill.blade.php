@extends('admin.layout.master')
@section('title')
 | Update Skill
@endsection

@section('Content_header')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Skill</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Update Skill</li>
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
            <div class="col-md-1"></div>
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Skill</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{ route('update_skill', $skill->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="row">
                  <div class="card-body col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Skill_1</label>
                    <input type="text" name="skill_1" class="form-control" id="exampleInputEmail1" placeholder="Enter Skill_1" value="{{old('skill_1', $skill->skill_1)}}"  maxlength="25" max required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 25</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Skill_2</label>
                    <input type="text" name="skill_2" class="form-control" id="exampleInputEmail1" placeholder="Enter Skill_2" value="{{old('skill_2',$skill->skill_2)}}"  maxlength="25" max required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 25</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Skill_3</label>
                    <input type="text" name="skill_3" class="form-control" id="exampleInputEmail1" placeholder="Enter Skill_3" value="{{old('skill_3',$skill->skill_3)}}"  maxlength="25" max required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 25</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Skill_4</label>
                    <input type="text" name="skill_4" class="form-control" id="exampleInputEmail1" placeholder="Enter Skill_4" value="{{old('skill_4',$skill->skill_4)}}"  maxlength="25" max required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 25</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Skill_5</label>
                    <input type="text" name="skill_5" class="form-control" id="exampleInputEmail1" placeholder="Enter Skill_5" value="{{old('skill_5',$skill->skill_5)}}"  maxlength="25" max required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 25</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Skill_6</label>
                    <input type="text" name="skill_6" class="form-control" id="exampleInputEmail1" placeholder="Enter Skill_6" value="{{old('skill_6',$skill->skill_6)}}"  maxlength="25" max required>
                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 25</span>
                  </div>

                 
                </div>
                <div class="card-body col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Skill_1_Percentage</label>
                    <input type="number" name="skill_1_percentage" class="form-control" id="exampleInputEmail1" placeholder="Enter skill_1_percentage" value="{{old('skill_1_percentage',$skill->skill_1_percentage)}}" required>
                     <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 3</span>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Skill_2_Percentage</label>
                    <input type="number" name="skill_2_percentage" class="form-control" id="exampleInputEmail1" placeholder="Enter skill_2_percentage" value="{{old('skill_2_percentage',$skill->skill_2_percentage)}}" required>
                     <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 3</span>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Skill_3_Percentage</label>
                    <input type="number" name="skill_3_percentage" class="form-control" id="exampleInputEmail1" placeholder="Enter skill_3_percentage" value="{{old('skill_3_percentage',$skill->skill_3_percentage)}}" required>
                     <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 3</span>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Skill_4_Percentage</label>
                    <input type="number" name="skill_4_percentage" class="form-control" id="exampleInputEmail1" placeholder="Enter skill_4_percentage" value="{{old('skill_4_percentage',$skill->skill_4_percentage)}}" required>
                     <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 3</span>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Skill_5_Percentage</label>
                    <input type="number" name="skill_5_percentage" class="form-control" id="exampleInputEmail1" placeholder="Enter skill_5_percentage" value="{{old('skill_1_percentage',$skill->skill_5_percentage)}}" required>
                     <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 3</span>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Skill_6_Percentage</label>
                    <input type="number" name="skill_6_percentage" class="form-control" id="exampleInputEmail1" placeholder="Enter skill_6_percentage" value="{{old('skill_6_percentage',$skill->skill_6_percentage)}}" required>
                     <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to 3</span>
                  </div>
                 
                </div>
                  
                </div>
                
                   
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-outline-primary">Update Skill</button>
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
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endpush