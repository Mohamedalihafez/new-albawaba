<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/logo.jpeg')}}">
    <title>لوحه تحكم البوابه </title>
    <!-- chartist CSS -->
    <link href="{{ asset('admin_assets/node_modules/morrisjs/morris.css') }}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{ asset('admin_assets/node_modules/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('admin_assets/css/style.min.css') }}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('admin_assets/css/pages/dashboard1.css') }}" rel="stylesheet">

    <link href="{{ asset('admin_assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    

    <link href="{{ asset('admin_assets\css\select2.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('admin_assets\css\fileupload.css') }}" rel="stylesheet" />
      {{-- Dropify --}}
      <link href="{{ asset('admin_assets\css\fileupload.css') }}" rel="stylesheet" />
      <style>
.btn-close {
margin-left: 0 !important;
}
.col {
    flex: 1 0 0%;
}
.profile_letters {
    font-size: 50px;
    position: absolute;
    top: 23px;
    right: 13px;
    color: #fff;
}
.position-relative {
position: relative!important;
}
.profile-image {
    background: #bdbdbd;
    margin:auto;
    margin-bottom:10px !important;
    border-radius: 50%;
    display: block;
    width: 120px;
    height: 120px;
}
.navbar-light .navbar-nav .nav-link:hover {
    font-weight:500 !important;
}
      </style>

