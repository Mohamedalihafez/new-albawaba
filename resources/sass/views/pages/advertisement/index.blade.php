@extends('layouts.master.master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

@endsection
@section('content')

<div class="container-fluid  wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-12 wow sellproduct " data-wow-delay="0.6s">
                <div class="section-title text-center position-relative pb-3 mx-auto" >
                    <h3 class="fw-bold text-primary text-uppercase">اضف إعلانك </h3>
                    <h3 class="text-lg md:text-xl font-bold my-1 font-semibold"> </h3><hr class="my-2"><span>بسم الله الرحمن الرحيم</span><br><span>قال الله تعالى:</span><b>" وَأَوْفُواْ بِعَهْدِ اللهِ إِذَا عَاهَدتُّمْ وَلاَ تَنقُضُواْ الأَيْمَانَ بَعْدَ تَوْكِيدِهَا وَقَدْ جَعَلْتُمُ اللهَ عَلَيْكُمْ كَفِيلاً "</b><span>صدق الله العظيم</span><br><br>
                </div>
                <div  id="location_map">
                    <label  class="h3" for="exampleInputtext1">حدد موقع إعلانك</label>

                    <div class="mt-2" id="map" style="width: 100%; height: 400px;"></div>
                   
                    
                    <div class="col-12 mt-2">
                        <a id="setlocation" class="btn btn-primary w-100 py-3  mt-2">تأكيد العنوان </a>
                    </div>
                </div>
            </div>
            <i id="back_map" class="fa fa-arrow-right f-xl  d-none  product_details" > &nbsp; العوده </i>
            <div class="col-lg-12 wow  slideInUp product_details d-none" >
                <div class="card">
                    <div class="data-ads">
                        <form id="ads_form" method="post" enctype="multipart/form-data" action="{{ route('advertisement.modify') }}" class="ajax-form" resetAfterSend  swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}"  redirect="{{ route('home') }}"  swalOnFail="{{ __('pages.wrongdata') }}">
                            @csrf
                            <div class="d-none">
                                <input name="currentLat" value=""  id="currentLat"/>
                                <input name="currentLng" value=""  id="currentLng"/>
                                <input name="category_id" value="{{$category->id}}"  id="category_id"/>
                            </div>
                            <div class=" card-header text-center ">
                                <div class="row">
                                    <div class="col-sm-12 col-auto">
                                        <h3 class="page-title">تحديد الموقع </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 mt-2">
                                <div class="col-lg-3">
                                    <label class="mb-1" >حدد المنطقه </label>
                                    <select id="regions"  class="form-control" name="region_id">
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->region_id }}">{{ $region->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label class="mb-1" >حدد المدينه أو المحافظه  </label>
                                    <select id="cities"  class="form-control" name="city_id">
                                            <option selected>
                                                حدد المنطقه
                                            </option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label class="mb-1" >الحي</label>
                                    <input type="text"  name="district"  class="form-control border-0 bg-light "  style="height: 40;">
                                </div>
                                <div class="col-lg-3">
                                    <label class="mb-1" >الشارع</label>
                                    <input type="text"  name="street"  class="form-control border-0 bg-light "  style="height: 40;">
                                </div>
                                <div class=" card-header text-center ">
                                    <div class="row">
                                        <div class="col-sm-12 col-auto">
                                            <h3 class="page-title"> تفاصيل الإعلان </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 mt-2">
                                    <label class="mb-1" for="exampleInputtext1">عنوان الاعلان </label>

                                    <input type="text" name="title" class="form-control border-0 bg-light "  style="height: 40;">
                                    <p class="error error_name"></p>
                                </div>
                                <div class="col-lg-3 mt-2">
                                    
                                    <label class="mb-1" >@if($category->id == 1 )   نوع العقار @elseif($category->id == 2)  خيارات الفئة @else  خيارات الإعلان @endif  </label>
                                    <select id="building_id"  class="form-control" name="building_id">
                                        @foreach ($buildings as $building)
                                            <option value="{{ $building->id }}">{{ $building->name }}</option>
                                        @endforeach
                                    </select>
                                </div>  
                                @if($category->id != 1 )
                                    <div class="col-lg-3 mt-2">
                                        <label class="mb-1" for="exampleInputtext1">نسبه الخصم  </label>
                                        <input type="text" name="code" class="form-control border-0 bg-light "  style="height: 40;">
                                    </div>
                                @else 
                                
                                <div class="col-lg-3   mt-2">
                                    <label class="mb-1" >صفة المعلن</label>
                                    <select id="ads_type"  class="form-control" name="ads_owner">
                                            <option value="1">مالك</option>
                                            <option value="2">مكتب عقار</option>
                                            <option value="3">وسيط</option>
                                    </select>
                                </div>
                                @endif
                                <div class="col-lg-3  mt-2">
                                    <label class="mb-1" > @if($category->id == 1 )  رقم الرخصه  @else  المعلن @endif </label>
                                    <input type="text" name="license_id" class="form-control border-0 bg-light " placeholder="@if($category->id == 1 )  رقم الرخصه  @else  المعلن @endif" style="height: 40;">
                                </div>     
                                <hr>
                                @if($category->id == 1 )
                                    <div class="col-lg-3">
                                        <label class="mb-1" >نوع الشارع </label>
                                        <select id=""  class="form-control" name="street_type">
                                                <option value="1">سكني</option>
                                                <option value="2"> تجاري</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 ">
                                        <label class="mb-1" for="exampleInputtext1">نوع الفلة                                    </label>
                                        <select id=""  class="form-control" name="ads_type">
                                                <option value="1">مستقله</option>
                                                <option value="2">دوبلكس </option>
                                                <option value="3">تاون هاوس</option>
                                                <option value="4">مع شقق</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 ">
                                        <label class="mb-1" for="exampleInputtext1">الواجهة</label>
                                        <select id=""  class="form-control" name="face_type">
                                                <option value="1">شمال</option>
                                                <option value="2">جنوب </option>
                                                <option value="3">شرق</option>
                                                <option value="4">غرب</option>
                                                <option value="5">جنوب شرقي</option>
                                                <option value="6">جنوب غربي </option>
                                                <option value="7">شمال شرقي </option>
                                                <option value="8">شمال غربي </option>
                                                <option value="9">ثلاث شوارع</option>
                                                <option value="10">اربع شوارع </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 mt-2">
                                        <label class="mb-1" for="exampleInputtext1">المساحه :</label>

                                        <input type="text" name="width" class="form-control border-0 bg-light " style="height: 40;">
                                        <p class="error error_width"></p>
                                    </div>
                                    <div class="col-lg-3 mt-2">
                                        <label class="mb-1" for="exampleInputtext1">عمر العقار</label>

                                        <input type="number"  name="age"  class="form-control border-0 bg-light "  style="height: 40;">
                                        <p class="error error_age"></p>
                                    </div>
                                    <div class="col-lg-3 mt-2">
                                        <label class="mb-1" for="exampleInputEmail1">عدد دورات المياه</label>
                                        <select id=""  class="form-control" name="bathrooms">
                                                <option value="1">1</option>
                                                <option value="2">2 </option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5+ </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 mt-2">
                                        <label class="mb-1" for="exampleInputEmail1">عدد الشقق</label>

                                        <input type="number"  name="flats"  class="form-control border-0 bg-light " style="height: 40;">
                                        <p class="error error_flats"></p>
                                    </div>
                                    <div class="col-lg-3 mt-2">
                                        <label class="mb-1" for="exampleInputEmail1">حدود وأطوال العقار</label>

                                        <input type="text"  name="ads_direction"  class="form-control border-0 bg-light " style="height: 40;">
                                        <p class="error error_ads_direction"></p>
                                    </div>
                                    <div class="col-lg-3 mt-2">
                                        <label class="mb-1" for="exampleInputEmail1">عدد الأدوار</label>

                                        <input type="number"  name="floors"  class="form-control border-0 bg-light " style="height: 40;">
                                        <p class="error error_floors"></p>
                                    </div>
                                    <div class="col-lg-3 mt-2">
                                        <label class="mb-1" for="exampleInputEmail1">عدد المحلات</label>

                                        <input type="number"  name="stores_number"  class="form-control border-0 bg-light " style="height: 40;">
                                        <p class="error error_stores_number"></p>
                                    </div>                                
                                    <div class="col-lg-3 mt-2">
                                        <label class="mb-1" for="exampleInputEmail1">عدد الغرف</label>
                                        <select id=""  class="form-control" name="rooms">
                                                <option value="1">1</option>
                                                <option value="2">2 </option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5 </option>
                                                <option value="6">6  </option>
                                                <option value="7">7  </option>
                                                <option value="8">8+  </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 mt-2">
                                        <label class="mb-1" for="exampleInputEmail1">عدد الصالات</label>
                                        <select id=""  class="form-control" name="halls">
                                                <option value="1">1</option>
                                                <option value="2">2 </option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5+ </option>
                                        </select>
                                    </div>
                                    <hr>
                                    <div class="col-12">
                                        <h4>خيارات اضافية
                                        </h4>
                                        <select name="items[]" class="js-select2 w-100" multiple="multiple">
                                            @foreach ($items as $item)
                                                <option value="{{ $item->id }}" data-badge="">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else 
                                <div class="col-12">
                                    <h4>خيارات اضافية
                                    </h4>
                                    <select id="items" name="extras[]" class="js-select2 w-100" multiple="multiple">

                                    </select>
                                </div>
                                @endif
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-6 mt-2">
                                            <label class="mb-1" > رقم الجوال </label>
                                            <input id="phone" name="phone" type="tel" style="height: 40;"   class="form-control w-100   @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required  autofocus pattern="\d*">
                                        </div>
                                        <div class="col-lg-6 mt-2">
                                            <label class="mb-1" > السعر  </label>
                                            <input  style="height: 40;" type="number"  name="price"  class="form-control border-0 bg-light " >
    
                                        </div>                       
                                        <div class="col-12 mt-2">
                                            <label class="mb-1" for="exampleInputEmail1">الوصف</label>
                                            <textarea class="form-control border-0 bg-light  py-3" name="description"  rows="4" ></textarea>
                                            <p class="error error_comments"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="" for="exampleInputEmail1">تحميل الصور</label>    
                                    <div class="upload__box">
                                        
                                        <div id="galleryList" class="d-flex flex-wrap">
                                            <!--display the images uploaded-->
                                            <div id="galleryControls">
                                                <input  name="ads_images[]" class="form-control" id="galleryPics" type="file" accept="image/jpeg, image/png, image/jpg" multiple hidden>
                                                <button type="button" id="galleryUploadBtn" onclick="galleryUploadBtnActive()"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($category->id == 1 )
                                    <div class=" card-header text-center ">
                                        <div class="row">
                                            <div class="col-sm-12 col-auto">
                                                <h3 class="page-title"> بيانات مطلوبه </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="mb-1" >هل يوجد الرهن أو القيد الذي يمنع أو يحد من التصرف او الانتفاع من العقار ؟</label>
                                        <input type="text"  name="question_1"  class="form-control border-0 bg-light "  style="height: 40;">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="mb-1" >الحقوق والالتزامات علي العقار الغير موثقة في وثيقه العقار </label>
                                        <input type="text"  name="question_2"  class="form-control border-0 bg-light "  style="height: 40;">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="mb-1" >المعلومات التي قد تؤثر علي العقار سواء في خفض قيمته او التأثير علي قرار المستهدف بالإعلان</label>
                                        <input type="text"  name="question_3"  class="form-control border-0 bg-light "  style="height: 40;">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="mb-1" >
                                            إضافه رابط اليوتيوب (اختياري)
                                        </label>
                                        <br> 
                                        <input type="text"  name="link"  class="form-control border-0 bg-light "  style="height: 40;">
                                    </div>
                                @else 
                                @endif
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit"> نشر الإعلان  </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>

