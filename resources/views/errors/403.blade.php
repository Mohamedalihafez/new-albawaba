@extends('layouts.master.master')
@section('css')
@endsection
    @section('content')
	
		<!-- Main Wrapper -->
        <div class="container-xxl py-5 ">
            <div class="container-fluid  wow fadeInUp ">
                <div class="error-box text-center">
                    <h1>403</h1>
                    <h3 class="h2 mb-3"> {{__('pages.Oops')}} <i class="fa fa-warning"></i></h3>
                    <br>
                    <a href="{{route('dashboard')}}" class="btn btn-primary">{{__('pages.back to home')}}</a>
                </div>
            </div>          
	
        </div>
    @endsection
