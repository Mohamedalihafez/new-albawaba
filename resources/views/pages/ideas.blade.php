@extends('layouts.master.master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
<style>
 
</style>
@endsection
@section('content')

<div class="undefined  wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5"> 
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h1 class="fw-bold text-primary text-uppercase"> أفكار  </h1>
            <h2>فنون ومواهب وإبداع  </h2>
        </div>
        <div class="row g-5 mb-5">
            <div class="col-lg-12">
                <div class="" data-wow-delay="0.1s">
                    <div class="undefined ">
                        <div class="_item_1a00s_173 row">
                            <div class="col-md-4">
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
                            <div class="col-md-4">
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
                            <div class="col-md-4">
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
                            <div class="col-md-4">
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