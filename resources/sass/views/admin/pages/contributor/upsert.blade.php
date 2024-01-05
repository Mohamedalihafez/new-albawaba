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
                            <h3 class="page-title">{{ __('pages.add_contributor') }}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-contributor"><a href="javascript:(0);">{{ __('pages.contributors') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body custom-edit-service">                 
                                <form method="post" enctype="multipart/form-data" action="{{ route('contributor.modify') }}" class="ajax-form" swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}" redirect="{{ route('contributor') }}">
                                    @csrf
                                    <div class="service-fields mb-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <label class="mb-2">{{ __('pages.name') }}</label>
                                                    <input class="form-control text-start" type="text" name="name" value="@isset($contributor->id){{$contributor->name}}@endisset" placeholder="{{ __('pages.name') }}" >

                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label class="mb-2">{{ __('pages.phone') }}</label>
                                                    <input class="form-control text-start" type="text" name="phone" value="@isset($contributor->id){{$contributor->phone}}@endisset" placeholder="{{ __('pages.phone') }}" >

                                                </div>
                                                <br>
                                                <div class="col-lg-12 mt-3">
                                                    <label class="mb-2">{{ __('pages.logo') }}</label>
                                                    <div class="form-group">
                                                        <input type="file" class="dropify"  data-default-file="@isset($contributor->id){{ asset('/contributor/'.$contributor->id.'/'.$contributor->gallaries->first()->name) }}@endif" name="logo"/>
                                                        <p class="error error_picture"></p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="2" name="partner_type"/>
                                    @isset($contributor->id)
                                        <input type="hidden" value="{{$contributor->id}}" name="id">
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
                        results: $.map(response, function(contributor) {
                            return {
                                text: contributor.name ,
                                id: contributor.id,
                            }
                        })
                    }
                },
                cache: true,
                templateResult: formatRepo,
                placeholder: placeholder,
            },
        });

        function formatRepo (contributor) {
            return contributor.name;
        }
    });
</script>
@endsection