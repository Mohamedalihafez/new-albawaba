@extends('admin.layout.master')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<style>
    .iti--allow-dropdown
    {
        width: 100% !important;
    }
</style>
@section('content')
<div class="main-wrapper">
         

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="content container-fluid">		
                <!-- Page Header -->

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">تعديل الإعلان</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-advertisement"><a href="javascript:(0);">{{ __('pages.advertisements') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class=" custom-edit-service">                 
                                <form id="ads_form" method="post" enctype="multipart/form-data" action="{{ route('advertisement.modify') }}" class="ajax-form" swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}" redirect="{{ route('advertisement') }}">
                                    @csrf
                                    <div class="service-fields mb-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6   mt-2  ">
                                                    <label class="mt-2 ">{{ __('pages.title') }}</label>
                                                    <input class="form-control text-start" type="text" name="title" value="@isset($advertisement->id){{$advertisement->title}}@endisset" placeholder="{{ __('pages.name') }}" >
                                                </div>
                                                <div class="@if(Auth::user()->isSuperAdmin()) col-md-3  @else  col-md-6 @endif  mt-2   ">
                                                    <label class="mt-2 ">نوع العقار </label>
                                                    <select id="building_id"  class="form-control  d-flex " placeholder="المنطقه"  name="building_id"> 
                                                        @foreach($buildings as $building)
                                                            <option @isset($advertisement->id) @if($advertisement->building_id == $building->id) selected @else @endif @endisset class="form-control"  value="{{$building->id}}">{{ $building->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if(Auth::user()->isSuperAdmin())
                                                    <div class="col-md-3  mt-2   ">
                                                        <label class="mt-2 ">صلاحيه الإعلان  </label>
                                                        <input class="form-control text-start" type="datetime-local" name="expired_at" value="@isset($advertisement->id){{$advertisement->expired_at}}@endisset" placeholder="{{ __('pages.name') }}" >

                                                    </div>
                                                @endif
                                                
                                                <div class="col-md-3  mt-2   ">
                                                    <label class="mt-2 ">المنطقه </label>
                                                    <select id="regions" class="form-control  d-flex " placeholder="المنطقه"  name="region_id"> 
                                                        @foreach($regions as $region)
                                                            <option @isset($advertisement->id) @if($advertisement->region->id == $region->id) selected @else @endif @endisset class="form-control"  value="{{$region->id}}">{{ $region->name_ar}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3  mt-2   ">
                                                    <label class="mt-2 ">المدينه </label>
                                                    <select id="cities" class="form-control  d-flex " placeholder="المدينه"  name="city_id"> 
                                                        @foreach($cities as $city)
                                                            <option @isset($advertisement->id) @if($advertisement->city_id == $city->id) selected @else @endif @endisset class="form-control"  value="{{$city->id}}">{{ $city->name_ar}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                                <div class="col-md-3  mt-2  ">
                                                    <label class="mt-2 ">{{ __('pages.district') }}</label>
                                                    <input class="form-control text-start" type="text" name="district" value="@isset($advertisement->id){{$advertisement->district}}@endisset" placeholder="{{ __('pages.district') }}" >
                                                </div>

                                                <div class="col-md-3  mt-2  ">
                                                    <label class="mt-2 ">{{ __('pages.street') }}</label>
                                                    <input class="form-control text-start" type="text" name="street" value="@isset($advertisement->id){{$advertisement->street}}@endisset" placeholder="{{ __('pages.street') }}" >
                                                </div>
                                                @if($advertisement->category_id == 1 )
                                                    <div class="col-md-2  mt-2  ">
                                                        <label class="mt-2 " for="exampleInputtext1">نوع الفلة  </label>
                                                        <select id=""  class="form-control" name="ads_type">
                                                                <option @if($advertisement->ads_type == 1) selected @else @endif value="1">مستقله</option>
                                                                <option @if($advertisement->ads_type == 2) selected @else @endif value="2">دوبلكس </option>
                                                                <option @if($advertisement->ads_type == 3) selected @else @endif value="3">تاون هاوس</option>
                                                                <option @if($advertisement->ads_type == 4) selected @else @endif value="4">مع شقق</option>
                                                        </select>
                                                    </div>
                                                @else
                                                @endif
                                                @if($advertisement->category_id == 1 )
                                                <div class="col-md-2  mt-2  ">
                                                    <label class="mt-2 " >صفة المعلن</label>
                                                    <select id="ads_owner"  class="form-control" name="ads_owner">
                                                            <option  @if($advertisement->ads_owner == 1) selected @else @endif value="1">مالك</option>
                                                            <option  @if($advertisement->ads_owner == 2) selected @else @endif value="2">مكتب عقار</option>
                                                            <option  @if($advertisement->ads_owner == 3) selected @else @endif value="3">وسيط</option>
                                                    </select>
                                                </div>
                                                @else 
                                                @endif
                                                <div class="@if($advertisement->category_id != 1) col-md-3 @else col-md-2  @endif mt-2  ">
                                                    <label class="mt-2 " > @if($advertisement->category_id == 1 )  رقم الرخصه  @else  المعلن @endif </label>
                                                    <input type="text" name="license_id" value="@isset($advertisement->id){{$advertisement->license_id}}@endisset" class="form-control border-0  " placeholder="@if($advertisement->category_id == 1 )  رقم الرخصه  @else  المعلن @endif" style="height: 40;">
                                                </div>   
                                                @if($advertisement->category_id == 1 )
                                                <div class="col-md-3  mt-2  ">
                                                    <label class="mt-2 " >نوع الشارع </label>
                                                    <select id=""  class="form-control" name="street_type">
                                                            <option  @if($advertisement->street_type == 1) selected @else @endif value="1">سكني</option>
                                                            <option  @if($advertisement->street_type == 2) selected @else @endif value="2"> تجاري</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-md-3 mt-2 ">
                                                    <label class="mt-2 " for="exampleInputtext1">الواجهة</label>
                                                    <select id=""  class="form-control" name="face_type">
                                                            <option  @if($advertisement->face_type == 1) selected @else @endif   value="1">شمال</option>
                                                            <option  @if($advertisement->face_type == 2) selected @else @endif  value="2">جنوب </option>
                                                            <option  @if($advertisement->face_type == 3) selected @else @endif  value="3">شرق</option>
                                                            <option  @if($advertisement->face_type == 4) selected @else @endif  value="4">غرب</option>
                                                            <option  @if($advertisement->face_type == 5) selected @else @endif  value="5">جنوب شرقي</option>
                                                            <option  @if($advertisement->face_type == 6) selected @else @endif  value="6">جنوب غربي </option>
                                                            <option  @if($advertisement->face_type == 7) selected @else @endif   value="7">شمال شرقي </option>
                                                            <option  @if($advertisement->face_type == 8) selected @else @endif  value="8">شمال غربي </option>
                                                            <option  @if($advertisement->face_type == 9) selected @else @endif  value="9">ثلاث شوارع</option>
                                                            <option  @if($advertisement->face_type == 10) selected @else @endif  value="10">اربع شوارع </option>
                                                    </select>
                                                </div>
                                                @else 
                                                @endif
                                                <div class="col-md-3 mt-2 ">
                                                    <label class="mt-2 ">{{ __('pages.width') }}</label>
                                                    <input class="form-control text-start" type="text" name="width" value="@isset($advertisement->id){{$advertisement->width}}@endisset" placeholder="{{ __('pages.width') }}" >
                                                </div>
                                                @if($advertisement->category_id == 1 )
                                                <div class="col-md-3 mt-2 ">
                                                    <label class="mt-2 ">{{ __('pages.age') }}</label>
                                                    <input class="form-control text-start" type="text" name="age" value="@isset($advertisement->id){{$advertisement->age}}@endisset" placeholder="{{ __('pages.street') }}" >
                                                </div> 

                                                <div class="col-lg-2 mt-2">
                                                    <label class="mt-2 " for="exampleInputEmail1">عدد الغرف</label>
                                                    <select id=""  class="form-control" name="rooms">
                                                            <option @if($advertisement->rooms == 1) selected @else @endif  value="1">1</option>
                                                            <option @if($advertisement->rooms == 2) selected @else @endif  value="2">2 </option>
                                                            <option @if($advertisement->rooms == 3) selected @else @endif  value="3">3</option>
                                                            <option @if($advertisement->rooms == 4) selected @else @endif  value="4">4</option>
                                                            <option @if($advertisement->rooms == 5) selected @else @endif  value="5">5 </option>
                                                            <option @if($advertisement->rooms == 6) selected @else @endif  value="6">6  </option>
                                                            <option @if($advertisement->rooms == 7) selected @else @endif  value="7">7  </option>
                                                            <option @if($advertisement->rooms == 8) selected @else @endif  value="8">8+  </option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-2 mt-2">
                                                    <label class="mt-2 " for="exampleInputEmail1">عدد الصالات</label>
                                                    <select id=""  class="form-control" name="halls">
                                                            <option @if($advertisement->halls == 1) selected @else @endif  value="1">1</option>
                                                            <option @if($advertisement->halls == 2) selected @else @endif  value="2">2 </option>
                                                            <option @if($advertisement->halls == 3) selected @else @endif value="3">3</option>
                                                            <option @if($advertisement->halls == 4) selected @else @endif  value="4">4</option>
                                                            <option @if($advertisement->halls == 5) selected @else @endif  value="5">5+ </option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-2 mt-2">
                                                    <label class="mt-2 " for="exampleInputEmail1">عدد دورات المياه</label>
                                                    <select id=""  class="form-control" name="bathrooms">
                                                            <option  @if($advertisement->bathrooms == 1) selected @else @endif  value="1">1</option>
                                                            <option  @if($advertisement->bathrooms == 2) selected @else @endif  value="2">2 </option>
                                                            <option  @if($advertisement->bathrooms == 3) selected @else @endif  value="3">3</option>
                                                            <option  @if($advertisement->bathrooms == 4) selected @else @endif  value="4">4</option>
                                                            <option  @if($advertisement->bathrooms == 5) selected @else @endif  value="5">5+ </option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-3 mt-2">
                                                    <label class="mt-2 " for="exampleInputEmail1">عدد الشقق</label>
                                                    <input class="form-control text-start" type="text" name="flats" value="@isset($advertisement->id){{$advertisement->flats}}@endisset" placeholder="{{ __('pages.street') }}" >
                                                    <p class="error error_flats"></p>
                                                </div>

                                                <div class="col-lg-3 mt-2">
                                                    <label class="mt-2 " for="exampleInputEmail1">حدود وأطوال العقار</label>
            
                                                    <input type="text"  name="ads_direction" value="@isset($advertisement->id){{$advertisement->ads_direction}}@endisset" class="form-control border-0  " style="height: 40;">
                                                    <p class="error error_ads_direction"></p>
                                                </div>

                                                <div class="col-lg-3 mt-2">
                                                    <label class="mt-2 " for="exampleInputEmail1">عدد الأدوار</label>
            
                                                    <input type="number"  name="floors"  value="@isset($advertisement->id){{$advertisement->floors}}@endisset"  class="form-control border-0 " style="height: 40;">
                                                    <p class="error error_floors"></p>
                                                </div>

                                                <div class="col-lg-3 mt-2">
                                                    <label class="mt-2 " for="exampleInputEmail1">عدد المحلات</label>
                                                    <input type="number"  name="stores_number"  value="@isset($advertisement->id){{$advertisement->stores_number}}@endisset"  class="form-control border-0  " style="height: 40;">
                                                    <p class="error error_stores_number"></p>
                                                </div>
                                                @else 
                                                @endif
                                                <div class="@if($advertisement->category_id != 1)col-md-3 @else col-md-6 @endif mt-2 ">
                                                    <label class="mt-2 " >رقم الجوال </label>
                                                    <br>
                                                    <input id="phone" type="number"  name="phone"  value="@isset($advertisement->id){{$advertisement->phone}}@endisset"  class="form-control text-start w-100" >
                                                    <p class="error error_phone"></p>
                                                </div>

                                                <div class="@if($advertisement->category_id != 1)col-md-3 @else col-md-6 @endif mt-2 ">
                                                    <label class="mt-2 ">{{ __('pages.price') }}</label>
                                                    <input class="form-control text-start" type="text" name="price" value="@isset($advertisement->id){{$advertisement->price}}@endisset" placeholder="{{ __('pages.price') }}" >
                                                </div>

                                                <input class="d-none" name="currentLat" id="currentLat" type="text" value="{{$advertisement->currentLat}}"/>
                                                <input class="d-none" name="currentLng" id="currentLng" type="text" value="{{$advertisement->currentLng}}"/>
                                      
                                                <div class="col-md-12 mt-2 ">
                                                    <label class="mt-2 ">{{ __('pages.description') }}</label>
                                                    <textarea id="inputDescriptionEs" class="form-control" name="description"  rows="4" required>@isset($advertisement->id){{$advertisement->description}}@endisset</textarea>
                                                </div>
                                                @if($advertisement->category_id != 1 )
                                                    <div class="col-12 mt-2">
                                                        <h4>خيارات اضافية
                                                        </h4>
                                                        <select id="items" name="extras[]" class="js-select-multiple w-100" multiple="multiple">
                                                            @foreach ($extras as $extra)
                                                                <option value="{{ $extra->id }}" @if(in_array($extra->id,$advertisement->extras->pluck('id')->all())) selected @endif data-badge="">{{$extra->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @else
                                                @endif
                                                @if($advertisement->category_id == 1 )
                                                    <div class="col-12 mt-2">
                                                        <h4>خيارات اضافية
                                                        </h4>
                                                        <select name="items[]" class="js-select-multiple w-100" multiple="multiple">
                                                            @foreach ($items as $item)
                                                                <option value="{{ $item->id }}" @if(in_array($item->id,$advertisement->items->pluck('id')->all())) selected @endif data-badge="">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mt-2 mt-2   text-center bg-dark color-white p-2">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-auto">
                                                                <h3 class=""> بيانات مطلوبه </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-lg-6">
                                                            <label class="mt-2 " >هل يوجد الرهن أو القيد الذي يمنع أو يحد من التصرف او الانتفاع من العقار ؟</label>
                                                            <input type="text"  value="{{$advertisement->question_1}}"  name="question_1"  class="form-control border-0  "  style="height: 40;">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="mt-2 " >الحقوق والالتزامات علي العقار الغير موثقة في وثيقه العقار </label>
                                                            <input type="text"   value="{{$advertisement->question_2}}"   name="question_2"  class="form-control border-0  "  style="height: 40;">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="mt-2 " >المعلومات التي قد تؤثر علي العقار سواء في خفض قيمته او التأثير علي قرار المستهدف بالإعلان</label>
                                                            <input type="text"   value="{{$advertisement->question_3}}"   name="question_3"  class="form-control border-0  "  style="height: 40;">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="mt-2 " >
                                                                إضافه رابط اليوتيوب (اختياري)
                                                            </label>
                                                            <br> 
                                                            <br> 
                                                            <input type="text"    value="{{$advertisement->link}}" name="link"  class="form-control border-0 "  style="height: 40;">
                                                        </div>
                                                    </div>
                                                    @else
                                                    @endif
                                                    <div class="col-lg-12  card-header">
                                                        <label class="mt-2 h2 " >
                                                         صور الإعلان
                                                        </label>
                                                        <figure class="usr-dtl-pic card-header">
                                                            <img src="" id="superadminpic">
                                                            <label class="camera" for="upload-img"><i class="ti ti-camera" aria-hidden="true"></i></label>
                                                            <input  name="ads_images[]"  type="file" id="upload-img" style="display:none;">  
                                                        </figure>
                                                        <div class="upload-prod-pic-wrap">
                                                            <ul>
                                                                @foreach ($advertisement->gallaries as $picture)
                                                                <li>
                                                                    <span class="trash-ico "><i class="ti ti-trash" aria-hidden="true"></i></span>
                                                                    <a href="#">
                                                                    <img    src="{{ asset('ads/' .$advertisement->id .'/'. $picture->name) }}" />
                                                                    </a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12 ">
                                                        <label class="mt-2 h2 " >
                                                           الموقع
                                                        </label>                                                        <div class="map-show" id="map_2"></div>
                                                    </div>  
                                                </div>
                                        </div>
                                    </div>
                                    @isset($advertisement->id)
                                        <input type="hidden" value="{{$advertisement->id}}" name="id">
                                        <input type="hidden" value="{{$advertisement->user_id}}" name="user_id">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

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
                        results: $.map(response, function(advertisement) {
                            return {
                                text: advertisement.name ,
                                id: advertisement.id,
                            }
                        })
                    }
                },
                cache: true,
                templateResult: formatRepo,
                placeholder: placeholder,
            },
        });

        function formatRepo (advertisement) {
            return advertisement.name;
        }
    });

    const API_KEY = 'AIzaSyD5P1aaaeShZf5EehRdc8RBY8MqhXvrtLc';
    // Function to initialize and show the map
    $(document).ready(function() {
        initMap();
    });

    function initMap() {
        const latitude = parseFloat($('#currentLat').val());
        const longitude =  parseFloat($('#currentLng').val());
        const location = { lat: latitude, lng: longitude };
    
        
        const map_2 = new google.maps.Map(document.getElementById('map_2'), {
            center: location,
            zoom: 15,
            
        });

        const marker2 = new google.maps.Marker({
            position: location,
            map: map_2,
            title: 'Your Location',
			draggable: true,
        });
        google.maps.event.addListener(marker2, 'dragend', function () {
				updateCoordinates(marker2.getPosition());
        });
        
    }
    function updateCoordinates(position) {
        const currentLat = position.lat();
        const currentLng = position.lng();
        $('#currentLat').val('');
        $('#currentLng').val('');

        $('#currentLat').val(currentLat.toFixed(6));
        $('#currentLng').val(currentLng.toFixed(6));
    }

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

