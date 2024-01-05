
@extends('admin.layout.master')
@section('content')
    <div class="main-wrapper">
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header card-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">{{ __('pages.orders') }}</h3>
                        </div>

                    </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="card card-header ">
                            <div class="card-body   " >
                                <div class="table-responsive ">
                                    <form class="form" action="{{ route('order.filter') }}" method="get">
                                        <div class="form-group d-flex align-orders-center">
                                            <input type="search" placeholder="{{ __('pages.search_by_name') }}" name="name" class="form-control d-block search_input w-50" value="{{request()->input('name')}}">
                                            <button class="btn btn-primary mx-2 btn-search">{{ __('pages.search') }}</button>
                                        </div>
                                    </form>
                                    <table id="example" class=" display  table table-hover table-center mb-0"  filter="{{ route('order.filter') }}">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>{{ __('pages.name') }}</th>
                                                <th>{{ __('pages.phone') }}</th>
                                                <th>{{ __('pages.city') }}</th>
                                                <th>{{ __('pages.region') }}</th>
                                                <th>{{ __('pages.categories') }}</th>
                                                <th>{{ __('pages.buildings') }}</th>
                                                <th>{{ __('pages.comments') }}</th>
                                                <th>{{ __('pages.image') }}</th>
                                                <th class="text-end">{{ __('pages.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                                <tr class="record">
                                                    <td>{{ $order->id }}#</td>
                                                    <td>{{ $order->name }}</td>
                                                    <td>{{ $order->phone }}</td>
                                                    <td>{{ $order->city->name_ar }}</td>
                                                    <td>{{ $order->region->name_ar }}</td>
                                                    <td> @if($order->category) {{$order->category->name}}  @else @endif</td>
                                                    <td> @if($order->building) {{$order->building->name}}  @else @endif</td>
                                                    <td>{{ $order->comments }}</td>
                                                    <td><img width="150px" height="150px"  src="@if($order->id) @if(count($order->gallaries) > 0) {{ asset('/orders/'.$order->id.'/'.$order->gallaries->first()->name) }} @endif @endif"></td>
                                                    <td class="text-end">
                                                        <div class="actions">
                                                            {{-- <a href="{{ route('order.upsert',['order' => $order->id]) }}" class="btn btn-sm bg-success-light" >
                                                                <i class="ti-pencil"></i> {{ __('pages.edit') }}
                                                            </a> --}}
                                                            <a  data-bs-toggle="modal" href="#" class="btn btn-sm bg-danger-light btn_delete" route="{{ route('order.delete',['order' => $order->id])}}">
                                                                <i class="ti-trash"></i> {{ __('pages.delete') }}
                                                            </a>
                                                        
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>  
                                    </table>
                                </div>
                       
                                <nav aria-label="Page navigation example" class="mt-2">
                                    <ul class="pagination">
                                        @for($i = 1; $i <= $orders->lastPage(); $i++)
                                            <li class="page-order @if(request()->input('page') == $i) active @endif"><a class="page-link" href="?name={{request()->input('name')}}&page={{$i}}">{{$i}}</a></li>
                                        @endfor
                                    </ul>
                                </nav>
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

</script>

@endsection