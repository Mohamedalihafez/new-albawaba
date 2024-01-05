@extends('layouts.master.master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
<style>
    ._itemInfo_1a00s_182 {
    padding: 36px 50px 34px;
    background-color: #fff;
    box-shadow: 0 5px 50px #615d5d33;
    border-radius: 4px;
}
._overlay_1ry7l_28 {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}
._overlay_1ry7l_28 img{
   height: auto;
    max-height: 400px;
    object-fit: cover;
    width: 100%;
}
@media (min-width: 768px){
    ._itemInfoCol_1a00s_182 {
        margin-left: auto;
        margin-right: -174px !important;
        z-index: 99;

    }
}
@media (max-width: 768px){
      .m-20 {
        margin:20px 0px 20px 0px !important;
    }
        ._itemInfo_1a00s_182 {
    padding: 26px 27px 15px !important;
    background-color: #fff;
    box-shadow: 0 5px 50px #615d5d33;
    border-radius: 4px; 
}
}
.rate_img {
    height: 300px !important;
    object-fit: cover;
    width: 100%;
}

@media (min-width: 768px){

    ._itemImageCol_1a00s_209 {
        margin-top: -47px;
        margin-right: -44px;
        margin-left: auto;
    }

    /*.undefined {*/
    /*    margin: 0px 14px 0px 14px !important ;*/
    /*}*/
    .flex-row-reverse  ._itemInfoCol_1a00s_182 {
          margin-right: 44px !important;
    }
    
    .m-20 {
        margin:51px 0px 80px 0px  !important;
    }
}
</style>
@endsection
@section('content')

<!--<div class="container-fluid py-5 bg-header"  >-->
<!--    <div class="row py-5">-->
<!--        <div class="col-12 pt-lg-5 mt-lg-5 text-center">-->
<!--            <h1 class="display-4 text-white animated zoomIn"> الشروط والأحكام</h1>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

    <div class="undefined  wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5"> 
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h1 class="fw-bold text-primary text-uppercase"> خدماتنا </h1>
                <h2>في قائمة الخدمات التي نقدمها في مجال التسويق العقاري والخدمات الإعلانية والبرمجة</h2>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-12">
                    <div class="" data-wow-delay="0.1s">
                        <div class="undefined ">
                              <div class="_item_1a00s_173">
                                @foreach($categories as  $key => $product )
                                <div class="row @if($key%2 ==0)  @else  flex-row-reverse @endif  m-20">
                                        <div class="_itemImageCol_1a00s_209 col-lg-5 col-md-6">
                                            <div id="1723097458" data-test="ImageView" class="_image_1a00s_229" style="position:relative;overflow:hidden">
        
                                            <span class="_desktop_qcg8m_1">
                                                <div class="_overlay_1ry7l_28"></div>
                                                <img class="rate_img" src="@isset($product->id){{ asset('/services/'.$product->id.'/'.$product->gallaries->first()->name) }}@endif" alt="" style="height:auto;max-height:400px;object-fit:cover;width:100%">
                                            </span>
                                            </div>
                                        </div>
                                        <div class="_itemInfoCol_1a00s_182 col-lg-7 col-md-7">
                                            <div class="_itemInfo_1a00s_182">
                                            <h4 class="Text_text__FZ_SS">{{$product->title}} </h4>
                                                <div class="_spaceAfter--xSmall_1a00s_138"></div>
                                            <p class="Text_text__FZ_SS">{{$product->description}} </p>
                                            <div class="_spaceAfter--small_1a00s_141"></div>

                                            </div>
                                        </div>
                                    </div>
                                {{-- <div class="row flex-row-reverse m-20">
                                    <div class="_itemImageCol_1a00s_209 col-lg-5 col-md-6">
                                        <div id="1723097458" data-test="ImageView" class="_image_1a00s_229" style="position:relative;overflow:hidden">
    
                                        <span class="_desktop_qcg8m_1">
                                            <div class="_overlay_1ry7l_28"></div>
                                            <img class="rate_img" src="https://image.shutterstock.com/z/stock-photo-real-estate-appraisal-man-doing-property-inspection-outdoors-1723097458.jpg" alt="" style="height:auto;max-height:400px;object-fit:cover;width:100%">
                                        </span>
                                        </div>
                                    </div>
                                        <div class="_itemInfoCol_1a00s_182 col-lg-7 col-md-7">
                                            <div class="_itemInfo_1a00s_182">
                                            <h4 class="Text_text__FZ_SS">تقييم العقارات</h4>
                                                <div class="_spaceAfter--xSmall_1a00s_138"></div>
                                            <p class="Text_text__FZ_SS">نضع القيمة السوقية للعقار بين أيديك عن طريق مجموعة من المختصين المرخصين من هيئة المقيمين</p>
    
                                            </div>
                                        </div>
                                </div> --}}
                                @endforeach 
                                
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