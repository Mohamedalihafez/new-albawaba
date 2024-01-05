
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">ابقى على تواصل</h5>
                <p class="mb-2 f-12"><i class="fa fa-map-marker me-3"></i>حي المصيف الاول، 3364 عمرو ابن العاص                        </p>
                <p class="mb-2 f-12"><i class="fa fa-phone me-3"></i>966505360123+                        </p>
                <p class="mb-2 f-12"><i class="fa fa-envelope me-3"></i>vip.albawaba@gmail.com                        </p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="https://twitter.com/vip_albawaba"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href="https://m.facebook.com/profile.php/?id=61552400979216"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/channel/UC0-mu9dUdcX_dgP_FsiwVtw"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href="https://www.snapchat.com/add/vip.albawaba"><i class="fab fa-snapchat"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4"></h5>
                <a class="btn btn-link text-white-50" href="{{route('home')}}">الرئيسيه </a>
                <a class="btn btn-link text-white-50" href="{{route('servicess')}}">خدماتنا </a>
                <a class="btn btn-link text-white-50" href="{{route('contact')}}">تواصل معنا </a>
                <a class="btn btn-link text-white-50" href="">أحبابنا  </a>
                <a class="btn btn-link text-white-50" href="{{route('policy')}}">سياسة الخصوصية                        </a>
                <a class="btn btn-link text-white-50" href="{{route('privacy')}}">الشروط والأحكام</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">معرض الصور</h5>
                <div class="row g-2 pt-2">
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('assets/img/property-1.jpg')}}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('assets/img/property-2.jpg')}}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('assets/img/property-3.jpg')}}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('assets/img/property-4.jpg')}}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('assets/img/property-5.jpg')}}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('assets/img/property-6.jpg')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">للاستفسارات</h5>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <form id="contact-form" method="post" enctype="multipart/form-data" action="{{ route('contact.modify') }}" class="ajax-form" resetAfterSend  swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}">
                        @csrf
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" name="phone" placeholder="رقم الجوال ">
                        <p class="error error_name"></p>
                        <button type="submit" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">تواصل معنا </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#"> </a> جميع الحقوق محفوظة -
                    
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    صمم بواسطة <a class="border-bottom" href="">البوابه</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="">الرئيسيه</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
