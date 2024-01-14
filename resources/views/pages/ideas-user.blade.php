@extends('layouts.master.master')
<link href="{{ asset('assets/css/portofolio.css')}}" rel="stylesheet">

@section('title')
@endsection
@section('content')
@if ($slider->count() != 0)
@foreach($slider as $show )
<div class="profile-page">
  <div class="wrapper">
    <div class="page-header page-header-small" filter-color="green">
      
      <div class="page-header-image" data-parallax="true" style="background-image: url('{{asset('assets/frontend/images/slider/'.$show->slider)}}')"></div>
      <div class="container">
        <div class="content-center profile-data">
          <div class="cc-profile-image"><a href="#"><img src="{{asset('assets/frontend/images/profile/'.$show->image)}}" alt="Image"/></a></div>
          <div class="h2 title text-white">{{ Str::upper($show->full_name) }}</div>
          <p class="category text-white mt-2">{{ $show->experience }}</p><a class="btn btn-primary smooth-scroll mr-2" href="#contact" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">تواصل معي </a>
          {{-- <a class="btn btn-primary" href="{{asset('assets/frontend/images/cv/'.$show->cv)}}" data-aos="zoom-in" data-aos-anchor="data-aos-anchor" download>Download CV</a> --}}
        </div>
      </div>
      <div class="section">
        <div class="container">
          @if ($social_media->count() != 0)
            @foreach ($social_media as $show )
              <div class="button-container social-buuton-profile"><a class="btn btn-default btn-round btn-lg btn-icon" href="{{ $show->facebook }}" rel="tooltip" title="Follow me on Facebook"><i class="fa fa-facebook"></i></a><a class="btn btn-default btn-round btn-lg btn-icon" href="{{ $show->twitter }}" rel="tooltip" title="Follow me on Twitter"><i class="fa fa-twitter"></i></a><a class="btn btn-default btn-round btn-lg btn-icon" href="{{ $show->google }}" rel="tooltip" title="Follow me on Google+"><i class="fa fa-snapchat"></i></a><a class="btn btn-default btn-round btn-lg btn-icon" href="{{ $show->intagram }}" rel="tooltip" title="Follow me on Instagram"><i class="fa fa-instagram"></i></a></div>
            @endforeach
          @else
               <div class="button-container social-buuton-profile"><a class="btn btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Facebook"><i class="fa fa-facebook"></i></a><a class="btn btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Twitter"><i class="fa fa-twitter"></i></a><a class="btn btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Google+"><i class="fa fa-snapchat"></i></a><a class="btn btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Instagram"><i class="fa fa-instagram"></i></a></div>
          @endif
       
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@else
<div class="profile-page">
  <div class="wrapper">
    <div class="page-header page-header-small" filter-color="green">
      
      <div class="page-header-image" data-parallax="true" style="background-image: url('{{ asset('assets/img/cc-bg-1.jpg') }}')"></div>
      <div class="container">
        <div class="content-center">
          <div class="cc-profile-image"><a href="#"><img src="{{ asset('assets/img/anthony.jpg') }}" alt="Image"/></a></div>
          <div class="h2 title text-white">Anthony Barnett</div>
          <p class="category text-white mt-2">Web Developer, Graphic Designer,  Photographer</p><a class="btn btn-primary smooth-scroll mr-2" href="#contact" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Hire Me</a><a class="btn btn-primary" href="#" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Download CV</a>
        </div>
      </div>
      <div class="section">
        <div class="container">
          <div class="button-container">
            <a class="btn-social-border btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Facebook">
              <i class="fa fa-facebook"></i>
            </a>
            <a class="btn-social-border btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Twitter">
              <i class="fa fa-twitter"></i>
            </a>
            <a class="btn-social-border btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Google+">
              <i class="fa fa-snapchat"></i>
            </a>
            <a class="btn-social-border btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Instagram">
              <i class="fa fa-instagram"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  
@endif



