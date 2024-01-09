@extends('layouts.master.master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
<style>
 
</style>
@endsection
@section('content')

<div class="undefined  wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5"> 
        <div class="section-title-ideas text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h1 class="fw-bold text-primary text-uppercase"> أفكار  </h1>
            <h2>فنون ومواهب وإبداع  </h2>
        </div>
        @if(auth::user()->ideas_id == 0)
        <div class="section-title-ideas text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 700px; display:block !important">
            <h2>    صديقنا العزيز أهلا وسهلا بكم  <br> حلق بمساحتك الخاصة واغتنم فرصنا الذهبية   </h2>
            <form id="ads_form" method="post" enctype="multipart/form-data" action="{{ route('ideas.request') }}" class="ajax-form" resetAfterSend  swalOnSuccess="تم ارسال طلبك بنجاح إلي المؤسسه" title="{{ __('pages.opps') }}"  swalOnFail="{{ __('pages.wrongdata') }}">
                @csrf
                <div class="form-group  align-items-center">
                    <input type="hidden" name="id" class="form-control d-block search_input w-50" value="{{auth::user()->id}}">
                    <button class=" btn btn-third mt-1   "> <i class="fa fa-send mr-3"> ارسل الطلب   </i></button>
                </div>
            </form>
        </div>
        @else   
        <div class="section-title-ideas text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 700px; display:block !important">
            <h2>   انشر أعمالك المتنوعة مثل مقالاتك أو اعمالك المصورة   </h2>
            <a href="{{ route('ideas.add',['user' =>auth::user()->id])}}" class=" btn btn-third mt-1 "> <i class="fa fa-plus mr-3"> ابدأ بالنشر    </i></a>
        </div>
        @endif
        <div class="row g-5 mb-5">
            <div class="col-lg-12">
                <div class="" data-wow-delay="0.1s">
                    <div class="undefined ">
                        <div class="_item_1a00s_173 row">
                            <div class="col-md-4 mt-2">
                                <div class="card profile-card-3">
                                    <div class="background-block">
                                        <img src="https://images.pexels.com/photos/459225/pexels-photo-459225.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="profile-sample1" class="background"/>
                                    </div>
                                    <div class="profile-thumb-block">
                                        <img src="https://randomuser.me/api/portraits/men/41.jpg" alt="profile-image" class="profile"/>
                                    </div>
                                    <div class="card-content">
                                    <h2>Justin Mccoy<small>Designer</small></h3>
                                    <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="card profile-card-3">
                                    <div class="background-block">
                                        <img src="https://images.pexels.com/photos/459225/pexels-photo-459225.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="profile-sample1" class="background"/>
                                    </div>
                                    <div class="profile-thumb-block">
                                        <img src="https://randomuser.me/api/portraits/men/41.jpg" alt="profile-image" class="profile"/>
                                    </div>
                                    <div class="card-content">
                                    <h2>Justin Mccoy<small>Designer</small></h3>
                                    <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="card profile-card-3">
                                    <div class="background-block">
                                        <img src="https://images.pexels.com/photos/459225/pexels-photo-459225.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="profile-sample1" class="background"/>
                                    </div>
                                    <div class="profile-thumb-block">
                                        <img src="https://randomuser.me/api/portraits/men/41.jpg" alt="profile-image" class="profile"/>
                                    </div>
                                    <div class="card-content">
                                    <h2>Justin Mccoy<small>Designer</small></h3>
                                    <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="card profile-card-3">
                                    <div class="background-block">
                                        <img src="https://images.pexels.com/photos/459225/pexels-photo-459225.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="profile-sample1" class="background"/>
                                    </div>
                                    <div class="profile-thumb-block">
                                        <img src="https://randomuser.me/api/portraits/men/41.jpg" alt="profile-image" class="profile"/>
                                    </div>
                                    <div class="card-content">
                                    <h2>Justin Mccoy<small>Designer</small></h3>
                                    <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
                                    </div>
                                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

<script>
const phoneInputField = document.querySelector("#phone");
const phoneInput = window.intlTelInput(phoneInputField, {
initialCountry: "SA",
utilsScript:
    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});

$(document).ready(function(){
    $('#contact-form').append(`<input class="d-none" name="country_code" value="966" />`);
    $('.iti__country-list li').click(function(){
        var dataVal = $(this).attr('data-dial-code');
        $('#contact-form').append(`<input class="d-none" name="country_code" value="${dataVal}" />`);
    });
});
</script>
@endsection