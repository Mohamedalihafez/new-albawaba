
@extends('layouts.master.master')

@section('content')
<style>

</style>
<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5 text-center">
        <h1 class="display-5 animated fadeIn mb-4"> <span class="text-primary">{{ trim( $setting->title_1  ," ") }} </span>  
            <br>
            <span class="text-primary ">( {{$setting->title_2 }} )</span> 
        </h1>
        <div class="text-center "> 
            <!-- App Store button -->
            <a href="https://apps.apple.com/us/app/%D8%A7%D9%84%D8%A8%D9%88%D8%A7%D8%A8%D8%A9-albawaba/id1557450065#?platform=iphone" target="_blank" class="market-btn apple-btn" role="button">
                <span class="market-button-subtitle">حمل الأن </span>
                <span class="market-button-title">App Store</span>
            </a>
            
            <!-- Google Play button -->
            <a href="https://play.google.com/store/apps/details?id=com.art4Muslimt.tabook&pli=1" target="_blank" class="market-btn google-btn " role="button">
              <span class="market-button-subtitle">حمل الأن </span>
              <span class="market-button-title">Google Play</span>
            </a>
            
            <!-- Windows store button -->

            
            <!-- Amazon button -->
            {{-- <a href="https://www.kobinet.com.tr/" target="_blank" class="market-btn amazon-btn" role="button">
              <span class="market-button-subtitle">Order now at</span>
              <span class="market-button-title">Amazon.com</span>
            </a> --}}
        </div> 
            <p class="animated fadeIn mb-4 pb-2 banner_p">
              {{$setting->description}}
            </p>
            <a href="{{route('register')}}" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">الإنضمام  لدينا</a>
        </div>
        <div class="col-md-6 animated fadeIn">
            <div class="owl-carousel header-carousel">
                  @isset($setting->id)
                    @foreach ($setting->gallaries as $picture)
                    <div class="owl-carousel-item">
                      
                        <img  class="img-fluid img2"  src="{{ asset('setting/' .$setting->id .'/'. $picture->name) }}" />
                        </a>
                   </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
</div>

<!-- Header End -->

<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto  wow fadeInUp " data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3 header_text">الرعاة الداعمون </h1>
        </div>
        <div class="container-xxl mb-3 ">
            <div class="container">
                <section class="client-section ">
                    <div class="container">  
                        <div class="row">
                            <div class="owl-carousel   owl-theme client-logo " id="client-logo">
                                @foreach ( $partners as $partner )
                                    @if($partner->partner_type == 1)
                                        <div class="item  owl-theme-scroll item_partner_box ">
                                            <a  target="_blamk" @if($partner->name != null) href="{{$partner->name}}" @else @endif><img  src="@isset($partner->id){{ asset('/partner/'.$partner->id.'/'.$partner->gallaries->first()->name) }}@endif" class="img-responsive img_logo_partner" alt="client-logo"></a>
                                        </div>
                                    @endif      
                                @endforeach
                            </div>
                
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="text-center mx-auto  wow fadeInUp mb-3 " data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="mb-3  header_text"> المساهمون في النجاح </h1>
        </div>
        
        <div class="row g-4">
            @foreach ( $partners as $partner )
                @if($partner->partner_type == 2)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img style="height:50px !important;" class="img-fluid" src="@isset($partner->id){{ asset('/partner/'.$partner->id.'/'.$partner->gallaries->first()->name) }}@endif" alt="Icon">
                                </div>
                                <h6>{{$partner->name}}</h6>
                                <span>{{$partner->phone}}</span>
                            </div>
                        </a>
                    </div>  
                @endif 
            @endforeach
        </div>
    </div>