<div class="section" id="about">
  <div class="container">
    @if ($about->count() != 0)
      @foreach ($about as $show)
        <div class="card" data-aos="fade-up" data-aos-offset="10">
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card-body">
            <div class="h4 mt-0 title">نبذه مختصره</div>
             <p>{!! $show->short_about !!}</p>
     
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="card-body">
            <div class="h4 mt-0 title">معلومات أساسيه</div>
            <div class="row">
              <div class="col-sm-4"><strong class="text-uppercase">العمر:</strong></div>
              <div class="col-sm-8">{{ $show->age }}</div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">البريد الالكتروني:</strong></div>
              <div class="col-sm-8">{{ $show->email }}</div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">الجوال:</strong></div>
              <div class="col-sm-8">{{ $show->phone }}</div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">العنوان:</strong></div>
              <div class="col-sm-8">{{ $show->address }}</div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">اللغات:</strong></div>
              <div class="col-sm-8">{{ $show->language }} </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      @endforeach
    @else
      <div class="card" data-aos="fade-up" data-aos-offset="10">
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card-body">
            <div class="h4 mt-0 title">About</div>
            <p>Hello! I am Anthony Barnett. Web Developer, Graphic Designer and Photographer.</p>
            <p>Creative CV is a HTML resume template for professionals. Built with Bootstrap 4, Now UI Kit and FontAwesome, this modern and responsive design template is perfect to showcase your portfolio, skills and experience. 
              Creative CV is a HTML resume template for professionals. Built with Bootstrap 4, Now UI Kit and FontAwesome, this modern and responsive design template is perfect to showcase your portfolio, skills and experience</p>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="card-body">
            <div class="h4 mt-0 title">Basic Information</div>
            <div class="row">
              <div class="col-sm-4"><strong class="text-uppercase">Age:</strong></div>
              <div class="col-sm-8">24</div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">Email:</strong></div>
              <div class="col-sm-8">anthony@company.com</div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">Phone:</strong></div>
              <div class="col-sm-8">+1718-111-0011</div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">Address:</strong></div>
              <div class="col-sm-8">140, City Center, New York, U.S.A nnnnnnnnnn</div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">Language:</strong></div>
              <div class="col-sm-8">English, German, French </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
    
  </div>
</div>
<div class="section" id="skill">
  <div class="container">
    <div class="h4 text-center mb-4 title">مهارات احترافية</div>
    @if ($skill->count() != 0)
     @foreach ($skill as $show )
             <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="progress-container progress-primary"><span class="progress-badge">{{$show->skill_1 }}</span>
              <div class="progress">
                <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div><span class="progress-value">{{$show->skill_1_percentage }}%</span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="progress-container progress-primary"><span class="progress-badge">{{$show->skill_2 }}</span>
              <div class="progress">
                <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div><span class="progress-value">{{$show->skill_2_percentage }}%</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="progress-container progress-primary"><span class="progress-badge">{{$show->skill_3 }}</span>
              <div class="progress">
                <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div><span class="progress-value">{{$show->skill_3_percentage }}%</span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="progress-container progress-primary"><span class="progress-badge">{{$show->skill_4 }}</span>
              <div class="progress">
                <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div><span class="progress-value">{{$show->skill_4_percentage }}%</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="progress-container progress-primary"><span class="progress-badge">{{$show->skill_5}}</span>
              <div class="progress">
                <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div><span class="progress-value">{{$show->skill_5_percentage }}%</span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="progress-container progress-primary"><span class="progress-badge">{{$show->skill_6 }}</span>
              <div class="progress">
                <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div><span class="progress-value">{{$show->skill_6_percentage }}%</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     @endforeach
  
    @else
        <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="progress-container progress-primary"><span class="progress-badge">HTML</span>
              <div class="progress">
                <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div><span class="progress-value">80%</span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="progress-container progress-primary"><span class="progress-badge">CSS</span>
              <div class="progress">
                <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div><span class="progress-value">75%</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="progress-container progress-primary"><span class="progress-badge">JavaScript</span>
              <div class="progress">
                <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div><span class="progress-value">60%</span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="progress-container progress-primary"><span class="progress-badge">SASS</span>
              <div class="progress">
                <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div><span class="progress-value">60%</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="progress-container progress-primary"><span class="progress-badge">Bootstrap</span>
              <div class="progress">
                <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div><span class="progress-value">75%</span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="progress-container progress-primary"><span class="progress-badge">Photoshop</span>
              <div class="progress">
                <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div><span class="progress-value">70%</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
  
  </div>
