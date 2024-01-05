
@extends('admin.layout.master')
@section('css')
@endsection
<style>
   @media only screen and (max-width: 991.98px)
   {
    .top-nav-search {
        display: flex !important;
    }
   }
</style>
@section('content')
    <div class="main-wrapper">
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header card-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">{{ __('pages.advertisements') }}</h3>
                        </div>
                        {{-- <div class="col-sm-5 col">
                            <a href="{{ route('advertisementadmin.upsert') }}" class="btn btn-primary float-end ">  <i class="ti-plus"></i> {{ __('pages.add_advertisment') }}</a>
                        </div> --}}
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-sm-12 ">
                                <ul class="nav nav-pills mb-3 p-0 " id="pills-tab" role="tablist">
                                    <li class="nav-item col-4 justify-content-center" role="presentation">
                                        <button class=" top-nav-search btn btn-secoandry mt-2 {{Request::get('status') ? explode('/', Request::get('status'))[0] == 'all' ? 'active' : '' : 'active'}}" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="{{explode('/', Request::get('status'))[0] == 'all' ? 'true' : 'false'}}">الإعلانات العقاريه [{{count($advertisements_building)}}]  </button>
                                    </li>
                                    <li class="nav-item col-4 justify-content-center " role="presentation">
                                        <button class=" top-nav-search btn btn-secoandry mt-2 {{explode('/', Request::get('status'))[0] == 'yes' ? 'active' : ''}}" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="{{explode('/', Request::get('status'))[0] == 'yes' ? 'true' : 'false'}}" > الإعلانات ال   [{{count($advertisements_vip)}}]  VIP</button>
                                    </li>
                                    <li class="nav-item col-4  justify-content-center" role="presentation">
                                        <button class=" top-nav-search btn btn-secoandry mt-2 {{explode('/', Request::get('status'))[0] == 'no' ? 'active' : ''}}" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="{{explode('/', Request::get('status'))[0] == 'no' ? 'true' : 'false'}}">الإعلانات التجاريه  [{{count($advertisements_commerce)}}]</button>
                                    </li>
                                </ul>
                        <div class="card card-header ">
                            <div class="card-body   " >
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade {{Request::get('status') ? explode('/', Request::get('status'))[0] == 'all' ? 'show active' : '' : 'show active'}}" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <div class="table-responsive ">
                                            <form class="form" action="{{ route('advertisementadmin.filter') }}" method="get">
                                                <div class="col-12">
                                                <div class="form-group d-flex align-advertisements-center">
                                                    <input type="search" placeholder="البحث ب عنوان الإعلان	" name="name" class="form-control d-block search_input w-50" value="{{request()->input('name')}}">
                                                    <button class="btn btn-primary mx-2 btn-search">{{ __('pages.search') }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <table id="example" class=" display  table table-hover table-center mb-0"  filter="{{ route('city.filter') }}">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>{{ __('pages.title') }}</th>
                                                        <th>{{ __('pages.description') }}</th>
                                                        <th>{{ __('pages.phone') }}</th>
                                                        @if(Auth::user()->isSuperAdmin())
                                                            <th>{{ __('pages.seen') }}</th>
                                                        @endif
                                                        <th>{{ __('pages.region') }}</th>
                                                        <th>{{ __('pages.city') }}</th> 
                                                        <th>{{ __('pages.district') }}</th> 
                                                        <th>{{ __('pages.street') }}</th> 
                                                        <th>{{ __('pages.ads_owner') }}</th> 


                                                        <th class="text-end">{{ __('pages.actions') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($advertisements_building as $advertisement)
                                                            <tr class="record">
                                                                <td>{{ $advertisement->id }}#</td>
                                                                <td>{{ $advertisement->title }}</td>
                                                                <td> {{$advertisement->description}} </td>
                                                                <td> {{$advertisement->phone}} </td>
                                                                @if(Auth::user()->isSuperAdmin())
                                                                    <td>
                                                                        <label class="switch switch_activator_status" style="width: 50px; height: 25px;">
                                                                            <input type="checkbox" class="activator_status" @if($advertisement->seen) value="1" checked @else  value="0" @endif advertisement_id="{{ $advertisement->id }}"  name="seen" style="width: 25px; height: 25px;">
                                                                            <span class="slider round2" style="border-radius: 25px;"></span>
                                                                        </label>
                                                                    </td>
                                                                @endif                                                    
                                                                <td> {{$advertisement->region->name_ar }}</td>
                                                                <td> {{$advertisement->city->name_ar}} </td>
                                                                <td> {{$advertisement->district}} </td>
                                                                <td> {{$advertisement->street}} </td>
                                                                <td>  @if($advertisement->ads_owner == 1) مالك @elseif($advertisement->ads_owner == 2) مكتب عقار @else  وسيط @endif  </td>

                                                                <td class="text-end">
                                                                    <div class="actions">
                                                                        <a href="{{ route('advertisementadmin.upsert',['advertisementadmin' => $advertisement->id]) }}" class="btn btn-sm bg-success-light" >
                                                                            <i class="ti-pencil"></i> {{ __('pages.edit') }}
                                                                        </a>
                                                                        <a  data-bs-toggle="modal" href="#" class="btn btn-sm bg-danger-light btn_delete" route="{{ route('advertisementadmin.delete',['advertisementadmin' => $advertisement->id])}}">
                                                                            <i class="ti-trash"></i> {{ __('pages.delete') }}
                                                                        </a>
                                                                    
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                    @endforeach
                                                </tbody>  
                                            </table>
                                                <nav aria-label="Page navigation example" class="mt-2">
                                                    <ul class="pagination">
                                                        @for($i = 1; $i <= $advertisements_building->lastPage(); $i++)
                                                            <li class="page-item @if(request()->input('page') == $i) active @endif"><a class="page-link" href="?name={{request()->input('name')}}&page={{$i}}&status=all">{{$i}}</a></li>
                                                        @endfor
                                                    </ul>
                                                </nav>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade {{explode('/', Request::get('status'))[0] == 'yes' ? 'show active' : ''}}" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div class="table-responsive ">
                                            <form class="form" action="{{ route('advertisementadmin.filter') }}" method="get">
                                                <div class="form-group d-flex align-advertisements-center">
                                                    <input type="search" placeholder="{{ __('pages.search_by_name') }}" name="name" class="form-control d-block search_input w-50" value="{{request()->input('name')}}">
                                                    <button class="btn btn-primary mx-2 btn-search">{{ __('pages.search') }}</button>
                                                </div>
                                            </form>
                                            <table id="example" class=" display  table table-hover table-center mb-0"  filter="{{ route('city.filter') }}">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>{{ __('pages.title') }}</th>
                                                        <th>{{ __('pages.description') }}</th>
                                                        <th>{{ __('pages.phone') }}</th>
                                                        @if(Auth::user()->isSuperAdmin())
                                                            <th>{{ __('pages.seen') }}</th>
                                                        @endif
                                                        <th>{{ __('pages.region') }}</th>
                                                        <th>{{ __('pages.city') }}</th> 
                                                        <th>{{ __('pages.district') }}</th> 
                                                        <th>{{ __('pages.street') }}</th> 


                                                        <th class="text-end">{{ __('pages.actions') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($advertisements_vip as $advertisement)
                                                        <tr class="record">
                                                            <td>{{ $advertisement->id }}#</td>
                                                            <td>{{ $advertisement->title }}</td>
                                                            <td> {{$advertisement->description}} </td>
                                                            <td> {{$advertisement->phone}} </td>
                                                            @if(Auth::user()->isSuperAdmin())
                                                                <td>
                                                                    <label class="switch switch_activator_status" style="width: 50px; height: 25px;">
                                                                        <input type="checkbox" class="activator_status" @if($advertisement->seen) value="1" checked @else  value="0" @endif advertisement_id="{{ $advertisement->id }}"  name="seen" style="width: 25px; height: 25px;">
                                                                        <span class="slider round2" style="border-radius: 25px;"></span>
                                                                    </label>
                                                                </td>  
                                                            @endif                                                  
                                                            <td> {{$advertisement->region->name_ar }}</td>
                                                            <td> {{$advertisement->city->name_ar}} </td>
                                                            <td> {{$advertisement->district}} </td>
                                                            <td> {{$advertisement->street}} </td>

                                                            <td class="text-end">
                                                                <div class="actions">
                                                                    <a href="{{ route('advertisementadmin.upsert',['advertisementadmin' => $advertisement->id]) }}" class="btn btn-sm bg-success-light" >
                                                                        <i class="ti-pencil"></i> {{ __('pages.edit') }}
                                                                    </a>
                                                                    <a  data-bs-toggle="modal" href="#" class="btn btn-sm bg-danger-light btn_delete" route="{{ route('advertisementadmin.delete',['advertisementadmin' => $advertisement->id])}}">
                                                                        <i class="ti-trash"></i> {{ __('pages.delete') }}
                                                                    </a>
                                                                
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>  
                                            </table>
                                                <nav aria-label="Page navigation example" class="mt-2">
                                                    <ul class="pagination">
                                                        @for($i = 1; $i <= $advertisements_vip->lastPage(); $i++)
                                                            <li class="page-city @if(request()->input('page') == $i) active @endif"><a class="page-link" href="?name={{request()->input('name')}}&page={{$i}}">{{$i}}</a></li>
                                                        @endfor
                                                    </ul>
                                                </nav>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade {{explode('/', Request::get('status'))[0] == 'no' ? 'show active' : ''}}" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <div class="table-responsive ">
                                            <form class="form" action="{{ route('advertisementadmin.filter') }}" method="get">
                                                <div class="form-group d-flex align-advertisements-center">
                                                    <input type="search" placeholder="{{ __('pages.search_by_name') }}" name="name" class="form-control d-block search_input w-50" value="{{request()->input('name')}}">
                                                    <button class="btn btn-primary mx-2 btn-search">{{ __('pages.search') }}</button>
                                                </div>
                                            </form>
                                            <table id="example" class=" display  table table-hover table-center mb-0"  filter="{{ route('city.filter') }}">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>{{ __('pages.title') }}</th>
                                                        <th>{{ __('pages.description') }}</th>
                                                        <th>{{ __('pages.phone') }}</th>
                                                        @if(Auth::user()->isSuperAdmin())
                                                            <th>{{ __('pages.seen') }}</th>
                                                        @endif
                                                        <th>{{ __('pages.region') }}</th>
                                                        <th>{{ __('pages.city') }}</th> 
                                                        <th>{{ __('pages.district') }}</th> 
                                                        <th>{{ __('pages.street') }}</th> 


                                                        <th class="text-end">{{ __('pages.actions') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($advertisements_commerce as $advertisement)
                                                        <tr class="record">
                                                            <td>{{ $advertisement->id }}#</td>
                                                            <td>{{ $advertisement->title }}</td>
                                                            <td> {{$advertisement->description}} </td>
                                                            <td> {{$advertisement->phone}} </td>
                                                            @if(Auth::user()->isSuperAdmin())
                                                                <td>
                                                                    <label class="switch switch_activator_status" style="width: 50px; height: 25px;">
                                                                        <input type="checkbox" class="activator_status" @if($advertisement->seen) value="1" checked @else  value="0" @endif advertisement_id="{{ $advertisement->id }}"  name="seen" style="width: 25px; height: 25px;">
                                                                        <span class="slider round2" style="border-radius: 25px;"></span>
                                                                    </label>
                                                                </td>  
                                                            @endif                                                  
                                                            <td> {{$advertisement->region->name_ar }}</td>
                                                            <td> {{$advertisement->city->name_ar}} </td>
                                                            <td> {{$advertisement->district}} </td>
                                                            <td> {{$advertisement->street}} </td>
                                                            <td class="text-end">
                                                                <div class="actions">
                                                                    <a href="{{ route('advertisementadmin.upsert',['advertisementadmin' => $advertisement->id]) }}" class="btn btn-sm bg-success-light" >
                                                                        <i class="ti-pencil"></i> {{ __('pages.edit') }}
                                                                    </a>
                                                                    <a  data-bs-toggle="modal" href="#" class="btn btn-sm bg-danger-light btn_delete" route="{{ route('advertisementadmin.delete',['advertisementadmin' => $advertisement->id])}}">
                                                                        <i class="ti-trash"></i> {{ __('pages.delete') }}
                                                                    </a>
                                                                
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>  
                                            </table>
                                                <nav aria-label="Page navigation example" class="mt-2">
                                                    <ul class="pagination">
                                                        @for($i = 1; $i <= $advertisements_commerce->lastPage(); $i++)
                                                            <li class="page-city @if(request()->input('page') == $i) active @endif"><a class="page-link" href="?name={{request()->input('name')}}&page={{$i}}">{{$i}}</a></li>
                                                        @endfor
                                                    </ul>
                                                </nav>
                                        </div>
                                    </div>
                                </div>
                       
                            </div>
                        </div>
                    </div>			
                </div>
            </div>
        <!-- /Page Wrapper -->
    </div>
@endsection


@section('js')
<script>
$('.copyval').on('click',function(e){
   let x=$(this).attr('value');
   e.preventDefault();
   document.addEventListener('copy', function(e) {
      e.clipboardData.setData('text/plain', x);
      e.preventDefault();
   }, true);
   document.execCommand('copy');  
})
function edit_partner(el) {
    var link = $(el) //refer `a` tag which is clicked
    var modal = $("#edit_partner") //your modal
    var full_name = link.data('full_name')
    var id = link.data('id')
    var email = link.data('email')
    var phone = link.data('phone')
    var image = link.data('image')

    modal.find('#full_name').val(full_name);
    modal.find('#id').val(id);
    modal.find('#email').val(email);
    modal.find('#phone').val(phone);
    $("#image").children().remove();
    $("#image").append(`
        <div class="form-group">
            <input type="file" class="dropify" src=""  data-default-file="${image}" name="picture"/>
            <p class="error error_picture"></p>
        </div>
    `);
    $('.dropify').dropify();
}

$(".activator_status").on("change", function(){   
        if ($(this).is(":checked"))
        {
            $(this).val(1);
        }   
        else {
            $(this).val(0);
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            url: '{{ route("advertisementadmin.status") }}',
            method: 'post',
            data: {id: $(this).attr("advertisement_id"), status: $(this).val()},
            success: function () {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: 'success',
                    title: '{{ __("pages.sucessdata") }}'
                });
            }
        });
    });
</script>

@endsection