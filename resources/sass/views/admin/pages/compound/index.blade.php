
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
                            <h3 class="page-title">{{ __('pages.compounds') }}</h3>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="{{ route('compound.upsert') }}" class="btn btn-primary float-end ">  <i class="ti-plus"></i> {{ __('pages.add_compound') }}</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form class="form" action="{{ route('compound.filter') }}" method="get">
                                        <div class="form-group d-flex align-items-center">
                                            <input type="search" placeholder="{{ __('pages.search_by_name') }}" name="name" class="form-control d-block search_input w-50" value="{{request()->input('name')}}">
                                            <button class="btn btn-primary mx-2 btn-search">{{ __('pages.search') }}</button>
                                        </div>
                                    </form>
                                    <table id="example" class=" display  table table-hover table-center mb-0"  filter="{{ route('compound.filter') }}">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>{{ __('pages.name_compound') }}</th>
                                                <th>{{ __('pages.address') }}</th>
                                                <th>{{ __('pages.compound_owner') }}</th>

                                                <th class="text-end">{{ __('pages.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($compounds as $compound)
                                            <tr class="record">
                                                <td>{{ $compound->id }}#</td>
                                                <td>{{ $compound->name }}</td>
                                                <td>{{ $compound->address }}</td>
                                                <td>{{ $compound->user->name }}</td>
                                                <td class="text-end">
                                                    <div class="actions">
                                                        <a href="{{ route('compound.upsert',['compound' => $compound->id]) }}" class="btn btn-sm bg-success-light" >
                                                            <i class="ti-pencil"></i> {{ __('pages.edit') }}
                                                        </a>
                                                        <a data-bs-toggle="modal" href="#" class="btn btn-sm bg-danger-light btn_delete" route="{{ route('compound.delete',['compound' => $compound->id])}}">
                                                            <i class="ti-trash"></i> {{ __('pages.delete') }}
                                                        </a>
                                                    
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>  
                                    </table>
                                    {{-- <div id="edit_partner" class="modal fade">   
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modelHeading">{{ __('pages.edit_compound_info') }}</h4>
                                                <span class="button" data-dismiss="modal" aria-label="Close">   <i class="ti-close"></i> </span>

                                            </div>
                                            <div class="modal-body">
                                                <form method="post" enctype="multipart/form-data" action="{{ route('compound.modify') }}" class="ajax-form" swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}" redirect="{{ route('compound') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" id="id">
                                                    <div class="form-group">
                                                        <label class="control-label">{{ __('pages.compound_owner') }}</label>
                                                        <div class="col-sm-12 ">
                                                            @if(!count($users))
                                                                <a href="{{ route('user') }}" class="ajax-link d-block" message="{{ __('pages.in_case_you_leave_the_page') }}"> {{ __('pages.add_user') }} + </a>
                                                            @else
                                                                <select id="user_name" class="form-control  d-flex compound_owner" placeholder="{{ __('pages.compound_owner') }}" route="{{route('users')}}"  name="user_id">
                                                              
                                                                </select>
                                                            @endif                                                            
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-2 control-label">{{ __('pages.name_compound') }}</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="full_name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">{{ __('pages.address') }}</label>
                                                        <div class="col-sm-12">
                                                            <input placeholder="{{ __('pages.address') }}" type="phone" id="address" class="form-control @error('email') is-invalid @enderror" name="address" value="">
                                                        </div>
                                                    </div>
                                            
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>  --}}
                                </div>
                                    <nav aria-label="Page navigation example" class="mt-2">
                                        <ul class="pagination">
                                            @for($i = 1; $i <= $compounds->lastPage(); $i++)
                                                <li class="page-item">
                                                    <a class="page-link" href="?page={{$i}}">{{$i}}</a>
                                                </li>
                                            @endfor
                                        </ul>
                                    </nav>
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
// $('.copyval').on('click',function(e){
//    let x=$(this).attr('value');
//    e.preventDefault();
//    document.addEventListener('copy', function(e) {
//       e.clipboardData.setData('text/plain', x);
//       e.preventDefault();
//    }, true);
//    document.execCommand('copy');  
// })
// $(document).ready(function() {
//     $("#user_name").select2({
//         dropdownParent: $("#edit_partner")
//     });
// });
// function edit_partner(el) {
//     var link = $(el) //refer `a` tag which is clicked
//     var modal = $("#edit_partner") //your modal
//     var full_name = link.data('full_name')
//     var id = link.data('id')
//     var address = link.data('address')
//     var user_name = link.data('user_name')
//     var route = $('#user_name').attr('route');

//     modal.find('#full_name').val(full_name);
//     modal.find('#id').val(id);
//     modal.find('#address').val(address);
//     modal.find('#user_name').val(user_name);
//     function placeholder(){

//         return $(this).attr('placeholder');
//     }
//     function formatRepo (item) {
//         return item.name;
//     }
  
//     $("#user_name").select2({
//                 ajax: {
//                     url: route,
//                     type: "post",
//                     dataType: 'json',
//                     delay: 250,
//                     headers: {
//                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                     },
//                     data: function (params) {
//                         return {
//                             name: params.term // search term
//                         };
//                     },
//                     processResults: function (response) {
//                         return {
//                             results: response
//                         };
//                     },
//                     cache: true
//                 },
//                 placeholder: placeholder,
//                 templateResult: formatRepo,
//             });
//             $("#user_name").on("select2:select", function () {
//                 function route(){
//                     return $(this).attr('route');
//                 }

//                 function placeholder(){
//                     return $(this).attr('placeholder');
//                 }
                
//                 function formatRepo (item) {
//                     return item.name;
//                 }

//                 $.ajax({
//                     headers: {
//                         'X-CSRF-TOKEN': '{{csrf_token()}}'
//                     },
//                     url: route,
//                     method: 'get',
//                     data: {id: id},
//                     success: (data) => {
//                         $(this).append(`
//                             <option value="${data['id']}" name="${data['name']}" selected>
//                                 ${data['name']}
//                             </option>
//                         `).select2({
//                             ajax: {
//                                 url: route,
//                                 type: "post",
//                                 dataType: 'json',
//                                 delay: 250,
//                                 headers: {
//                                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                                 },
//                                 data: function (params) {
//                                     return {
//                                         name: params.term // search term
//                                     };
//                                 },
//                                 processResults: function (response) {
//                                     return {
//                                         results: response
//                                     };
//                                 },
//                                 cache: true
//                             },
//                             placeholder: placeholder,
//                             templateResult: formatRepo,
//                         });           
//                     }
//                 });
//             });
//     $('.dropify').dropify();
// }

</script>

@endsection