</div>
{{-- <div class="section" id="portfolio">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ml-auto mr-auto">
        <div class="h4 text-center mb-4 title">Portfolio</div>
        <div class="nav-align-center">
          <ul class="nav nav-pills nav-pills-primary" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#web-development" role="tablist"><i class="fa fa-laptop" aria-hidden="true"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#graphic-design" role="tablist"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Photography" role="tablist"><i class="fa fa-camera" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="tab-content gallery mt-5">
      <div class="tab-pane active" id="web-development">
        <div class="ml-auto mr-auto">
          <div class="row">
            @if ($portfolio_experience1->count() != 0)
              @foreach ($portfolio_experience1 as $show )
            <div class="col-md-6">
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#web-development">
                  <figure class="cc-effect"><img src="{{asset('assets/frontend/images/Portfolio/port_exper1/'.$show->picture)}}"  width="550" height="410" alt="Image"/>
                    <figcaption>
                      <div class="h4">{{ $show->project_name }}</div>
                      <p>{{ $show->experience_name }}</p>
                    </figcaption>
                  </figure></a></div>
              </div>
              @endforeach
            @else
            <div class="col-md-6">
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#web-development">
                  <figure class="cc-effect"><img src=" {{ asset('assets/frontend/images/project-1.jpg') }}" alt="Image"/>
                    <figcaption>
                      <div class="h4">Recent Project</div>
                      <p>Web Development</p>
                    </figcaption>
                  </figure></a></div>
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#web-development">
                  <figure class="cc-effect"><img src=" {{ asset('assets/frontend/images/project-2.jpg') }}" alt="Image"/>
                    <figcaption>
                      <div class="h4">Startup Project</div>
                      <p>Web Development</p>
                    </figcaption>
                  </figure></a></div>
            </div>
              <div class="col-md-6">
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#web-development">
                  <figure class="cc-effect"><img src=" {{ asset('assets/frontend/images/project-3.jpg') }}" alt="Image"/>
                    <figcaption>
                      <div class="h4">Food Order Project</div>
                      <p>Web Development</p>
                    </figcaption>
                  </figure></a></div>
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#web-development">
                  <figure class="cc-effect"><img src=" {{ asset('assets/frontend/images/project-4.jpg') }}" alt="Image"/>
                    <figcaption>
                      <div class="h4">Web Advertising Project</div>
                      <p>Web Development</p>
                    </figcaption>
                  </figure></a></div>
            </div>
            @endif
            
            
          </div>
        </div>
      </div>
      <div class="tab-pane" id="graphic-design" role="tabpanel">
        <div class="ml-auto mr-auto">
          <div class="row">
             @if ($portfolio_experience2->count() != 0)
                @foreach ($portfolio_experience2 as $show )
                <div class="col-md-6">
                    <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#graphic-design">
                        <figure class="cc-effect"><img src="{{asset('assets/frontend/images/Portfolio/port_exper2/'.$show->picture)}}"  width="550" height="410" alt="Image"/>
                          <figcaption>
                          <div class="h4">{{ $show->project_name }}</div>
                           <p>{{ $show->experience_name }}</p>
                          </figcaption>
                        </figure></a></div>
                    
                  </div>
                @endforeach
             @else
             
                  <div class="col-md-6">
                    <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#graphic-design">
                        <figure class="cc-effect"><img src="{{ asset('assets/frontend/images/graphic-design-1.jpg') }}" alt="Image"/>
                          <figcaption>
                            <div class="h4">Triangle Pattern</div>
                            <p>Graphic Design</p>
                          </figcaption>
                        </figure></a></div>
                    <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#graphic-design">
                        <figure class="cc-effect"><img src="  {{ asset('assets/frontend/images/graphic-design-2.jpg') }}" alt="Image"/>
                          <figcaption>
                            <div class="h4">Abstract Umbrella</div>
                            <p>Graphic Design</p>
                          </figcaption>
                        </figure></a></div>
                  </div>
                  <div class="col-md-6">
                    <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#graphic-design">
                        <figure class="cc-effect"><img src="  {{ asset('assets/frontend/images/graphic-design-3.jpg') }}" alt="Image"/>
                          <figcaption>
                            <div class="h4">Cube Surface Texture</div>
                            <p>Graphic Design</p>
                          </figcaption>
                        </figure></a></div>
                    <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#graphic-design">
                        <figure class="cc-effect"><img src="  {{ asset('assets/frontend/images/graphic-design-4.jpg') }}" alt="Image"/>
                          <figcaption>
                            <div class="h4">Abstract Line</div>
                            <p>Graphic Design</p>
                          </figcaption>
                        </figure></a></div>
                  </div>
             @endif
             

                </div>
              </div>
           </div>
        
     
      <div class="tab-pane" id="Photography" role="tabpanel">
        <div class="ml-auto mr-auto">
          <div class="row">
     @if ($portfolio_experience3->count() != 0)
        @foreach ($portfolio_experience3 as $show )
           <div class="col-md-6">
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#Photography">
                  <figure class="cc-effect"><img src="{{asset('assets/frontend/images/Portfolio/port_exper3/'.$show->picture)}}"  width="550" height="410" alt="Image"/>
                    <figcaption>
                      <div class="h4">{{ $show->project_name }}</div>
                      <p>{{ $show->experience_name }}</p>
                    </figcaption>
                  </figure></a></div>
             
                  
            </div>
        @endforeach
      @else
           <div class="col-md-6">
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#Photography">
                  <figure class="cc-effect"><img src=" {{ asset('assets/frontend/images/photography-1.jpg') }}" alt="Image"/>
                    <figcaption>
                      <div class="h4">Photoshoot</div>
                      <p>Photography</p>
                    </figcaption>
                  </figure></a></div>
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#Photography">
                  <figure class="cc-effect"><img src=" {{ asset('assets/frontend/images/photography-3.jpg') }}" alt="Image"/>
                    <figcaption>
                      <div class="h4">Wedding Photoshoot</div>
                      <p>Photography</p>
                    </figcaption>
                  </figure></a></div>
            </div>
              <div class="col-md-6">
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#Photography">
                  <figure class="cc-effect"><img src=" {{ asset('assets/frontend/images/photography-1.jpg') }}" alt="Image"/>
                    <figcaption>
                      <div class="h4">Photoshoot</div>
                      <p>Photography</p>
                    </figcaption>
                  </figure></a></div>
              <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#Photography">
                  <figure class="cc-effect"><img src=" {{ asset('assets/frontend/images/photography-3.jpg') }}" alt="Image"/>
                    <figcaption>
                      <div class="h4">Wedding Photoshoot</div>
                      <p>Photography</p>
                    </figcaption>
                  </figure></a></div>
            </div>
           
      @endif
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section" id="experience">
  <div class="container cc-experience">
    <div class="h4 text-center mb-4 title">Work Experience</div>
    @if ($work_experience->count() != 0)
      @foreach ($work_experience as $show)
         <div class="card">
      <div class="row">
        <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body cc-experience-header">
            <p>{{ $show->dateFrom_startToend }}</p>
            <div class="h5">{{ $show->work_place }}</div>
          </div>
        </div>
        <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body">
            <div class="h5">{{ $show->work_experienceName }}</div>
            <p>{{ $show->short_description }}</p>
          </div>
        </div>
      </div>
    </div>
      @endforeach
    @else
          <div class="card">
      <div class="row">
        <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body cc-experience-header">
            <p>March 2016 - Present</p>
            <div class="h5">CreativeM</div>
          </div>
        </div>
        <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body">
            <div class="h5">Front End Developer</div>
            <p>Euismod massa scelerisque suspendisse fermentum habitant vitae ullamcorper magna quam iaculis, tristique sapien taciti mollis interdum sagittis libero nunc inceptos tellus, hendrerit vel eleifend primis lectus quisque cubilia sed mauris. Lacinia porta vestibulum diam integer quisque eros pulvinar curae, curabitur feugiat arcu vivamus parturient aliquet laoreet at, eu etiam pretium molestie ultricies sollicitudin dui.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="row">
        <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body cc-experience-header">
            <p>April 2014 - March 2016</p>
            <div class="h5">WebNote</div>
          </div>
        </div>
        <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body">
            <div class="h5">Web Developer</div>
            <p>Euismod massa scelerisque suspendisse fermentum habitant vitae ullamcorper magna quam iaculis, tristique sapien taciti mollis interdum sagittis libero nunc inceptos tellus, hendrerit vel eleifend primis lectus quisque cubilia sed mauris. Lacinia porta vestibulum diam integer quisque eros pulvinar curae, curabitur feugiat arcu vivamus parturient aliquet laoreet at, eu etiam pretium molestie ultricies sollicitudin dui.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="row">
        <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body cc-experience-header">
            <p>April 2013 - February 2014</p>
            <div class="h5">WEBM</div>
          </div>
        </div>
        <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body">
            <div class="h5">Intern</div>
            <p>Euismod massa scelerisque suspendisse fermentum habitant vitae ullamcorper magna quam iaculis, tristique sapien taciti mollis interdum sagittis libero nunc inceptos tellus, hendrerit vel eleifend primis lectus quisque cubilia sed mauris. Lacinia porta vestibulum diam integer quisque eros pulvinar curae, curabitur feugiat arcu vivamus parturient aliquet laoreet at, eu etiam pretium molestie ultricies sollicitudin dui.</p>
          </div>
        </div>
      </div>
    </div>
    @endif

  </div>
</div>
<div class="section">
  <div class="container cc-education">
    <div class="h4 text-center mb-4 title">Education</div>
    @if ($education->count() != 0)
       @foreach ($education as $show)
         <div class="card">
      <div class="row">
        <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body cc-education-header">
            <p>{{ $show->session }}</p>
            <div class="h5">{{ $show->name_of_examination }}</div>
          </div>
        </div>
        <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body">
            <div class="h5">{{ $show->group }}</div>
            <p class="category">{{ $show->institute_name }}</p>
            <p>{{ $show->short_description }}</p>
          </div>
        </div>
      </div>
    </div>
       @endforeach
    @else
      <div class="card">
      <div class="row">
        <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body cc-education-header">
            <p>2013 - 2015</p>
            <div class="h5">Master's Degree</div>
          </div>
        </div>
        <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body">
            <div class="h5">Master of Information Technology</div>
            <p class="category">University of Computer Science</p>
            <p>Euismod massa scelerisque suspendisse fermentum habitant vitae ullamcorper magna quam iaculis, tristique sapien taciti mollis interdum sagittis libero nunc inceptos tellus, hendrerit vel eleifend primis lectus quisque cubilia sed mauris. Lacinia porta vestibulum diam integer quisque eros pulvinar curae, curabitur feugiat arcu vivamus parturient aliquet laoreet at, eu etiam pretium molestie ultricies sollicitudin dui.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="row">
        <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body cc-education-header">
            <p>2009 - 2013</p>
            <div class="h5">Bachelor's Degree</div>
          </div>
        </div>
        <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body">
            <div class="h5">Bachelor of Computer Science</div>
            <p class="category">University of Computer Science</p>
            <p>Euismod massa scelerisque suspendisse fermentum habitant vitae ullamcorper magna quam iaculis, tristique sapien taciti mollis interdum sagittis libero nunc inceptos tellus, hendrerit vel eleifend primis lectus quisque cubilia sed mauris. Lacinia porta vestibulum diam integer quisque eros pulvinar curae, curabitur feugiat arcu vivamus parturient aliquet laoreet at, eu etiam pretium molestie ultricies sollicitudin dui.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="row">
        <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body cc-education-header">
            <p>2007 - 2009</p>
            <div class="h5">High School</div>
          </div>
        </div>
        <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body">
            <div class="h5">Science and Mathematics</div>
            <p class="category">School of Secondary board</p>
            <p>Euismod massa scelerisque suspendisse fermentum habitant vitae ullamcorper magna quam iaculis, tristique sapien taciti mollis interdum sagittis libero nunc inceptos tellus, hendrerit vel eleifend primis lectus quisque cubilia sed mauris. Lacinia porta vestibulum diam integer quisque eros pulvinar curae, curabitur feugiat arcu vivamus parturient aliquet laoreet at, eu etiam pretium molestie ultricies sollicitudin dui.</p>
          </div>
        </div>
      </div>
    </div>
    @endif
    
  </div>
</div>
<div class="section" id="reference">
  <div class="container cc-reference">
    <div class="h4 mb-4 text-center title">References</div>
    <div class="card" data-aos="zoom-in">
      <div class="carousel slide" id="cc-Indicators" data-ride="carousel">
        <ol class="carousel-indicators">
          <li class="active" data-target="#cc-Indicators" data-slide-to="0"></li>
          <li data-target="#cc-Indicators" data-slide-to="1"></li>
          <li data-target="#cc-Indicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          @if ($reference->count() != 0)
          @foreach ($reference as $serial=>$show)
            <div class="carousel-item {{ ($serial == 0) ? 'active' : '' }} ">
            <div class="row">   
              <div class="col-lg-2 col-md-3 cc-reference-header"><img src="{{asset('assets/frontend/images/Reference/'.$show->image)}}" width="200" height="150" alt="Image"/>
                <div class="h5 pt-2">{{ $show->name }}</div>
                <p class="category">{{ $show->occupation }}</p>
              </div>
              <div class="col-lg-10 col-md-9">
                <p>{{ $show->short_description }}</p>
              </div>
            </div>
          </div>
          @endforeach
        @else
         <div class="carousel-item active">
            <div class="row">   
              <div class="col-lg-2 col-md-3 cc-reference-header"><img src="{{ asset('assets/frontend/images/reference-image-1.jpg') }}" alt="Image"/>
                <div class="h5 pt-2">Aiyana</div>
                <p class="category">CEO / WEBM</p>
              </div>
              <div class="col-lg-10 col-md-9">
                <p> Habitasse venenatis commodo tempor eleifend arcu sociis sollicitudin ante pulvinar ad, est porta cras erat ullamcorper volutpat metus duis platea convallis, tortor primis ac quisque etiam luctus nisl nullam fames. Ligula purus suscipit tempus nascetur curabitur donec nam ullamcorper, laoreet nullam mauris dui aptent facilisis neque elementum ac, risus semper felis parturient fringilla rhoncus eleifend.</p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
                 
              <div class="col-lg-2 col-md-3 cc-reference-header"><img src="{{ asset('assets/frontend/images/reference-image-2.jpg') }}" alt="Image"/>
                <div class="h5 pt-2">Braiden</div>
                <p class="category">CEO / Creativem</p>
              </div>
              <div class="col-lg-10 col-md-9">
                <p> Habitasse venenatis commodo tempor eleifend arcu sociis sollicitudin ante pulvinar ad, est porta cras erat ullamcorper volutpat metus duis platea convallis, tortor primis ac quisque etiam luctus nisl nullam fames. Ligula purus suscipit tempus nascetur curabitur donec nam ullamcorper, laoreet nullam mauris dui aptent facilisis neque elementum ac, risus semper felis parturient fringilla rhoncus eleifend.</p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-lg-2 col-md-3 cc-reference-header"><img src="{{ asset('assets/frontend/images/reference-image-3.jpg') }}" alt="Image"/>
                <div class="h5 pt-2">Alexander</div>
                <p class="category">CEO / Webnote</p>
              </div>
              <div class="col-lg-10 col-md-9">
                <p> Habitasse venenatis commodo tempor eleifend arcu sociis sollicitudin ante pulvinar ad, est porta cras erat ullamcorper volutpat metus duis platea convallis, tortor primis ac quisque etiam luctus nisl nullam fames. Ligula purus suscipit tempus nascetur curabitur donec nam ullamcorper, laoreet nullam mauris dui aptent facilisis neque elementum ac, risus semper felis parturient fringilla rhoncus eleifend.</p>
              </div>
            </div>
          </div>
          
        @endif
          
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section" id="contact">
  <div class="cc-contact-information" style="background-image: url('{{ asset('assets/frontend/images/staticmap.png') }}')">
    <div class="container">
      <div class="cc-contact">
        <div class="row">
          <div class="col-md-9">
            <div class="card mb-0" data-aos="zoom-in">
              <div class="h4 text-center title">Contact Me</div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card-body">
                    <form action="" method="POST">
                      @csrf
                      <div class="p pb-3"><strong>Feel free to contact me </strong></div>
                      <div class="row mb-3">
                        <div class="col">
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input class="form-control" type="text" name="name" placeholder="Name" required="required"/>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col">
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input class="form-control" type="text" name="subject" placeholder="Subject" required="required"/>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col">
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input class="form-control" type="email" name="email" placeholder="E-mail" required="required"/>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col">
                          <div class="form-group">
                            <textarea class="form-control" name="message" placeholder="Your Message" required="required"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <button class="btn btn-primary" type="submit">Send</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-md-6">
                @if ($about->count() != 0)
                     @foreach ($about as $show)
                     <div class="card-body">
                      <p class="mb-0"><strong>Address </strong></p>
                      <p class="pb-2">{{ $show->address }}</p>
                      <p class="mb-0"><strong>Phone</strong></p>
                      <p class="pb-2">{{ $show->phone }}</p>
                      <p class="mb-0"><strong>Email</strong></p>
                      <p>{{ $show->email }}</p>
                    </div>
                     @endforeach
                @else
                 <div class="card-body">
                    <p class="mb-0"><strong>Address </strong></p>
                    <p class="pb-2">140, City Center, New York, U.S.A</p>
                    <p class="mb-0"><strong>Phone</strong></p>
                    <p class="pb-2">+1718-111-0011</p>
                    <p class="mb-0"><strong>Email</strong></p>
                    <p>anthony@company.com</p>
                  </div>
                @endif
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}

@endsection

@section('js')
@endsection
