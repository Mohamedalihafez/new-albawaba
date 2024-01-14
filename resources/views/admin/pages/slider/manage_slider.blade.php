@extends('admin.layout.master')
@section('title')
| manage portfolio experience1
@endsection
@push('css')
<!-- DataTables -->

  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')
 <!-- /.card -->
 
 <div class="main-wrapper">
   <div class="page-wrapper">
      <div class="page-header card-header">
        <div class="row">
            <div class="col-sm-7 col-auto">
                <h3 class="page-title">الغلاف</h3>
            </div>
            @if(count($slider) == 0)
              <div class="col-sm-5 col">
                  <a href="{{ route('create_slider') }}" class="btn btn-primary float-end ">  <i class="ti-plus"></i> قم بانشاء بيانات الغلاف</a>
              </div>
            @endif
        </div>
    </div>
      
        <div class="content container-fluid">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-responsive table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>الاسم بالكامل </th>
                      <th>المهنه</th>
                      <th>الصوره الشخصيه</th>
                      <th>الغلاف</th>
                      <th>ملف الاعمال</th>
                      <th>افعال</th>
                    </tr>
                    </thead>
                    <tbody>
                  
                    @foreach($slider as $serial=>$show)
                      <tr>
                      <td>{{ $serial +1 }}</td>
                      <td>{{$show->full_name}}</td>
                      <td>{{$show->experience}}</td>
                      <td>
                        <img class="img-fluid img-thumbnail" src="{{asset('assets/frontend/images/profile/'.$show->image)}}" width="70" height="50" alt="img">
                        
                      </td>
                      <td>
                        <img class="img-fluid img-thumbnail" src="{{asset('assets/frontend/images/slider/'.$show->slider)}}" width="70" height="50" alt="img">
                      </td>
                      <td>{{$show->cv}}</td>
                      {{-- <td>{{$show->created_at->format('Y-m-d h:i:s')}}</td>
                      <td>{{$show->updated_at->format('Y-m-d h:i:s')}}</td> --}}
                      <td> 
                        <a href="{{ route('edit_slider',$show->id)}}" class="h4 text-success"> <i class=" ti-pencil"></i> تعديل </a>

                        <a class="h4 text-danger mr-2" type="submit" onclick="deletecontent({{ $show->id  }})">
                            <i class="ti-trash"></i> حذف
                        </a>
                      <form id="delete-form-{{ $show->id  }}" action="{{ route('destroy_slider',$show->id)}}" method="get" style="display: none;">
                        @csrf
                                        
                      </form>

                    </td>
                    </tr>
                    @endforeach
                
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
    </div>
 </div>
            <!-- /.card -->
@endsection

@section('js')
<!-- DataTables  & Plugins -->
 <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deletecontent(id) {
            swal({
                title: 'هل انت متأكد ؟',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'إلغاء',
                confirmButtonClass: 'btn btn-success',
                confirmButtonText: 'نعم قم بالحذف!',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
   </script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });



</script>
    
@endsection