const phoneInputField = document.querySelector("#phone");
const phoneInput = window.intlTelInput(phoneInputField, {
// initialCountry: "SA",
utilsScript:
    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});

$(document).ready(function(){
    $('#ads_form').append(`<input class="d-none" name="country_code" value="966" />`);
    $('.iti__country-list li').click(function(){
        var dataVal = $(this).attr('data-dial-code');
        $('#ads_form').append(`<input class="d-none" name="country_code" value="${dataVal}" />`);
    });
});

$('#building_id').on('change', function () {
    var building_id = this.value;
    $("#items").html('');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        },
        url: '{{ route("extra.fetch") }}',
        method: 'post',
        data: {building_id: building_id},
        success: function (results) {
            $('#items').html('');
            results.forEach((result, index) => {
                $("#items").append('<option value="' + result['id'] + '">' + result['name'] + '</option>');
            });
        },
    });
});
$(document).ready(function(){
    var previewImage = function(input) {
    var fileTypes = ['jpg', 'jpeg', 'png'];
    var extension = input.files[0].name.split('.').pop().toLowerCase(); /*se preia extensia*/
    var isSuccess = fileTypes.indexOf(extension) > -1; /*se verifica extensia*/

    if (isSuccess) {
        var reader = new FileReader();

        reader.onload = function(e) {
            if($('.upload-prod-pic-wrap ul li').length < 5){
                $('.upload-prod-pic-wrap ul').append('<li><span class="trash-ico"><i class="ti ti-trash trash-ico" aria-hidden="true"></i></span><a href="#"><img src="'+e.target.result+'"></a></li>')
            }
        };
        reader.readAsDataURL(input.files[0]);
        
    } else {
        alert('الصوره غير مقبوله ');
    }
};
    $('#upload-img').on('change', function() {
        console.log(this);
            previewImage(this);
            setTimeout(function() {
                showpreview() 
            }, 300);
        })                              
    });

    function showpreview(){
    var lth = $('.upload-prod-pic-wrap ul li').length;
    if(lth == 0){
        $('#superadminpic').attr({
                'src': ''
            })
    }
    $('.upload-prod-pic-wrap ul li').each(function(key,val){
        if(key == lth-1){
            $('#superadminpic').attr({
                'src': $(this).find('img').attr('src')
            })
        }else{
            
        }
    }); 
    if(lth == 5){
        $('.camera').hide()
    }else{
        $('.camera').show()
    }
       
}
$(".upload-prod-pic-wrap ul li .trash-ico").click(function(){   
    $(this).parent().remove(); 
    $("#upload-img").val(''); 
    // alert("hii"); 
    showpreview();
});

$(document).ready(function showpreview (){
        var lth = $('.upload-prod-pic-wrap ul li').length;
        if(lth == 0){
            $('#superadminpic').attr({
                    'src': ''
                })
        }
        $('.upload-prod-pic-wrap ul li').each(function(key,val){
            if(key == lth-1){
                $('#superadminpic').attr({
                    'src': $(this).find('img').attr('src')
                })
            }else{
                
            }
        }); 
        if(lth == 5){
            $('.camera').hide()
        }else{
            $('.camera').show()
        }     
});

    $(".js-select-multiple").select2({
        closeOnSelect : false,
        placeholder : "Placeholder",
        // allowHtml: true,
        allowClear: true,
        tags: true // создает новые опции на лету
    });
        
     

</script>
@endsection