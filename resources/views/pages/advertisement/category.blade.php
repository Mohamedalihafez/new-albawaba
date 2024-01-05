@extends('layouts.master.master')

@section('css')

@endsection
@section('content')

<div class="container-fluid  wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="text-center">نوع الإعلان</h1>
        <ul class="ul-cards row ">
            @foreach ($categories as $category )
                <a href="{{ route('advertisement.add',['category' => $category->id])}}"  @if($category->id == 1) style=" --accent-color: #68AFFF" @elseif($category->id == 2)  style=" --accent-color: #FFA44B" @else style="--accent-color: #EF6968" @endif>
                    <div class="icon"><i class="fa-solid @if($category->id == 1)fa-building @elseif($category->id == 2)fa-star @else fa-business-time @endif"></i></div>
                    <div class="title">	{{ $category->name}}</div>
                </a>
            @endforeach
            <div class="col-12">
                <a href="{{ route('order')}}" class="btn  btn-primary py-3 px-4 me-2 w-100 "><i class="fa fa-get-pocket me-2" aria-hidden="true"></i> طلب إعلان</a>
            </div>
        </ul>

    </div>
</div>
@endsection


@section('js')

@endsection