@extends('layouts.master.master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

@endsection
@section('content')

<!--<div class="container-fluid py-5 bg-header"  >-->
<!--    <div class="row py-5">-->
<!--        <div class="col-12 pt-lg-5 mt-lg-5 text-center">-->
<!--            <h1 class="display-4 text-white animated zoomIn"> الشروط والأحكام</h1>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

    <div class="container-fluid  wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h1 class="fw-bold text-primary text-uppercase">الشروط والأحكام </h1>
                <!--<h2 class="mb-0">إذا كان لديك أي استفسار، فلا تتردد في الاتصال بنا</h2>-->
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-12">
                    <div class="card-body m-2" data-wow-delay="0.1s">
                        
                      {!! $setting->privacy !!}
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