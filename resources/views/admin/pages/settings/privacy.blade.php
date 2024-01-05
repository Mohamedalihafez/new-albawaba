@extends('admin.layout.master')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">

<!-- Include jQuery (required) and Summernote JS -->

@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="content container-fluid">		
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">الشروط واالأحكام   </h3>

                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->        
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body custom-edit-service">                 
                                    <!-- Add Blog -->
                                    <form method="post" enctype="multipart/form-data" action="{{ route('privacy.modify') }}" class="ajax-form" swalOnSuccess="{{ __('pages.sucessdata') }}" swalOnFail="{{ __('pages.wrongdata') }}" title="{{ __('pages.opps') }}">
                                        @csrf
                                        <div class="service-fields mb-3">

                                  
                                            <div class="col-lg-12 mb-4">
                                                <label class="mb-2">محتوي الصفحه  </label>
                                                <div>
                                                    <textarea class="form-control" type="text" id="summernote" name="privacy" placeholder="">@isset($setting->id){{$setting->privacy}}@endisset</textarea>
                                                    <p class="error error_address"></p>
                                                </div>
                                            </div>


                                        </div>
                                        @isset($setting->id)
                                            <input type="hidden" value="{{$setting->id}}" name="id">
                                        @endisset
                                            <div class="submit-section">
                                                <button class="btn btn-primary submit-btn" type="submit" name="form_submit" placeholder="submit">{{ __('pages.submit') }}</button>
                                            </div>
                                    </form>
                                    <!-- /Add Blog -->
                                </div>
                            </div>
                        </div>			
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#summernote').summernote({
      height: 300, // set editor height
      minHeight: null, // set minimum height of editor
      maxHeight: null, // set maximum height of editor
      focus: true ,
       styleWithSpan: false,
    toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol']]
    ]
    });
  });
</script>
@endsection