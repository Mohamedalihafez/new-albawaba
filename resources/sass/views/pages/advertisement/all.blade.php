


@extends('layouts.master.master')

@section('css')

@endsection
@section('content')
<div class="container-xxl py-5">
    <div class="container-fluid  wow fadeInUp " data-wow-delay="0.1s">
        <h1 class="text-center "> إعلانات  @if(Request('category_id')) @if(Request('category_id') == 1 ) عقاريه  @elseif (Request('category_id') == 2) VIP @else تجاريه  @endif @else @endif</h1>
        <div class="row g-4 mt-3">
            @foreach ( $advertisements as $advertisement)
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
                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$advertisement->region->name_ar}} - {{$advertisement->city->name_ar}} -  {{$advertisement->district}} - {{$advertisement->street}}</p>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{$advertisement->width}} المساحه</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{$advertisement->rooms}}  الغرف</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>{{$advertisement->rooms}} دورات المياه</small>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">                      
                <nav aria-label="Page navigation example" class="mt-2">
                    <ul class="pagination">
                        @for($i = 1; $i <= $advertisements->lastPage(); $i++)
                            <li class="page-item @if(request()->input('page') == $i) active @endif"><a class="page-link" href="?building_id={{request()->input('building_id')}}&page={{$i}}">{{$i}}</a></li>
                        @endfor
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