</head>
<body class="skin-blue fixed-layout">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">البوابه</p>
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('dashboard') }}">
                        <b>
                            <img src="" alt="homepage" class="dark-logo" />
                            <img width="70px" src="{{ asset('assets/img/logo-no.png') }}" alt="homepage" class="light-logo" />
                        </b>
                        <!--<span>-->
                        <!--    <img src="" alt="homepage" class="dark-logo" />-->
                        <!--    <img src="{{ asset('admin_assets/images/logo.png') }}" class="light-logo" alt="homepage"/>-->
                        <!--</span>-->
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                        <li class="nav-item"><a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a></li>
                        <li class="nav-item">

                        </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li><a href="{{ route('home') }}"><i class="ti-control-record text-success"></i> {{ __('pages.home') }}</a></li>
                        @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('setting.upsert') }}"><i class="ti-control-record text-success"></i> الإعدادات الرئيسيه</a></li>@endif
                         @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('service') }}"><i class="ti-control-record text-success"></i> خدماتنا</a></li>@endif
                        @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('user') }}"><i class="ti-control-record text-success"></i> {{ __('pages.users') }}</a></li>@endif
                        @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('region') }}"><i class="ti-control-record text-success"></i> {{ __('pages.regions') }}</a></li>@endif
                        @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('city') }}"><i class="ti-control-record text-success"></i> {{ __('pages.cities') }}</a></li>@endif
                        @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('features.upsert') }}"><i class="ti-control-record text-success"></i>خصائص التطبيق</a></li>@endif

                        @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('proposal') }}"><i class="ti-control-record text-success"></i> المقترحات</a></li>@endif

                        <li><a href="{{ route('advertisementadmin') }}"><i class="ti-control-record text-success"></i> {{ __('pages.advertisements') }}</a></li>

                        {{-- @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('compound') }}"><i class="ti-control-record text-success"></i> {{ __('pages.compounds') }}</a></li>@endif --}}
                        @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('building') }}"><i class="ti-control-record text-success"></i> {{ __('pages.buildings') }}</a></li>@endif
                        @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('privacy.upsert') }}"><i class="ti-control-record text-success"></i> الشروط والأحكام</a></li>@endif
                        @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('policy.upsert') }}"><i class="ti-control-record text-success"></i> سياسة الخصوصيه  </a></li>@endif

                        @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('category') }}"><i class="ti-control-record text-success"></i> {{ __('pages.categories') }}</a></li>@endif
                        @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('orders') }}"><i class="ti-control-record text-success"></i> {{ __('pages.orders') }}</a></li>@endif
                        {{-- @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('apartment') }}"><i class="ti-control-record text-success"></i> {{ __('pages.apartments') }}</a></li>@endif --}}
                        {{-- @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('maintenance') }}"><i class="ti-control-record text-success"></i> {{ __('pages.maintenances') }}</a></li>@endif --}}
                        {{-- @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('tenant') }}"><i class="ti-control-record text-success"></i> {{ __('pages.tenants') }}</a></li>@endif --}}
                        @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('item') }}"><i class="ti-control-record text-success"></i> {{ __('pages.items') }}</a></li>@endif
                        @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('vip') }}"><i class="ti-control-record text-success"></i> {{ __('pages.extras') }}</a></li>@endif
                        @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('extra') }}"><i class="ti-control-record text-success"></i> {{ __('pages.extra') }}</a></li>@endif
                        @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('contributor') }}"><i class="ti-control-record text-success"></i> {{ __('pages.contributors') }}</a></li>@endif
                        @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('partner') }}"><i class="ti-control-record text-success"></i> {{ __('pages.partners') }}</a></li>@endif
                        @if(Auth::user()->isSuperAdmin())<li><a href="{{ route('contacts') }}"><i class="ti-control-record text-success"></i> {{ __('pages.contacts') }}</a></li>@endif

                        <li><a class="waves-effect waves-dark" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" aria-expanded="false"><i class="ti-control-record text-success"></i><span class="hide-menu">{{ __('pages.Logout') }}</span></a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('content')

    <script src="{{ asset('admin_assets/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('admin_assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('admin_assets/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('admin_assets/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('admin_assets/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('admin_assets/js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <script src="{{ asset('admin_assets\js\select2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('js/select2.js')}}"></script>
    
    <script src="{{ asset('admin_assets/node_modules/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('admin_assets/node_modules/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('admin_assets/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/dashboard1.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom1.js') }}"></script>
    <script src="{{ asset('admin_assets/js/script.js') }}"></script>
    <script src="{{ asset('admin_assets/js/lighthouse.js') }}"></script>
    <script src="{{ asset('admin_assets\js\lighthouse.js') }}"></script>
    <script src="{{ asset('admin_assets\js\ajaxActions.js') }}"></script>
    <script src="{{ asset('admin_assets\js\sweetalert2.js') }}"></script>
    <script src="{{ asset('admin_assets\js\bootstrap.main.js') }}"></script>
    <script src="{{ asset('admin_assets\js\dropify.js') }}"></script>
    <script src="{{ asset('admin_assets\js\fileupload.js') }}"></script>
    <script async defer src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyD5P1aaaeShZf5EehRdc8RBY8MqhXvrtLc&language=fa&callback=initMap" ></script>

    <script>
        
		$(".js-select2").select2({
			closeOnSelect : false,
			placeholder : "Placeholder",
			// allowHtml: true,
			allowClear: true,
			tags: true // создает новые опции на лету
		});
        
        // $(document).ready(function(){
        //     function route(){
        //         return $(this).attr('route');
        //     }

        //     function placeholder(){
        //         return $(this).attr('placeholder');
        //     }
            
        //     $(".select2").select2({
        //         ajax: {
        //             url: route,
        //             type: "post",
        //             dataType: 'json',
        //             delay: 250,
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //             data: function (term) {
        //                 return {
        //                     term: term
        //                 };
        //             },
        //             processResults: function (response) {
        //                 return {
        //                     results: $.map(response, function(item) {
        //                         return {
        //                             text: item.name ,
        //                             id: item.id,
        //                         }
        //                     })
        //                 }
        //             },
        //             cache: true,
        //             templateResult: formatRepo,
        //             placeholder: placeholder,
        //         },
        //     });

        //     function formatRepo (item) {
        //         return item.name;
        //     }
        // });

        $('.dropify').dropify();
      
        $('.btn_delete').on('click',function(){
            Swal.fire({
                title: '{{ __("pages.slow_down") }}',
                text: "{{ __('pages.the_deleted_data_cant_be_restored') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ __("pages.confirm") }}',
                cancelButtonText: '{{ __("pages.cancel") }}'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        icon: 'success',
                        title: '{{ __("pages.your_file_has_been_deleted") }}',
                    });

                    $(this).closest('.record').remove();

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        url: $(this).attr('route'),
                        method: 'POST'
                    });
                }
            });
        });

        $.ajax({
            url: "/verified",
            method: "post"
        });

        
    </script>

    @yield('js')
</body>
</html>