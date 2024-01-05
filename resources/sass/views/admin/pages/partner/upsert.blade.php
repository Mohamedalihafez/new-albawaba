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
                            <h3 class="page-title">{{ __('pages.add_partner') }}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-partner"><a href="javascript:(0);">{{ __('pages.partners') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body custom-edit-service">                 
                                <form method="post" enctype="multipart/form-data" action="{{ route('partner.modify') }}" class="ajax-form" swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}" redirect="{{ route('partner') }}">
                                    @csrf
                                    <div class="service-fields mb-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12 mb-2">
                                                    <label class="mb-2">{{ __('pages.link') }}</label>
                                                    <input class="form-control text-start" type="text" name="name" value="@isset($partner->id){{$partner->name}}@endisset" placeholder="{{ __('pages.link') }}" >

                                                </div>
                                                <br>
                                                <div class="col-lg-12 mt-3">
                                                    <label class="mb-2">{{ __('pages.logo') }}</label>
                                                    <div class="form-group">
                                                        <input type="file" class="dropify"  data-default-file="@isset($partner->id){{ asset('/partner/'.$partner->id.'/'.$partner->gallaries->first()->name) }}@endif" name="logo"/>
                                                        <p class="error error_picture"></p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="1" name="partner_type"/>
                                    @isset($partner->id)
                                        <input type="hidden" value="{{$partner->id}}" name="id">
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
                        results: $.map(response, function(partner) {
                            return {
                                text: partner.name ,
                                id: partner.id,
                            }
                        })
                    }
                },
                cache: true,
                templateResult: formatRepo,
                placeholder: placeholder,
            },
        });

        function formatRepo (partner) {
            return partner.name;
        }
    });
</script>
@endsection