<script>
    
    $(".js-select2").select2({
        closeOnSelect : false,
        placeholder : "Placeholder",
        // allowHtml: true,
        allowClear: true,
        tags: true // создает новые опции на лету
    });
</script>
<script async defer src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyD5P1aaaeShZf5EehRdc8RBY8MqhXvrtLc&language=fa&callback=initMap" ></script>
<script>
        let map;
        let marker;

		function initMap() {
			map = new google.maps.Map(document.getElementById('map'), {
				center: { lat: 0, lng: 0 },
				zoom: 15,
			});

			// Initialize the marker at a default location
			marker = new google.maps.Marker({
				position: { lat: 0, lng: 0 },
				map: map,
				draggable: true, // Make the marker draggable
			});
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(
					function (position) {
						const userLocation = {
							lat: position.coords.latitude,
							lng: position.coords.longitude,
						};
		
						// Set the map center to the user's location
						map.setCenter(userLocation);
		
						// Update the marker's position with the user's location
						marker.setPosition(userLocation);
						// Display the user's current latitude and longitude
                        $('#currentLat').val(userLocation.lat.toFixed(6));
                        $('#currentLng').val(userLocation.lng.toFixed(6));
                    },
					function (error) {
						console.error('Error getting user location:', error);
					}
				);
			} else {
				console.error('Geolocation is not supported by this browser.');
			}
			// Add a dragend event listener to the marker
			google.maps.event.addListener(marker, 'dragend', function () {
				updateCoordinates(marker.getPosition());
			});
		}

        function updateCoordinates(position) {
            const currentLat = position.lat();
            const currentLng = position.lng();

            // Update the HTML elements displaying the coordinates
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
        });
    
        const galleryDt = new DataTransfer();
        const galleryUploadInput = document.getElementById("galleryPics");
        const galleryList = document.getElementById("galleryList");
        const galleryCtrls = document.getElementById("galleryControls");

        function galleryUploadBtnActive() {
            galleryUploadInput.click();
        }

        galleryUploadInput.addEventListener("change", function () {
            if ((galleryDt.items.length + this.files.length) <= 5) {
                //preview the images
                for (let i = 0; i < this.files.length; i++) {
                let file = this.files[i];
                if (file) {
                    let reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.addEventListener("load", function () {
                    let result = reader.result;
                    let imageCon = document.createElement("div");
                    imageCon.classList.add("gallery-preview-wrapper");
                    imageCon.classList.add("d-flex");
                    imageCon.classList.add("align-items-center");
                    imageCon.classList.add("justify-content-center");
                    imageCon.classList.add("d-inline-block");
                    imageCon.classList.add("active");
                    imageCon.innerHTML =
                        '<div class="gallery-pic-container d-flex align-items-center justify-content-center overflow-hidden"><img></div><div class="gallery-cancel-btn"><i class="fas fa-times"></i></div><div class="gallery-file-name"></div>';
                    imageCon.firstElementChild.firstElementChild.src = result;
                    imageCon.children[2].innerHTML = file.name;
                    /*addEventListener to cancel button*/
                    imageCon.children[1].addEventListener("click", function () {
                        const fileName = this.parentElement.children[2].innerHTML;
                        this.parentElement.remove();
                        for (let i = 0; i < galleryDt.items.length; i++) {
                        if (fileName === galleryDt.items[i].getAsFile().name) {
                            galleryDt.items.remove(i);
                            continue;
                        }
                        }
                        // Updating input file files after deletion
                        galleryUploadInput.files = galleryDt.files;
                        if(galleryUploadInput.files.length < 5 && galleryCtrls.hasAttribute("hidden")){
                        galleryCtrls.removeAttribute("hidden");
                        }
                    });

                    galleryList.insertBefore(imageCon, galleryCtrls);
                    });
                    reader.onerror = function () {
                    alert(reader.error);
                    };
                }
                }
                for (let file of this.files) {
                galleryDt.items.add(file);
                }
                this.files = galleryDt.files;
                if(this.files.length == 5){
                galleryCtrls.setAttribute("hidden", "");
                }
            }
            else {
                galleryUploadInput.files = galleryDt.files;
                alert("Please upload 5 images only!");
            }
        });

        $( "#setlocation" ).on( "click", function() {
            $('#location_map').addClass('d-none');
            $('.product_details').removeClass('d-none');
            $('.product_details').css("visibility","inherit");
        } );

        $( "#back_map" ).on( "click", function() {
            $('.product_details').addClass('d-none');
            $('#location_map').removeClass('d-none');
        } );

</script>
<script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
        initialCountry: "SA",
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


</script>
@endsection