</div>
<!-- Category End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="@isset($features->id){{ asset('/features/'.$features->id.'/'.$features->gallaries->first()->name) }}@endif">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">خصائص (تطبيق البوابة)</h1>
                <p class="mb-4"> {!! $features->privacy !!}</p>
                <a class="btn btn-primary py-3 px-5 mt-3" href="{{ route('contact') }}">تواصل معنا </a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Property List Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">قائمة الإعلانات</h1>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-start mb-5">
                    @foreach ($categories as $category)

                    <li class="nav-item  ">
                        <a class="btn btn-outline-primary font-12 @if( $category->id ==1 ) active @else @endif" data-bs-toggle="pill" href="#tab-{{$category->id}}"> {{ $category->name}} </a>
                    </li>
                    @endforeach

                </ul>
            </div>
            <div class="container-fluid bg-search-section mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
                <div class="">
                    <form class="form" action="{{ route('advertisement.all') }}" method="get">
                    <div class="row g-2">
                        <div class="col-md-10">
                            <div id="container" class="row g-2">   
                                <div class="col-4">
                                    
                                    <a>
                                        <select id="real_state"  name="building_id" class="form-select border-0 py-3" >
                                            <option style="display:none;"  value="">
                                                    إعلانات عقاريه
                                            </option>
                                            @foreach ($buildings as $building)
                                                @if($building->category_id == 1)
                                                    <option value="{{ $building->id }}">{{ $building->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </a>
                                </div>
                                
                                <div class="col-4">
                                    <select id="vip"   name="building_id" class="form-select border-0 py-3">
                                        <option style="display:none;"  value="">
                                                إعلانات ال VIP
                                        </option>
                                        @foreach ($buildings as $building)
                                            @if($building->category_id == 2)
                                                <option value="{{ $building->id }}">{{ $building->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select id="commercial"  name="building_id" class="form-select border-0 py-3">
                                        <option style="display:none;"  value="">
                                                إعلانات تجاريه
                                        </option>
                                        @foreach ($buildings as $building)
                                            @if($building->category_id == 3)
                                                <option value="{{ $building->id }}">{{ $building->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-dark border-0 w-100 py-3 search_btn"><i class="fa fa-search"> </i>  بحث </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
      
        </div>
        <div class="tab-content">
            @foreach ( $categories as $category )
                <div id="tab-{{$category->id}}" class="tab-pane fade show p-0  @if($category->id == 1) active @else @endif">
                
        
                    <div class="row g-4">
                        @foreach ( $advertisements as $advertisement)
                            @if($advertisement->category_id == $category->id )
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        @if($advertisement->code)
                                        <div class="ribbon-wrapper">
                                            <div class="ribbon-tag">{{$advertisement->code}} %</div>
                                        </div>
                                        @else 
                                        @endif
                                        <a href="{{ route('advertisement.show',['advertisement' => $advertisement->id]) }}">
                                            @isset($advertisement->id)
                                                @if($advertisement->gallaries->count())
                                                    <img style="height:250px; width:100%"  class="img-fluid" src="{{ asset('ads/'.$advertisement->id .'/'.$advertisement->gallaries->first()->name) }}" alt="">
                                                @endif
                                            @endisset
                                        </a>
                                        @if($advertisement->building)
                                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{$advertisement->building->name}}</div>
                                        <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">{{$advertisement->building->name}}</div>
                                        @endif
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3"> {{$advertisement->price}}</h5>
                                        <a class="d-block h5 mb-2"  href="{{ route('advertisement.show',['advertisement' => $advertisement->id]) }}">{{$advertisement->title}}</a>
                                        <p><i class="fa fa-map-marker text-primary me-2"></i>{{$advertisement->region->name_ar}} - {{$advertisement->city->name_ar}} -  {{$advertisement->district}} - {{$advertisement->street}}</p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{$advertisement->width}} المساحه</small>
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{$advertisement->rooms}}  الغرف</small>
                                        <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>{{$advertisement->rooms}} دورات المياه</small>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                        <form  class="form" action="{{ route('advertisement.all') }}" method="get">
                            <input type="hidden" name="category_id" value="{{ $category->id}}"/>
                            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                                <button  type="submit" class="btn btn-primary py-3 px-5" href="">قراءه المزيد</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            @endforeach

        </div>
    
    </div>
</div>
<!-- Property List End -->

<!-- Call to Action Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="bg-light rounded p-3">
            <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <img class="img-fluid rounded w-100" src="{{ asset('assets/img/contact_us_2.jpg')}}" alt="">
                    </div>
                    <div class="col-lg-6 wow fadeIn text-center" data-wow-delay="0.5s">
                        <div class="mb-4">
                            <h3 class="mb-3">إذا كان لديك أي استفسار، فلا تتردد في الاتصال بنا                                    </h1>
                        </div>
                        <a href="https://api.whatsapp.com/send?phone=+966505360123&amp;text=البوابه للتسويق الإلكتروني" class="btn  btn-primary py-3 px-4 me-2"><i class="fa fa-phone me-2"></i>تواصل معنا</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')

<script>
    const select1 = document.getElementById("real_state");
    const select2 = document.getElementById("vip");
    const select3 = document.getElementById("commercial");

    function disableOtherSelects(excludedSelect) {
    const selects = [select1, select2, select3];

    for (const select of selects) {
        if (select !== excludedSelect) {
        select.disabled = true;
        }
    }
    }

    function enableAllSelects() {
    const selects = [select1, select2, select3];
        for (const select of selects) {
            select.disabled = false;
        }
    }

    select1.addEventListener("click", () => {
        disableOtherSelects(select1);
        $('#vip').removeAttr('name');
        $('#commercial').removeAttr('name');
        $('#real_state').attr('name','building_id');
    });

    select2.addEventListener("click", () => {
        disableOtherSelects(select2);
        $('#real_state').removeAttr('name');
        $('#commercial').removeAttr('name');
        $('#vip').attr('name','building_id');
    });

    select3.addEventListener("click", () => {
        disableOtherSelects(select3);
        $('#vip').removeAttr('name');
        $('#real_state').removeAttr('name');
        $('#commercial').attr( 'name','building_id');
    });

    // Enable all selects when the mouse leaves the container (e.g., a form or div)
    const container = document.getElementById("container"); // Replace with your container element
    container.addEventListener("mouseout", () => {
        enableAllSelects();
    });

    $('.client-logo').owlCarousel({
        loop: true,
        margin: 0,
        dots: false,
        nav: false,
        autoplay: true,
        navText: ["<i class='icofont icofont-thin-left'></i>", "<i class='icofont icofont-thin-right'></i>"],
        responsive: {
            0: {
                items: 3
            },
            300: {
                items: 3
            },
            600: {
                items: 4
            },
            1000: {
                items: 6
            }
        }
    })
    $(document).ready(function () {
        $('#categories').on('change', function () {
            var category_id = this.value;
            $("#buildings").html('');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                url: '{{ route("building.fetch") }}',
                method: 'post',
                data: {category_id: category_id},
                success: function (results) {
                    $('#buildings').html('');
                    results.forEach((result, index) => {
                        $("#buildings").append('<option value="' + result['id'] + '">' + result['name'] + '</option>');
                    });
                },
            });
        });
    });


 
        
    // $(document).ready(function () {
    //     $('.search_btn').on('click', function () {
    //         var category_id = $('#categories').val();
    //         var building_id = $('#buildings').val();
    //         var ads_title = $('#ads_title').val();
    //         $.ajax({
    //             headers: {
    //                 'X-CSRF-TOKEN': '{{csrf_token()}}'
    //             },
    //             url: '{{ route("advertisement.all") }}',
    //             method: 'get',
    //             data: { category_id: category_id, building_id: building_id ,  ads_title :ads_title } ,
    //             success: function (results) { 
    //                 $('#buildings').html('');
    //                 results.forEach((result, index) => {
    //                     $("#buildings").append('<option value="' + result['id'] + '">' + result['name'] + '</option>');
    //                 });
    //             },
    //         });
    //     });
    // });
</script>
@endsection