@extends('layouts.master.master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>


@endsection
@section('content')

<div class="container-fluid py-5 order-header"  >
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn">قدم طلبك  </h1>
        </div>
    </div>
</div>

    <div class="container-fluid  wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">

            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">اتصل لطرح أي سؤال</h5>
                            <h6 class="text-primary mb-0">966505360123+</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">راسلنا عبر البريد الإلكتروني</h5>
                            <h6 class="text-primary mb-0">vip.albawaba@gmail.com</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">قم بزيارتنا</h5>
                            <h6 class="text-primary mb-0">حي المصيف الاول، 3364 عمر و ابن العاص                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <form id="order_form" method="post" enctype="multipart/form-data" action="{{ route('order.modify') }}" class="ajax-form" resetAfterSend  swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="mb-1" > نوع طلب الإعلان     </label>
                                <select style="height: 55px!important" id="ads_type"  class="form-control bg-light h-40 " name="ads_type">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-1" > خيارات الفئة    </label>
                                <select style="height: 55px!important" id="chooses"  class="form-control bg-light h-40" name="category_id">
                                        <option selected>
                                            حدد المنطقه
                                        </option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-1" > المنطقه    </label>
                                <select style="height: 55px!important" id="regions"  class="form-control bg-light h-40 " name="region_id">
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->region_id }}">{{ $region->name_ar }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-1" > المدينه أو المحافظه  </label>
                                <select style="height: 55px!important" id="cities"  class="form-control bg-light h-40" name="city_id">
                                        <option selected>
                                            حدد المنطقه
                                        </option>
                                </select>
                            </div>
                        
                            <div class="col-md-6">
                                <label class="mb-1" > الإسم       </label>
                                <input type="text" name="name" class="form-control border-0 bg-light px-4 h-40" placeholder="الإسم" >
                                <p class="error error_name"></p>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-1" > البريد الإلكتروني       </label>
                                <input type="email"  name="email"  class="form-control border-0 bg-light px-4 h-40" placeholder="بريدك الالكتروني" >
                                <p class="error error_email"></p>
                            </div>
                            <div class="col-12">
                                <label class="mb-1" > الجوال       </label>
                                <input id="phone" type="number" name="phone"  class="form-control border-0 bg-light px-4 h-40" placeholder="رقم الجوال">
                                <p class="error error_phone"></p>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label class="mb-2">صوره مشابهه للطلب</label>
                                <div class="form-group">
                                    <input type="file" class="dropify"  data-default-file="" name="ads_image"/>
                                    <p class="error error_picture"></p>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="mb-1" > المحتوي        </label>

                                <textarea class="form-control border-0 bg-light px-4 py-3 " name="comments"  rows="4" placeholder="محتوي الرساله"></textarea>
                                <p class="error error_comments"></p>
                            </div>
                            
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">ارسل طلبك </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow slideInUp " data-wow-delay="0.6s">
                    <iframe class="position-relative rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3508.6167822510356!2d36.529002774387294!3d28.430817993214188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15a9ad46d59b9f7b%3A0xeafb09e70f11614b!2z2YXYpNiz2LPYqSDYqNmI2KfYqNipINiq2KjZiNmDINmE2YTYrtiv2YXYp9iqINin2YTYudmC2KfYsdmK2Kkg2YjYp9mE2KrYs9mI2YrZgg!5e0!3m2!1sen!2ssa!4v1696345634517!5m2!1sen!2ssa" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

<script>
    $(document).ready(function () {
        $('#regions').on('change', function () {
            var region = this.value;
            $("#cities").html('');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                url: '{{ route("region.fetch") }}',
                method: 'post',
                data: {region_id: region},
                success: function (results) {
                    $('#cities').html('');
                    results.forEach((result, index) => {
                        $("#cities").append('<option value="' + result['id'] + '">' + result['name_ar'] + '</option>');
                    });
                },
            });
        });
    });

    $(document).ready(function () {
        $('#ads_type').on('change', function () {
            var category_id = this.value;
            $("#chooses").html('');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                url: '{{ route("ads.fetch") }}',
                method: 'post',
                data: {category_id: category_id},
                success: function (results) {
                    $('#chooses').html('');
                    results.forEach((result, index) => {
                        $("#chooses").append('<option value="' + result['id'] + '">' + result['name'] + '</option>');
                    });
                },
            });
        });
    });

    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
    initialCountry: "SA",
    utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });

    $(document).ready(function(){
        $('#order_form').append(`<input class="d-none" name="country_code" value="966" />`);
        $('.iti__country-list li').click(function(){
            var dataVal = $(this).attr('data-dial-code');
            $('#order_form').append(`<input class="d-none" name="country_code" value="${dataVal}" />`);
        });
    });


</script>
@endsection