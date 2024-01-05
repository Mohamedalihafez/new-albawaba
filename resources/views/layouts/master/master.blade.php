<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
    <meta charset="utf-8">
    <title>    البوابه - للتسويق الإلكتروني </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    
    <!-- Favicon -->
    <link href="{{ asset('assets/img/logo.jpeg')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/lib/animate/animate.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/intlTelInput.css')}}" />

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">

    
    {{-- Dropify --}}
    <link href="{{ asset('admin_assets\css\fileupload.css') }}" rel="stylesheet" />
    
    
    <link href="{{ asset('assets/css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
    
    
<style>
    @import url('https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css');
    ul.ul-cards {
        width: min(100%, 60rem);
        margin-inline: auto;
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        list-style: none;
    }
    .btn-Purple {
        background: linear-gradient(to top, #c471f5 0%, #fa71cd 100%);
        color: white;
        margin-left: 12px;
    }

        .btn-Purple:hover {
        background: linear-gradient(to bottom, #fa71cd 100% ,#c471f5 0%);
        color: white;
        margin-left: 12px;
    }
    ul.ul-cards>a{
        --bg-color: #ffffff;
        --text-color: #333;
        --padding: 1rem;
        --circle-size: 5rem;
        --circle-expand: 1rem;
        --flap-height: 1.25rem;
        --flap-offset: 0.5rem;
        max-width: 17rem;
        margin-top: calc(var(--circle-size) / 2 + var(--circle-expand));
        margin-bottom: var(--flap-offset);
        background-color: var(--bg-color);
        background-image: linear-gradient(to bottom left, transparent 50%, rgba(0 0 0  / .125));
        border-radius: var(--padding);
        padding: var(--padding);

        --bs-rim: inset -0.1rem 0.1rem 0.1rem rgb(255 255 255 / .5);
        --bs-card-spread: 0.25rem;
        --bs-card-color:  rgb(0 0 0 / 0.02);
        --bs-card: 
            -0.1rem 0.1rem var(--bs-card-spread) var(--bs-card-color),
            -0.2rem 0.2rem var(--bs-card-spread) var(--bs-card-color),
            -0.3rem 0.3rem var(--bs-card-spread) var(--bs-card-color),
            -0.4rem 0.4rem var(--bs-card-spread) var(--bs-card-color),
            -0.5rem 0.5rem var(--bs-card-spread) var(--bs-card-color),
            -0.6rem 0.6rem var(--bs-card-spread) var(--bs-card-color),
            -0.7rem 0.7rem var(--bs-card-spread) var(--bs-card-color),
            -0.8rem 0.8rem var(--bs-card-spread) var(--bs-card-color),
            -0.9rem 0.9rem var(--bs-card-spread) var(--bs-card-color),
            -1.0rem 1.0rem var(--bs-card-spread) var(--bs-card-color),
            -1.1rem 1.1rem var(--bs-card-spread) var(--bs-card-color),
            -1.2rem 1.2rem var(--bs-card-spread) var(--bs-card-color),
            -1.3rem 1.3rem var(--bs-card-spread) var(--bs-card-color),
            -1.4rem 1.4rem var(--bs-card-spread) var(--bs-card-color),
            -1.5rem 1.5rem var(--bs-card-spread) var(--bs-card-color),
            -1.6rem 1.6rem var(--bs-card-spread) var(--bs-card-color),
            -1.7rem 1.7rem var(--bs-card-spread) var(--bs-card-color),
            -1.8rem 1.8rem var(--bs-card-spread) var(--bs-card-color),
            -1.9rem 1.9rem var(--bs-card-spread) var(--bs-card-color);
        box-shadow: var(--bs-rim), var(--bs-card);
        display: grid;
        grid-template-rows: max-content max-content auto ;
        justify-items: center;
        text-align: center;
        gap: 0.75rem;
        position: relative;
    }
    ul.ul-cards>a>.icon{
        width: var(--circle-size);
        margin-top: calc(var(--circle-size) / -2 - var(--padding));
        aspect-ratio: 1;
        background-color: var(--bg-color);
        justify-self: center;
        border-radius: 50%;
        display: grid;
        place-items: center;
        box-shadow:var(--bs-rim), -0.1rem 0.1rem 0.25rem rgb(0 0 0 / .25);
    }
    ul.ul-cards>a>.icon>i{
        font-size: calc(var(--circle-size) / 3);
        color: var(--accent-color);
    }
    ul.ul-cards>a>.title{
        margin-top: 0.5rem;
        color: var(--accent-color);
        font-weight: 700;
    }
    ul.ul-cards>a>.content{
        font-size: 0.8rem;
        margin-bottom: 1rem;
        color: var(--text-color)
    }
    ul.ul-cards>a::before, ul>a::after{
        content: "";
        position: absolute;
    }

    .share {
        border-radius: 40px;
        background: linear-gradient(114deg, yellow, red);
        color: #fff;
    }
    .share:hover {
    border-radius: 40px;
    background: linear-gradient(114deg,  red , yellow);
    color: #fff;
    }
    .icon-3 {
        padding:0px !important;
    }
      .owl-carousel .owl-item .img2{
        height:710px !important;
    }
      @media (max-width: 650.437px) {
         .owl-carousel .owl-item .img2{
        height:430px !important;
    }
}
  @media (max-width: 950.437px) {
        .icon-3 {
            margin-right: -27px !important;
        }
    }

    .bar {
        top:60% !important;
    }
    .navbar-light .navbar-nav .nav-link:hover {
    font-weight:500 !important;
}
    /*  */
</style>
<link href="{{ asset('assets/web/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    @yield('css')
</head>
<body>
        <div class=" loader-wrapper">
            <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner"></div>
            </div>
        </div>
        <div class="bar "> 
            <a target="_blank" href="https://m.facebook.com/profile.php/?id=61552400979216" class="  d-none facebook icon2-hover icon-hidden"><i class="icon  icon2 fab fa-facebook-f"></i></a> 
            <a target="_blank" href="https://twitter.com/vip_albawaba" class="twitter icon2-hover icon-hidden"><i class="  d-none icon  icon2 fab fa-twitter"></i></a> 
            <div class="floating_btn"> 
                <a target="_blank" href="https://api.whatsapp.com/send?phone=+966505360123&amp;text=البوابه - للتسويق الإلكتروني." class= "  d-none whatsapp icon2-hover icon-hidden"> 
                    <i class="icon icon2  fab fa-whatsapp"></i> 
                </a> 
            </div>
            <a target="_blank" href="https://www.snapchat.com/add/vip.albawaba " class="snap icon2-hover icon-hidden d-none">
                <i class="icon icon2  fab fa-snapchat"></i>
            </a> 

            <a target="_blank" href="https://vm.tiktok.com/ZSJE5pNQg" class="tiktok icon2-hover icon-hidden d-none ">
                <i class="icon icon2  fab fa-tiktok"></i>
            </a> 

            <a target="_blank" href="https://www.instagram.com/vip.albawaba/ " class="instagram icon2-hover icon-hidden d-none">
                <i class="icon icon2  fa fa-instagram"></i>
            </a> 

            <a target="_blank" href="https://www.youtube.com/channel/UC0-mu9dUdcX_dgP_FsiwVtw " class="youtube icon2-hover icon-hidden d-none">
                <i class="icon icon2  fa fa-youtube"></i>
            </a> 

            <a target="_blank" href="https://t.me/ss_albawaba " class="telegram icon2-hover icon-hidden d-none">
                <i class="icon icon2  fa fa-telegram"></i>
            </a> 
            <a  target="_blank" class=" icon2-hover icon-hand ">
              <img style="    width: 50px;
    height: 50px;" class="icon icon2 icon-3" src="{{ asset('assets/img/social.png')}}"/>
            </a> 
        </div>
        @include('layout.header')
        @yield('content')
        @include('layout.footer')

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets/lib/wow/wow.min.js')}}"></script>
        <script src="{{ asset('assets/lib/easing/easing.min.js')}}"></script>
        <script src="{{ asset('assets/lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{ asset('assets/lib/counterup/counterup.min.js')}}"></script>
        <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('assets/js/ajaxActions.js') }}"></script>

        
        <!-- Template Javascript -->
        <script src="{{ asset('assets/js/main.js')}}"></script>
        <script src="{{ asset('assets/web/contactform/contactform.js')}}"></script>
        <script src="{{ asset('admin_assets\js\dropify.js') }}"></script>
        <script src="{{ asset('admin_assets\js\fileupload.js') }}"></script>
        
        <script>
            $('.dropify').dropify();
            
            // $('.icon-3').click(
            //   function() {
            //     $( this ).remove();
            //   }, function() {
            //     $(e).find('.icon-hidden').removeClass("d-none");

            //   }
            // );
            
            $( ".icon-3" ).on( "click", function() {
                // $( this ).remove();            
                 $.each($('.icon-hidden'), function(i, val) { 
                     if($(val).hasClass('d-none'))
                     {
                        $(val).removeClass('d-none');
                     }
                     else {
                        $(val).addClass('d-none');
                     }
                 });
            } );
            var lastScrollTop = -5;
            $(window).scroll(function() {

            var scrollTop = $(this).scrollTop();
            
            if (scrollTop < lastScrollTop) {
               $.each($('.icon-hidden'), function(i, val) { 
                     $(val).addClass('d-none');
                 });
            }
            
            lastScrollTop = scrollTop;
        });
        </script>
    @yield('js')
</body>

</html>