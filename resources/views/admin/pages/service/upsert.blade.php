@extends('admin.layout.master')
@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="content container-fluid">		
                <!-- Page Header -->

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">إضافه خدمه</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-service"><a href="javascript:(0);">الخدمات</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body custom-edit-service">                 
                                <form method="post" enctype="multipart/form-data" action="{{ route('service.modify') }}" class="ajax-form" swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}" redirect="{{ route('service') }}">
                                    @csrf
                                    <div class="service-fields mb-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12 mb-2">
                                                    <label class="mb-2">العنوان</label>
                                                    <input class="form-control text-start" type="text" name="title" value="@isset($service->id){{$service->title}}@endisset" placeholder="العنوان" >

                                                </div>
                                                            <div class="col-md-12 mb-2">
                                                    <label class="mb-2">المحتوي</label>
                                                                   <textarea class="form-control border-0 bg-light px-4 py-3" name="description"  rows="4" placeholder="المحتوي ">@isset($service->id){{$service->description}}@endisset</textarea>

                                                </div>
                                                <br>
                                                <div class="col-lg-12 mt-3">
                                                    <label class="mb-2">{{ __('pages.logo') }}</label>
                                                    <div class="form-group">
                                                        <input type="file" class="dropify"  data-default-file="@isset($service->id){{ asset('/services/'.$service->id.'/'.$service->gallaries->first()->name) }}@endif" name="logo"/>
                                                        <p class="error error_picture"></p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="1" name="section_number"/>
                                    @isset($service->id)
                                        <input type="hidden" value="{{$service->id}}" name="id">
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
<script>
    $('.dropify').dropify();

    $(document).ready(function(){
        function route(){
            return $(this).attr('route');
        }

        function placeholder(){
            return $(this).attr('placeholder');
        }
        
        $("#apartment_id").select2({
            ajax: {
                url: route,
                type: "post",
                dataType: 'json',
                delay: 250,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function (term) {
                    return {
                        term: term,
                        building_id: $("#building_id").val()
                    };
                },
                processResults: function (response) {
                    return {
                        results: $.map(response, function(service) {
                            return {
                                text: service.name ,
                                id: service.id,
                            }
                        })
                    }
                },
                cache: true,
                templateResult: formatRepo,
                placeholder: placeholder,
            },
        });

        function formatRepo (service) {
            return service.name;
        }
    });
</script>
@endsection