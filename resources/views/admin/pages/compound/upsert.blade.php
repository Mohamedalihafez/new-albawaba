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
                            <h3 class="page-title">{{ __('pages.add_compound') }}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:(0);">{{ __('pages.compounds') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- /Page Header -->        
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body custom-edit-service">                 
                                <!-- Add Blog -->
                                <form method="post" enctype="multipart/form-data" action="{{ route('compound.modify') }}" class="ajax-form" swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}" redirect="{{ route('compound') }}">
                                    @csrf
                                    <div class="service-fields mb-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="mb-2">{{ __('pages.name_compound') }}</label>
                                                    <input class="form-control" type="text" name="name" placeholder="{{ __('pages.name') }}" value="@isset($compound->id){{$compound->name}}@endisset">
                                                    <p class="error error_name"></p>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="mb-2">{{ __('pages.compound_owner') }}</label>
                                                    @if(!count($users))
                                                        <a href="{{ route('user') }}" class="ajax-link d-block" message="{{ __('pages.in_case_you_leave_the_page') }}"> {{ __('pages.add_user') }} +</a>
                                                    @else
                                                    <select class="form-control select2 d-flex diseases" placeholder="{{ __('pages.compound_owner') }}" route="{{route('users')}}"  name="user_id">
                                                        @foreach($users as $user)
                                                            <option class="form-control" value="{{ $user->id }}" @if ($user->id == $compound->user_id) selected @endif> 
                                                                {{ $user->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <label class="mb-2">{{ __('pages.address') }}</label>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input placeholder="{{ __('pages.address') }}" type="phone" id="number" class="form-control @error('address') is-invalid @enderror" name="address" value="@isset($compound->id){{$compound->address}}@endisset">
                                                                <p class="error error_phone"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @isset($compound->id)
                                        <input type="hidden" value="{{$compound->id}}" name="id">
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

</script>
@endsection